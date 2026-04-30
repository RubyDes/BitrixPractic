<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/boot.php";

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . '/assets/vendor/bootstrap/css/bootstrap.min.css');
Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . '/assets/vendor/aos/aos.css');
Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . '/assets/css/main.css');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?$APPLICATION->ShowHead();?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="scrolled">

<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <h1 class="sitename"><?=GetMessage("COMPANY_NAME")?></h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "horizontal_multilevel",
                Array(
                    "ROOT_MENU_TYPE" => "top",
                    "CHILD_MENU_TYPE" => "left",
                    "MENU_CACHE_TYPE" => "Y",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => "",
                    "MAX_LEVEL" => "3",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                )
            );?>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>

<main class="main">