<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if (!empty($arResult)):?>
<div class="services-list">
    <?foreach ($arResult as $arItem):?>
        <a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?>class="active"<?endif?>>
            <i class="bi <?=$arItem['ICON_CLASS']?>"></i>
            <span><?=$arItem["TEXT"]?></span>
        </a>
    <?endforeach;?>
</div>
<?endif;?>