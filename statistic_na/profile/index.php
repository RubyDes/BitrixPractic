<?php
define("BX_NO_HEADER", true);
define("BX_SKIP_SESSION_EXPAND", true);
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("BX_NO_ACCELERATOR_RESET", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION;
global $APPLICATION, $USER;
$APPLICATION->SetPageProperty("page_css_class", "profile");
$APPLICATION->SetTitle("Профиль");

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/header.php");
?>

<div class="pagetitle mb-4">
    <h1>Профиль</h1>
</div>

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="/local/templates/exam1_type2/assets/img/male_avatar.svg" alt="Profile" class="rounded-circle">
                    <h2><?=$USER->GetFullName() ?: 'Илья Иванов'?></h2>
                    <h3>Аналитик</h3>
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
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="false" role="tab" tabindex="-1">Обзор</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="true" role="tab">Изменить данные</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab" tabindex="-1">Изменить пароль</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                            <h5 class="card-title">Детали</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">ФИО</div>
                                <div class="col-lg-9 col-md-8"><?=$USER->GetFullName() ?: 'Илья Иванов'?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Компания</div>
                                <div class="col-lg-9 col-md-8">Компания</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Должность</div>
                                <div class="col-lg-9 col-md-8">Аналитик</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?=$USER->GetEmail() ?: 'i.ivanov@bitrix.ru'?></div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                            <form>
                                <div class="row mb-3">
                                    <label for="avatar" class="col-md-4 col-lg-3 col-form-label">Аватар</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Avatar" type="file" class="form-control" id="avatar">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="firstName" class="col-md-4 col-lg-3 col-form-label">Имя</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="FirstName" type="text" class="form-control" id="firstName" value="Илья">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Фамилия</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="LastName" type="text" class="form-control" id="lastName" value="Иванов">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Компания</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="company" type="text" class="form-control" id="company" value="Компания">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="job" class="col-md-4 col-lg-3 col-form-label">Должность</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="job" type="text" class="form-control" id="job" value="Аналитик">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="email" value="i.ivanov@bitrix.ru">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Обновить</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                            <form>
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Текущий пароль</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Новый пароль</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Повторите новый пароль</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Изменить пароль</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/footer.php");
?>