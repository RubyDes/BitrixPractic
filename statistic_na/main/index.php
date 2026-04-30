<?php
define("BX_NO_HEADER", true);
define("BX_SKIP_SESSION_EXPAND", true);
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("BX_NO_ACCELERATOR_RESET", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION;
$APPLICATION->SetTitle("Авторизация");

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/header.php");
?>

<div class="pagetitle mb-4">
    <h1><?php $APPLICATION->ShowTitle()?></h1>
</div>

<section class="section">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <?php
            $authType = "auth";
            if(isset($_REQUEST["forgot_password"]) && $_REQUEST["forgot_password"] == "yes") {
                $authType = "forgot";
            } elseif(isset($_REQUEST["change_password"]) && $_REQUEST["change_password"] == "yes") {
                $authType = "change";
            } elseif(isset($_REQUEST["confirm_registration"]) && $_REQUEST["confirm_registration"] == "yes") {
                $authType = "reg";
            }

            switch($authType):
                case "forgot":
                    $APPLICATION->IncludeComponent(
                        "bitrix:system.auth.forgotpasswd",
                        "auth_form",
                        array(
                            "COMPONENT_TEMPLATE" => "auth_form",
                            "SHOW_ERRORS" => "Y"
                        ),
                        false
                    );
                    break;
                case "change":
                    $APPLICATION->IncludeComponent(
                        "bitrix:system.auth.changepasswd",
                        "auth_form",
                        array(
                            "COMPONENT_TEMPLATE" => "auth_form",
                            "SHOW_ERRORS" => "Y"
                        ),
                        false
                    );
                    break;
                default:
                    $APPLICATION->IncludeComponent(
                        "bitrix:system.auth.form",
                        "auth_form",
                        array(
                            "COMPONENT_TEMPLATE" => "auth_form",
                            "REGISTER_URL" => "/statistic_na/?register=yes",
                            "FORGOT_PASSWORD_URL" => "/statistic_na/?forgot_password=yes",
                            "PROFILE_URL" => "/statistic_na/profile/",
                            "SHOW_ERRORS" => "Y"
                        ),
                        false
                    );
                    break;
            endswitch;
            ?>
        </div>
    </div>
</section>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/footer.php");
?>