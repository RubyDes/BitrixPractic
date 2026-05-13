<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

if ($arResult["FORM_TYPE"] !== "logout") {
    return;
}

$logoutUrl = $APPLICATION->GetCurPageParam(
    "logout=yes&".bitrix_sessid_get(), 
    array("login", "logout", "register", "forgot_password", "change_password")
);
?>
<li class="nav-item dropdown pe-3">
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?=htmlspecialcharsbx($arResult["USER_NAME"])?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6><?=htmlspecialcharsbx($arResult["USER_NAME"] ?: $arResult["USER_LOGIN"])?></h6>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="<?=htmlspecialcharsbx($arParams["PROFILE_URL"])?>">
                <i class="bi bi-person"></i>
                <span><?=GetMessage("AUTH_PROFILE")?></span>
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <div class="col-12 mb-3 mt-3 d-flex justify-content-center">
                <a href="<?=$logoutUrl?>" class="btn btn-secondary btn-sm"><?=GetMessage("AUTH_LOGOUT")?></a>
            </div>
        </li>
    </ul>
</li>
