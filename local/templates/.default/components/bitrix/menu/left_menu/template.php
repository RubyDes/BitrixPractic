<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="service-box">
    <div class="services-list">
        <?foreach($arResult as $arItem):?>
            <?
            $iconClass = "bi-arrow-right-circle";
            
            if(!empty($arItem["PARAMS"]["menu_ico"])){
                $iconClass = $arItem["PARAMS"]["menu_ico"];
            }
            
            $activeClass = ($arItem["SELECTED"]) ? "active" : "";
            ?>
            
            <a href="<?=$arItem["LINK"]?>" class="<?=$activeClass?>">
                <i class="bi <?=$iconClass?>"></i>
                <span><?=$arItem["TEXT"]?></span>
            </a>
        <?endforeach;?>
    </div>
</div>