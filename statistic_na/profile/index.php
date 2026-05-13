<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
$templateFolder = "/local/templates/exam1_type2";
$APPLICATION->SetPageProperty("page_css_class", "profile");

global $USER;
$userId = $USER->GetID();
$userLogin = $USER->GetLogin();
$userFullName = $USER->GetFullName();
$userEmail = $USER->GetEmail();
$userFirstName = $USER->GetFirstName();
$userLastName = $USER->GetLastName();

if (empty($userFullName)) {
    $userFullName = $userLogin;
}
if (empty($userFirstName)) {
    $userFirstName = $userLogin;
}
?>

<div class="pagetitle mb-4">
    <h1><?=GetMessage("PROFILE_TITLE")?></h1>
</div>

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="<?=$templateFolder?>/assets/img/male_avatar.svg" alt="Profile" class="rounded-circle">
                    <h2><?=htmlspecialcharsbx($userFullName)?></h2>
                    <h3><?=GetMessage("PROFILE_ANALYTIC")?></h3>
                    <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"><?=GetMessage("PROFILE_OVERVIEW")?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"><?=GetMessage("PROFILE_EDIT")?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"><?=GetMessage("PROFILE_CHANGE_PASSWORD")?></button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                            <h5 class="card-title"><?=GetMessage("PROFILE_DETAILS")?></h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label"><?=GetMessage("PROFILE_FULL_NAME")?></div>
                                <div class="col-lg-9 col-md-8"><?=htmlspecialcharsbx($userFullName)?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label"><?=GetMessage("PROFILE_LOGIN")?></div>
                                <div class="col-lg-9 col-md-8"><?=htmlspecialcharsbx($userLogin)?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label"><?=GetMessage("PROFILE_EMAIL")?></div>
                                <div class="col-lg-9 col-md-8"><?=htmlspecialcharsbx($userEmail)?></div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                            <form action="<?=$APPLICATION->GetCurPage()?>" method="post">
                                <input type="hidden" name="save_profile" value="Y">
                                <?=bitrix_sessid_post()?>

                                <div class="row mb-3">
                                    <label for="NAME" class="col-md-4 col-lg-3 col-form-label"><?=GetMessage("PROFILE_NAME")?></label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="NAME" type="text" class="form-control" id="NAME" value="<?=htmlspecialcharsbx($userFirstName)?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="LAST_NAME" class="col-md-4 col-lg-3 col-form-label"><?=GetMessage("PROFILE_LAST_NAME")?></label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="LAST_NAME" type="text" class="form-control" id="LAST_NAME" value="<?=htmlspecialcharsbx($userLastName)?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="EMAIL" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="EMAIL" type="email" class="form-control" id="EMAIL" value="<?=htmlspecialcharsbx($userEmail)?>">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary"><?=GetMessage("PROFILE_SAVE")?></button>
                                </div>
                            </form>

                            <?php

                            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["save_profile"] == "Y" && check_bitrix_sessid()) {
                                $arFields = array(
                                    "NAME" => $_POST["NAME"],
                                    "LAST_NAME" => $_POST["LAST_NAME"],
                                    "EMAIL" => $_POST["EMAIL"],
                                );
                                $user = new CUser;
                                $res = $user->Update($userId, $arFields);
                                if ($res) {
                                    LocalRedirect($APPLICATION->GetCurPage());
                                }
                            }
                            ?>
                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                            <form action="<?=$APPLICATION->GetCurPage()?>" method="post">
                                <input type="hidden" name="change_password" value="Y">
                                <?=bitrix_sessid_post()?>

                                <div class="row mb-3">
                                    <label for="old_password" class="col-md-4 col-lg-3 col-form-label"><?=GetMessage("PROFILE_OLD_PASSWORD")?></label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="OLD_PASSWORD" type="password" class="form-control" id="old_password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="new_password" class="col-md-4 col-lg-3 col-form-label"><?=GetMessage("PROFILE_NEW_PASSWORD")?></label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="NEW_PASSWORD" type="password" class="form-control" id="new_password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label"><?=GetMessage("PROFILE_CONFIRM_PASSWORD")?></label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="NEW_PASSWORD_CONFIRM" type="password" class="form-control" id="confirm_password">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary"><?=GetMessage("PROFILE_CHANGE")?></button>
                                </div>
                            </form>

                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["change_password"] == "Y" && check_bitrix_sessid()) {
                                $oldPassword = $_POST["OLD_PASSWORD"];
                                $newPassword = $_POST["NEW_PASSWORD"];
                                $confirmPassword = $_POST["NEW_PASSWORD_CONFIRM"];
                                
                                if ($newPassword !== $confirmPassword) {
                                    echo '<div class="alert alert-danger">' . GetMessage("PROFILE_PASSWORD_MISMATCH") . '</div>';
                                } else {
                                    $user = new CUser;
                                    $arFields = array(
                                        "PASSWORD" => $newPassword,
                                        "CONFIRM_PASSWORD" => $confirmPassword,
                                    );
                                    $res = $user->Update($userId, $arFields);
                                    if ($res) {
                                        echo '<div class="alert alert-success">' . GetMessage("PROFILE_PASSWORD_CHANGED") . '</div>';
                                    } else {
                                        echo '<div class="alert alert-danger">' . $user->LAST_ERROR . '</div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>