<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $USER;

if(!$USER->IsAuthorized()):
    return;
endif;

$profileUrl = !empty($arParams["PROFILE_URL"]) ? $arParams["PROFILE_URL"] : "/statistic_na/profile/";
?>

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <span class="d-none d-md-block dropdown-toggle ps-2"><?=htmlspecialcharsbx($USER->GetFullName() ?: $USER->GetLogin())?></span>
</a>

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
        <h6><?=htmlspecialcharsbx($USER->GetFullName() ?: $USER->GetLogin())?></h6>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <a class="dropdown-item d-flex align-items-center" href="<?=$profileUrl?>">
            <i class="bi bi-person"></i>
            <span><?=GetMessage("AUTH_PROFILE")?></span>
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <a class="dropdown-item d-flex align-items-center" href="/?logout=yes">
            <i class="bi bi-box-arrow-right"></i>
            <span><?=GetMessage("AUTH_LOGOUT")?></span>
        </a>
    </li>
</ul>