<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/header.php";
?>

<div class="col-lg-4">
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "left_menu",
        Array(
            "ROOT_MENU_TYPE" => "left",
            "MENU_CACHE_TYPE" => "Y",
            "MENU_CACHE_TIME" => "3600",
            "MAX_LEVEL" => "1",
            "CACHE_SELECTED_ITEMS" => "Y",
            "USE_EXT" => "Y"
        )
    );?>

    <div class="service-box">
        <h4>Материалы</h4>
        <div class="download-catalog">
            <a href="#"><i class="bi bi-filetype-pdf"></i><span>Скачать PDF</span></a>
            <a href="#"><i class="bi bi-file-earmark-word"></i><span>Скачать DOC</span></a>
        </div>
    </div>

    <div class="help-box d-flex flex-column justify-content-center align-items-center">
        <i class="bi bi-headset help-icon"></i>
        <h4>Вопросы?</h4>
        <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+7 000 000 00 00</span></p>
        <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@company.ru</a></p>
    </div>
</div>

<div class="col-lg-8 ps-lg-5">
    <div class="page-content-title">
        <div class="position-relative">
            <h1><?php $APPLICATION->ShowTitle(false); ?></h1>
            <p><?php $APPLICATION->ShowProperty("page_text_under_title"); ?></p>
            
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "content_template", 
                array(
                    "START_FROM" => "0",
                ),
                null,
                array("HIDE_ICONS" => "Y")
            );
            ?>
        </div>
    </div>
    <div class="content-wrapper">