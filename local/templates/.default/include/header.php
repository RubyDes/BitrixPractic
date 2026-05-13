<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

require_once $_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/boot.php";

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Application;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle();?></title>
    <?
    Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
    Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/vendor/bootstrap-icons/bootstrap-icons.css");
    Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/vendor/aos/aos.css");
    Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/main.css");
    
    Asset::getInstance()->addJs(DEFAULT_TEMPLATE_PATH . "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
    Asset::getInstance()->addJs(DEFAULT_TEMPLATE_PATH . "/assets/vendor/aos/aos.js");
    Asset::getInstance()->addJs(DEFAULT_TEMPLATE_PATH . "/assets/js/main.js");
    $APPLICATION->ShowHead();
    ?>
</head>

<body class="scrolled">

<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>

<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <h1 class="sitename">Компания</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "horizontal_multilevel",
                Array(
                    "ROOT_MENU_TYPE" => "top",
                    "CHILD_MENU_TYPE" => "left",
                    "MAX_LEVEL" => "3",
                    "USE_EXT" => "Y",
                    "MENU_CACHE_TYPE" => "Y",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ALLOW_MULTI_SELECT" => "N",
                    "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                    "TEMPLATE" => "horizontal_multilevel"
                )
            );?>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>

<main class="main">