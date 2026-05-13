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
                    <?if(!empty($arParams["~AUTH_RESULT"])):?>
                        <div class="alert alert-danger">
                            <?ShowMessage($arParams["~AUTH_RESULT"]);?>
                        </div>
                    <?elseif(!empty($arResult["ERROR_MESSAGE"])):?>
                        <div class="alert alert-danger">
                            <?ShowMessage($arResult["ERROR_MESSAGE"]);?>
                        </div>
                    <?endif;?>

                    <form class="row g-3" name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>">
                        <input type="hidden" name="AUTH_FORM" value="Y">
                        <input type="hidden" name="TYPE" value="CHANGE_PWD">
                        <?if (strlen($arResult["BACKURL"]) > 0):?>
                            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                        <?endif?>

                        <div class="col-12">
                            <label class="form-label"><?=Loc::getMessage("AUTH_LOGIN")?></label>
                            <input type="text" class="form-control" name="USER_LOGIN" maxlength="50" value="<?=htmlspecialcharsbx($arResult["LAST_LOGIN"])?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label"><?=Loc::getMessage("AUTH_CHECKWORD")?></label>
                            <input type="text" class="form-control" name="USER_CHECKWORD" maxlength="50" value="<?=htmlspecialcharsbx($arResult["USER_CHECKWORD"])?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label"><?=Loc::getMessage("AUTH_NEW_PASSWORD")?></label>
                            <input type="password" class="form-control" name="USER_PASSWORD" maxlength="255" autocomplete="off">
                        </div>

                        <div class="col-12">
                            <label class="form-label"><?=Loc::getMessage("AUTH_NEW_PASSWORD_CONFIRM")?></label>
                            <input type="password" class="form-control" name="USER_CONFIRM_PASSWORD" maxlength="255" autocomplete="off">
                        </div>

                        <?if($arResult["CAPTCHA_CODE"]):?>
                            <div class="col-12">
                                <label class="form-label"><?=Loc::getMessage("AUTH_CAPTCHA_PROMT")?></label>
                                <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA">
                                <input type="text" class="form-control mt-2" name="captcha_word" maxlength="50" autocomplete="off">
                            </div>
                        <?endif;?>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit" name="change_pwd"><?=Loc::getMessage("AUTH_CHANGE")?></button>
                        </div>

                        <?if($arResult["AUTH_AUTH_URL"]):?>
                            <div class="col-12">
                                <p class="small mb-0">
                                    <a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=Loc::getMessage("AUTH_AUTH")?></a>
                                </p>
                            </div>
                        <?endif;?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
