<?php
define("BX_NO_HEADER", true);
define("BX_SKIP_SESSION_EXPAND", true);
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("BX_NO_ACCELERATOR_RESET", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION;
CModule::IncludeModule("iblock");

$elementId = intval($_REQUEST['ELEMENT_ID']);
$iblockId = 12;

$rsElement = CIBlockElement::GetList(
    array(),
    array("IBLOCK_ID" => $iblockId, "ID" => $elementId),
    false,
    false,
    array("ID", "NAME", "PROPERTY_PRODUCT", "PROPERTY_PRODUCT_CATEGORY", "PROPERTY_CITY", "PROPERTY_QUANTITY")
);
$arElement = $rsElement->Fetch();

if(!$arElement) {
    LocalRedirect("/statistic_na/main/table/");
    die();
}

$product = !empty($arElement['PROPERTY_PRODUCT_VALUE']) 
    ? htmlspecialcharsbx($arElement['PROPERTY_PRODUCT_VALUE']) 
    : htmlspecialcharsbx($arElement['NAME']);
$category = htmlspecialcharsbx($arElement['PROPERTY_PRODUCT_CATEGORY_VALUE']);
$city = htmlspecialcharsbx($arElement['PROPERTY_CITY_VALUE']);
$quantity = htmlspecialcharsbx($arElement['PROPERTY_QUANTITY_VALUE']);

$APPLICATION->SetTitle("Данные - " . $arElement['ID']);
$APPLICATION->SetPageProperty("title", $product . " :: Просмотр элемента");

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/header.php");
?>

<div class="pagetitle mb-4">
    <h1>Данные - <?=$arElement['ID']?></h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card table-detail">
                <div class="card-body">
                    <h5 class="card-title">ID - <?=$arElement['ID']?></h5>
                    <div class="row">
                        <div class="col-2 label">Товар</div>
                        <div class="col-4"><?=$product?></div>
                    </div>
                    <div class="row">
                        <div class="col-2 label">Категория</div>
                        <div class="col-4"><?=$category?></div>
                    </div>
                    <div class="row">
                        <div class="col-2 label">Город</div>
                        <div class="col-4"><?=$city?></div>
                    </div>
                    <div class="row">
                        <div class="col-2 label">Количество</div>
                        <div class="col-4"><?=$quantity?></div>
                    </div>
                    <div class="backurl">
                        <a href="/statistic_na/main/table/">Назад к списку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .table-detail .label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
    }
    .table-detail .row {
        margin-bottom: 20px;
    }
    .table-detail .backurl {
        margin-top: 40px;
        margin-bottom: 20px;
    }
</style>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/footer.php");
?>