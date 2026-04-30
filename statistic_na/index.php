<?php
define("BX_NO_HEADER", true);
define("BX_SKIP_SESSION_EXPAND", true);
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("BX_NO_ACCELERATOR_RESET", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION, $USER;
$APPLICATION->SetTitle("Авторизация");

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/header.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
$message = '';

if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'yes') {
    $USER->Logout();
    LocalRedirect("/statistic_na/");
}

if($action == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login'])) {
    $login = $_POST['USER_LOGIN'];
    $password = $_POST['USER_PASSWORD'];
    $remember = isset($_POST['USER_REMEMBER']) ? 'Y' : 'N';
    
    $authResult = $USER->Login($login, $password, $remember);
    if($USER->IsAuthorized()) {
        LocalRedirect("/statistic_na/dashboard/");
    } else {
        $message = "Неверный логин или пароль";
    }
}

if($action == 'forgot' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_account_info'])) {
    $login = $_POST['USER_LOGIN'];
    $email = $_POST['USER_EMAIL'];
    
    CModule::IncludeModule('main');
    $rsUser = CUser::GetList(($o = ""), ($b = ""), array('LOGIN' => $login, 'EMAIL' => $email));
    if($arUser = $rsUser->Fetch()) {
        $checkword = randString(8);
        $user = new CUser;
        $user->Update($arUser['ID'], array('CHECKWORD' => $checkword));
        
        CEvent::Send("USER_PASS_REQUEST", SITE_ID, array(
            "USER_ID" => $arUser['ID'],
            "USER_LOGIN" => $arUser['LOGIN'],
            "USER_EMAIL" => $arUser['EMAIL'],
            "USER_NAME" => $arUser['NAME'],
            "USER_LAST_NAME" => $arUser['LAST_NAME'],
            "USER_CHECKWORD" => $checkword,
        ));
        $message = "Инструкция по восстановлению пароля отправлена на ваш E-mail";
    } else {
        $message = "Пользователь с таким логином и E-mail не найден";
    }
}

if($action == 'change' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_pwd'])) {
    $login = $_POST['USER_LOGIN'];
    $checkword = $_POST['USER_CHECKWORD'];
    $password = $_POST['USER_PASSWORD'];
    $confirm = $_POST['USER_CONFIRM_PASSWORD'];
    
    if($password != $confirm) {
        $message = "Пароли не совпадают";
    } else {
        $rsUser = CUser::GetList(($o = ""), ($b = ""), array('LOGIN' => $login, 'CHECKWORD' => $checkword));
        if($arUser = $rsUser->Fetch()) {
            $user = new CUser;
            $user->Update($arUser['ID'], array('PASSWORD' => $password));
            $message = "Пароль успешно изменен. Теперь вы можете войти";
            LocalRedirect("/statistic_na/?message=Пароль изменен");
        } else {
            $message = "Неверный логин или контрольная строка";
        }
    }
}
?>

<div class="pagetitle mb-4">
    <h1><?php $APPLICATION->ShowTitle()?></h1>
</div>

<section class="section">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            
            <?php if($message): ?>
                <div class="alert alert-info"><?=htmlspecialcharsbx($message)?></div>
            <?php endif; ?>

            <?php if($action == 'forgot'): ?>
                <!-- Форма восстановления пароля -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="small">Если вы забыли пароль, введите логин или E-Mail.<br />Контрольная строка для смены пароля будет выслана вам по E-Mail.</p>
                        </div>
                        <form method="post" class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Логин</label>
                                <input class="form-control" type="text" name="USER_LOGIN" value="">
                            </div>
                            <div class="col-12">
                                <label class="form-label">E-Mail</label>
                                <input class="form-control" type="text" name="USER_EMAIL" value="">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" name="send_account_info">Выслать</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0"><a href="/statistic_na/">Вернуться к авторизации</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            <?php elseif($action == 'change'): ?>
                <!-- Форма смены пароля -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="small">Введите контрольную строку и новый пароль</p>
                        </div>
                        <form method="post" class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Логин</label>
                                <input class="form-control" type="text" name="USER_LOGIN" value="<?=htmlspecialcharsbx($_REQUEST['USER_LOGIN'])?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Контрольная строка</label>
                                <input class="form-control" type="text" name="USER_CHECKWORD" value="<?=htmlspecialcharsbx($_REQUEST['USER_CHECKWORD'])?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Новый пароль</label>
                                <input class="form-control" type="password" name="USER_PASSWORD">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Подтверждение пароля</label>
                                <input class="form-control" type="password" name="USER_CONFIRM_PASSWORD">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" name="change_pwd">Изменить пароль</button>
                            </div>
                            <div class="col-12">
                                <p class="small"><a href="/statistic_na/">Вернуться к авторизации</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            <?php else: ?>
                <!-- Форма авторизации -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <p class="text-center small">Пожалуйста, авторизуйтесь:</p>
                        </div>
                        <form method="post" class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Логин:</label>
                                <input type="text" class="form-control" name="USER_LOGIN" required autofocus>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Пароль:</label>
                                <input type="password" class="form-control" name="USER_PASSWORD" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y">
                                    <label class="form-check-label" for="USER_REMEMBER">Запомнить меня</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" name="Login">Войти</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">
                                    Забыли пароль?
                                    <a href="/statistic_na/?action=forgot">Восстановить</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/footer.php");
?>