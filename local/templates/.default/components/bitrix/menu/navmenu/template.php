<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul>
    <?foreach($arResult as $arItem):?>
        <?$hasChildren = !empty($arItem["CHILDREN"]);?>
        
        <?if($hasChildren):?>
            <li class="dropdown">
                <a href="<?=$arItem["LINK"]?>">
                    <span><?=$arItem["TEXT"]?></span>
                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                </a>
                <ul>
                    <?foreach($arItem["CHILDREN"] as $arChild):?>
                        <li><a href="<?=$arChild["LINK"]?>"><?=$arChild["TEXT"]?></a></li>
                    <?endforeach;?>
                </ul>
            </li>
        <?else:?>
            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
        <?endif;?>
        
    <?endforeach;?>
</ul>