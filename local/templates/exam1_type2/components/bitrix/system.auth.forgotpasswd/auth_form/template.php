<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<div class="card mb-3">
    <div class="card-body">
        <?php if(!empty($arResult["ERROR_MESSAGE"])): ?>
            <div class="alert alert-danger"><?=htmlspecialcharsbx($arResult["ERROR_MESSAGE"])?></div>
        <?php endif; ?>

        <?php if(!empty($arResult["OK_MESSAGE"])): ?>
            <div class="alert alert-success"><?=htmlspecialcharsbx($arResult["OK_MESSAGE"])?></div>
        <?php endif; ?>

        <div class="pt-4 pb-2">
            <p class="small"><?=GetMessage("AUTH_FORGOT_PASSWORD_DESC")?></p>
        </div>

        <form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="row g-3" novalidate>
            <?php if($arResult["BACKURL"]): ?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
            <?php endif; ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="SEND_PWD">

            <div class="col-12">
                <label for="USER_LOGIN" class="form-label"><?=GetMessage("AUTH_LOGIN")?></label>
                <input id="USER_LOGIN" class="form-control" type="text" name="USER_LOGIN" maxlength="50" value="<?=htmlspecialcharsbx($arResult["LAST_LOGIN"])?>" autofocus>
            </div>

            <div class="col-12">
                <label for="USER_EMAIL" class="form-label">E-Mail</label>
                <input id="USER_EMAIL" class="form-control" type="text" name="USER_EMAIL" maxlength="255" value="<?=htmlspecialcharsbx($arResult["USER_EMAIL"])?>">
            </div>

            <?php if($arResult["USE_CAPTCHA"]): ?>
                <div class="col-12">
                    <label class="form-label"><?=GetMessage("AUTH_CAPTCHA_PROMT")?></label>
                    <div class="input-group has-validation">
                        <input required class="form-control" type="text" name="captcha_word" maxlength="50" />
                        <div class="invalid-feedback"><?=GetMessage("AUTH_CAPTCHA_REQUIRED")?></div>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHA_CODE"])?>" />
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHA_CODE"])?>" width="180" height="40" alt="CAPTCHA" />
                </div>
            <?php endif; ?>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" name="send_account_info"><?=GetMessage("AUTH_SEND")?></button>
            </div>

            <div class="col-12">
                <p class="small mb-0">
                    <b><a href="/statistic_na/"><?=GetMessage("AUTH_BACK_TO_AUTH")?></a></b>
                </p>
            </div>
        </form>
    </div>
</div>