<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(empty($arResult)) {
    echo GetMessage("DETAIL_ELEMENT_NOT_FOUND");
    return;
}
?>

<div class="table-detail">
    <style>
        .table-detail .label {
            font-weight: 600;
            color: rgba(1, 41, 112, 0.6);
            width: 200px;
        }
        .table-detail .row {
            margin-bottom: 20px;
        }
        .table-detail .value {
            color: #012970;
        }
    </style>
    
    <h5 class="card-title mb-4"><?=GetMessage("DETAIL_TITLE")?> <?=htmlspecialcharsbx($arResult['ID'])?></h5>
    
    <div class="row">
        <div class="col-2 label"><?=GetMessage("DETAIL_PRODUCT")?></div>
        <div class="col-10 value"><?=htmlspecialcharsbx($arResult['PROPERTIES']['PRODUCT']['VALUE'])?></div>
    </div>
    
    <div class="row">
        <div class="col-2 label"><?=GetMessage("DETAIL_CATEGORY")?></div>
        <div class="col-10 value"><?=htmlspecialcharsbx($arResult['PROPERTIES']['PRODUCT_CATEGORY']['VALUE'])?></div>
    </div>
    
    <div class="row">
        <div class="col-2 label"><?=GetMessage("DETAIL_CITY")?></div>
        <div class="col-10 value"><?=htmlspecialcharsbx($arResult['PROPERTIES']['CITY']['VALUE'])?></div>
    </div>
    
    <div class="row">
        <div class="col-2 label"><?=GetMessage("DETAIL_QUANTITY")?></div>
        <div class="col-10 value"><?=htmlspecialcharsbx($arResult['PROPERTIES']['QUANTITY']['VALUE'])?></div>
    </div>
</div>