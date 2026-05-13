<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!defined('SITE_TEMPLATE_PATH')) {
    define('SITE_TEMPLATE_PATH', '/local/templates/exam1_type2');
}

use Bitrix\Main\Page\Asset;

$curDir = $APPLICATION->GetCurDir();

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap-icons/bootstrap-icons.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/main.js");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?$APPLICATION->ShowTitle();?></title>
    <?$APPLICATION->ShowHead();?>
    <link href="<?=SITE_TEMPLATE_PATH?>/assets/img/favicon.png" rel="icon">
</head>
<body>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/statistic_na/dashboard/" class="logo d-flex align-items-center">
            <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Статистика</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <?$APPLICATION->IncludeComponent(
                "bitrix:system.auth.form",
                "auth_header",
                array(
                    "PROFILE_URL" => "/statistic_na/profile/",
                    "REGISTER_URL" => "",
                    "FORGOT_PASSWORD_URL" => "",
                    "SHOW_ERRORS" => "N"
                ),
                false
            );?>
        </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu", 
        "st_sidebar",
        array(
            "ROOT_MENU_TYPE" => "st_first",
            "CHILD_MENU_TYPE" => "st_second",
            "MAX_LEVEL" => "2",
            "USE_EXT" => "N",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "Y",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_TIME" => "360000",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => array()
        ),
        false
    );?>
</aside>

<main id="main" class="main <?$APPLICATION->ShowProperty("page_css_class");?>">

