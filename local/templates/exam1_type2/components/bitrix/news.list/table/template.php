<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(empty($arResult["ITEMS"])) {
    echo '<div class="alert alert-info">Нет данных для отображения</div>';
    return;
}
?>

<style>
    .items-list .item-card {
        border: 1px solid #eef2f6;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        background: #fff;
        transition: all 0.3s;
    }
    .items-list .item-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .items-list .item-title {
        font-size: 18px;
        font-weight: 600;
        color: #012970;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eef2f6;
    }
    .items-list .item-title a {
        color: #012970;
        text-decoration: none;
    }
    .items-list .item-title a:hover {
        color: #4154f1;
    }
    .items-list .row {
        margin-bottom: 12px;
    }
    .items-list .label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
        width: 180px;
    }
    .items-list .value {
        color: #012970;
    }
    .items-list .pagination-wrapper {
        margin-top: 20px;
        text-align: center;
    }
</style>

<div class="items-list">
    <?php foreach($arResult["ITEMS"] as $arItem): ?>
        <div class="item-card">
            <div class="item-title">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                    <?=htmlspecialcharsbx($arItem['PROPERTIES']['PRODUCT']['VALUE'])?>
                </a>
            </div>
            
            <div class="row">
                <div class="label">ID</div>
                <div class="value"><?=htmlspecialcharsbx($arItem['ID'])?></div>
            </div>
            
            <div class="row">
                <div class="label">Категория товара</div>
                <div class="value"><?=htmlspecialcharsbx($arItem['PROPERTIES']['PRODUCT_CATEGORY']['VALUE'])?></div>
            </div>
            
            <div class="row">
                <div class="label">Город</div>
                <div class="value"><?=htmlspecialcharsbx($arItem['PROPERTIES']['CITY']['VALUE'])?></div>
            </div>
            
            <div class="row">
                <div class="label">Количество</div>
                <div class="value"><?=htmlspecialcharsbx($arItem['PROPERTIES']['QUANTITY']['VALUE'])?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if($arResult["NAV_STRING"]): ?>
    <div class="pagination-wrapper">
        <?=$arResult["NAV_STRING"]?>
    </div>
<?php endif; ?>