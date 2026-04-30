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
            <p class="small"><?=GetMessage("AUTH_CHANGE_PASSWORD_DESC")?></p>
        </div>

        <form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" class="row g-3 needs-validation" novalidate>
            <?php if($arResult["BACKURL"]): ?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
            <?php endif; ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="CHANGE_PWD">

            <div class="col-12">
                <label class="form-label"><?=GetMessage("AUTH_LOGIN")?></label>
                <div class="input-group has-validation">
                    <input class="form-control" required type="text" name="USER_LOGIN" maxlength="50" value="<?=htmlspecialcharsbx($arResult["LAST_LOGIN"])?>" autofocus>
                    <div class="invalid-feedback"><?=GetMessage("AUTH_LOGIN_REQUIRED")?></div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label"><?=GetMessage("AUTH_CHECKWORD")?></label>
                <div class="input-group has-validation">
                    <input class="form-control" required type="text" name="USER_CHECKWORD" maxlength="50" value="<?=htmlspecialcharsbx($arResult["USER_CHECKWORD"])?>">
                    <div class="invalid-feedback"><?=GetMessage("AUTH_CHECKWORD_REQUIRED")?></div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label"><?=GetMessage("AUTH_NEW_PASSWORD")?></label>
                <div class="input-group has-validation">
                    <input class="form-control" required type="password" name="USER_PASSWORD" maxlength="255" value="">
                    <div class="invalid-feedback"><?=GetMessage("AUTH_NEW_PASSWORD_REQUIRED")?></div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label"><?=GetMessage("AUTH_CONFIRM_PASSWORD")?></label>
                <div class="input-group has-validation">
                    <input class="form-control" type="password" required name="USER_CONFIRM_PASSWORD" maxlength="255" value="">
                    <div class="invalid-feedback"><?=GetMessage("AUTH_CONFIRM_PASSWORD_REQUIRED")?></div>
                </div>
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
                <button class="btn btn-primary w-100" type="submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>"><?=GetMessage("AUTH_CHANGE")?></button>
            </div>

            <div class="col-12">
                <p class="small"><a href="/statistic_na/"><b><?=GetMessage("AUTH_BACK_TO_AUTH")?></b></a></p>
            </div>
        </form>
    </div>
</div>