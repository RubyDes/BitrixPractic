<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

$product = $arResult["PROPERTIES"]["PRODUCT"]["VALUE"];
$category = $arResult["PROPERTIES"]["PRODUCT_CATEGORY"]["VALUE"];
$city = $arResult["PROPERTIES"]["CITY"]["VALUE"];
$quantity = $arResult["PROPERTIES"]["QUANTITY"]["VALUE"];
?>

<style>
    .table-detail .label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
    }
    .table-detail .row {
        margin-bottom: 20px;
    }
</style>

<div class="pagetitle mb-4">
    <h1><?=GetMessage("EXAM_DATA_TITLE")?> - <?=$arResult["ID"]?></h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card table-detail">
            <div class="card-body">
                <h5 class="card-title"><?=GetMessage("EXAM_ID")?> - <?=$arResult["ID"]?></h5>
                <div class="row">
                    <div class="col-2 label"><?=GetMessage("EXAM_PRODUCT")?></div>
                    <div class="col-4"><?=htmlspecialcharsbx($product)?></div>
                </div>
                <div class="row">
                    <div class="col-2 label"><?=GetMessage("EXAM_CATEGORY")?></div>
                    <div class="col-4"><?=htmlspecialcharsbx($category)?></div>
                </div>
                <div class="row">
                    <div class="col-2 label"><?=GetMessage("EXAM_CITY")?></div>
                    <div class="col-4"><?=htmlspecialcharsbx($city)?></div>
                </div>
                <div class="row">
                    <div class="col-2 label"><?=GetMessage("EXAM_QUANTITY")?></div>
                    <div class="col-4"><?=(int)$quantity?></div>
                </div>
                <div class="backurl">
                    <a href="<?=$arResult["LIST_PAGE_URL"]?>"><?=GetMessage("EXAM_BACK_TO_LIST")?></a>
                </div>
            </div>
        </div>
    </div>
</div>