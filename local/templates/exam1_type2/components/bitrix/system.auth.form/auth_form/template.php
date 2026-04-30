<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            <p class="text-center small"><?=GetMessage("AUTH_PLEASE_AUTH")?></p>
        </div>

        <?php if(!empty($arResult["ERROR_MESSAGE"])): ?>
            <div class="alert alert-danger"><?=htmlspecialcharsbx($arResult["ERROR_MESSAGE"])?></div>
        <?php endif; ?>

        <form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="row g-3 needs-validation" novalidate>
            <input type="hidden" name="AUTH_FORM" value="Y" />
            <input type="hidden" name="TYPE" value="AUTH" />

            <div class="col-12">
                <label for="USER_LOGIN" class="form-label"><?=GetMessage("AUTH_LOGIN")?>:</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="USER_LOGIN" required name="USER_LOGIN" maxlength="255" value="<?=htmlspecialcharsbx($arResult["LAST_LOGIN"])?>" autofocus>
                    <div class="invalid-feedback"><?=GetMessage("AUTH_LOGIN_REQUIRED")?></div>
                </div>
            </div>

            <div class="col-12">
                <label for="USER_PASSWORD" class="form-label"><?=GetMessage("AUTH_PASSWORD")?>:</label>
                <input type="password" class="form-control" id="USER_PASSWORD" required name="USER_PASSWORD" maxlength="255" autocomplete="off">
                <div class="invalid-feedback"><?=GetMessage("AUTH_PASSWORD_REQUIRED")?></div>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y">
                    <label class="form-check-label" for="USER_REMEMBER"><?=GetMessage("AUTH_REMEMBER_ME")?></label>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" name="Login"><?=GetMessage("AUTH_LOGIN_BUTTON")?></button>
            </div>

            <div class="col-12">
                <p class="small mb-0">
                    <?=GetMessage("AUTH_FORGOT_PASSWORD")?>
                    <a href="/statistic_na/?forgot_password=yes" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_LINK")?></a>
                </p>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    try{document.form_auth.USER_LOGIN.focus();}catch(e){}
</script>