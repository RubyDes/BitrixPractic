<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->setJsToBody(true);

if(method_exists($asset, 'setMinifyCss')) $asset->setMinifyCss(true);
if(method_exists($asset, 'setMinifyJs')) $asset->setMinifyJs(true);
if(method_exists($asset, 'setCombineCss')) $asset->setCombineCss(true);
if(method_exists($asset, 'setCombineJs')) $asset->setCombineJs(true);

global $APPLICATION, $USER;
$templatePath = '/local/templates/exam1_type2';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php $APPLICATION->ShowTitle()?></title>
    <?php $APPLICATION->ShowHead();?>
    
    <link href="<?=$templatePath?>/assets/img/favicon.png" rel="icon">
    <link href="<?=$templatePath?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$templatePath?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?=$templatePath?>/assets/css/style.css" rel="stylesheet">
    
    <style>
        #panel, #bx-panel, .adm-warning-block, .adm-informer, .bx-breadcrumb {
            display: none !important;
        }
    </style>
</head>
<body>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/statistic_na/dashboard/" class="logo d-flex align-items-center">
            <img src="<?=$templatePath?>/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Статистика</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <?php if($USER->IsAuthorized()): ?>
                <li class="nav-item dropdown pe-3" style="position: relative;">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?=htmlspecialcharsbx($USER->GetFullName() ?: $USER->GetLogin())?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?=htmlspecialcharsbx($USER->GetFullName() ?: $USER->GetLogin())?></h6>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/statistic_na/profile/">
                                <i class="bi bi-person me-2"></i>
                                <span>Мой профиль</span>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/statistic_na/logout.php">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                <span>Выйти</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/statistic_na/">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        <span>Войти</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?=($_SERVER['REQUEST_URI'] == '/statistic_na/dashboard/') ? 'active' : ''?>" href="/statistic_na/dashboard/">
                <i class="bi bi-grid"></i>
                <span>Дашборд</span>
            </a>
        </li>

        <li class="nav-item">
            <?php
            $isMainActive = (strpos($_SERVER['REQUEST_URI'], '/statistic_na/main/') !== false);
            ?>
            <a class="nav-link collapsed <?=$isMainActive ? 'active' : ''?>" 
               data-bs-target="#main-nav" 
               data-bs-toggle="collapse" 
               href="#">
                <i class="bi bi-menu-button-wide"></i>
                <span>Основные</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="main-nav" class="nav-content collapse <?=$isMainActive ? 'show' : ''?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/statistic_na/main/info/" class="<?=($_SERVER['REQUEST_URI'] == '/statistic_na/main/info/') ? 'active' : ''?>">
                        <i class="bi bi-circle"></i>
                        <span>Отчеты</span>
                    </a>
                </li>
                <li>
                    <a href="/statistic_na/main/table/" class="<?=($_SERVER['REQUEST_URI'] == '/statistic_na/main/table/') ? 'active' : ''?>">
                        <i class="bi bi-circle"></i>
                        <span>Данные</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <?php
            $isExtraActive = (strpos($_SERVER['REQUEST_URI'], '/statistic_na/extra/') !== false);
            ?>
            <a class="nav-link collapsed <?=$isExtraActive ? 'active' : ''?>" 
               data-bs-target="#add-nav" 
               data-bs-toggle="collapse" 
               href="#">
                <i class="bi bi-files"></i>
                <span>Дополнительные</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="add-nav" class="nav-content collapse <?=$isExtraActive ? 'show' : ''?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/statistic_na/extra/base/" class="<?=($_SERVER['REQUEST_URI'] == '/statistic_na/extra/base/') ? 'active' : ''?>">
                        <i class="bi bi-circle"></i>
                        <span>Базы</span>
                    </a>
                </li>
                <li>
                    <a href="/statistic_na/extra/info/" class="<?=($_SERVER['REQUEST_URI'] == '/statistic_na/extra/info/') ? 'active' : ''?>">
                        <i class="bi bi-circle"></i>
                        <span>Информация</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sample-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Пример раздела</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sample-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="#"><i class="bi bi-circle"></i><span>Пример пункта</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Пример пункта</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Пример пункта</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Пример пункта</span></a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link <?=($_SERVER['REQUEST_URI'] == '/statistic_na/profile/') ? 'active' : ''?>" href="/statistic_na/profile/">
                <i class="bi bi-person"></i>
                <span>Профиль</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?=($_SERVER['REQUEST_URI'] == '/statistic_na/blank/') ? 'active' : ''?>" href="/statistic_na/blank/">
                <i class="bi bi-file-earmark"></i>
                <span>Пустая страница</span>
            </a>
        </li>
    </ul>
</aside>

<main id="main" class="main">
    
    <section class="section <?=$APPLICATION->GetPageProperty("page_css_class")?>">