<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<style>
    #main { margin-left: 0 !important; padding: 0 !important; background: #f6f9ff; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    .auth-container { width: 100%; max-width: 450px; padding: 20px; }
    .card { border: none; border-radius: 5px; box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1); }
</style>

<div class="auth-container">
    <div class="row justify-content-center">
        <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <p class="text-center small"><?=Loc::getMessage("AUTH_PLEASE_AUTH")?></p>
                    </div>

                    <?if(!empty($arParams["~AUTH_RESULT"])):?>
                        <div class="alert alert-danger">
                            <?ShowMessage($arParams["~AUTH_RESULT"]);?>
                        </div>
                    <?elseif(!empty($arResult["ERROR_MESSAGE"])):?>
                        <div class="alert alert-danger">
                            <?ShowMessage($arResult["ERROR_MESSAGE"]);?>
                        </div>
                    <?endif;?>

                    <form class="row g-3 needs-validation" name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
                        <input type="hidden" name="AUTH_FORM" value="Y" />
                        <input type="hidden" name="TYPE" value="AUTH" />
                        <?if (strlen($arResult["BACKURL"]) > 0):?>
                            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                        <?endif?>

                        <div class="col-12">
                            <label for="USER_LOGIN" class="form-label"><?=Loc::getMessage("AUTH_LOGIN")?></label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="USER_LOGIN" name="USER_LOGIN" maxlength="255" value="<?=htmlspecialcharsbx($arResult["LAST_LOGIN"])?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="USER_PASSWORD" class="form-label"><?=Loc::getMessage("AUTH_PASSWORD")?></label>
                            <input type="password" class="form-control" id="USER_PASSWORD" name="USER_PASSWORD" maxlength="255" autocomplete="off">
                        </div>

                        <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y">
                                    <label class="form-check-label" for="USER_REMEMBER"><?=Loc::getMessage("AUTH_REMEMBER_ME")?></label>
                                </div>
                            </div>
                        <?endif;?>

                        <?if($arResult["CAPTCHA_CODE"]):?>
                            <div class="col-12">
                                <label class="form-label"><?=Loc::getMessage("AUTH_CAPTCHA_PROMT")?></label>
                                <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA">
                                <input type="text" class="form-control mt-2" name="captcha_word" maxlength="50" autocomplete="off">
                            </div>
                        <?endif;?>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit" name="Login"><?=Loc::getMessage("AUTH_AUTHORIZE")?></button>
                        </div>

                        <?if($arResult["AUTH_FORGOT_PASSWORD_URL"]):?>
                            <div class="col-12">
                                <p class="small mb-0">
                                    <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=Loc::getMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                                </p>
                            </div>
                        <?endif;?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
