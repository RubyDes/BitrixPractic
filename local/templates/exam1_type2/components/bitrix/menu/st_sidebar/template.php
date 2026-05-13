<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?
define("BX_MENU_ALLOW_MULTI_SELECT", true);
foreach($arResult as $key => $arItem) {
    if ($arItem["IS_PARENT"]) {
        $arResult[$key]["CHILD_SELECTED"] = false;
        $j = $key + 1;
        while(isset($arResult[$j]) && $arResult[$j]["DEPTH_LEVEL"] > 1) {
            if ($arResult[$j]["SELECTED"] === true) {
                $arResult[$key]["CHILD_SELECTED"] = true;
                break;
            }
            $j++;
        }
    }
}
?>
<ul class="sidebar-nav" id="sidebar-nav">
<?
$previousLevel = 0;
foreach($arResult as $key => $arItem):
?>
    <?if ($previousLevel > 1 && $arItem["DEPTH_LEVEL"] == 1):?>
        </ul></li>
    <?endif?>

    <?if ($arItem["IS_PARENT"]):?>
        <li class="nav-item">
            <?$targetId = "nav-block-".$key;?> 
            <a class="nav-link <?=($arItem["CHILD_SELECTED"] === true) ? '' : 'collapsed'?>" 
               data-bs-target="#<?=$targetId?>" 
               data-bs-toggle="collapse" 
               href="#">
                <i class="bi <?=htmlspecialcharsbx($arItem["PARAMS"]["menu_ico"])?>"></i>
                <span><?=$arItem["TEXT"]?></span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="<?=$targetId?>" 
                class="nav-content collapse <?=($arItem["CHILD_SELECTED"] === true) ? 'show' : ''?>" 
                data-bs-parent="#sidebar-nav">

    <?else:?>
        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
            <li class="nav-item">
                <a class="nav-link <?=($arItem["SELECTED"]) ? '' : 'collapsed'?>" href="<?=$arItem["LINK"]?>">
                    <i class="bi <?=htmlspecialcharsbx($arItem["PARAMS"]["menu_ico"])?>"></i>
                    <span><?=$arItem["TEXT"]?></span>
                </a>
            </li>
        <?else:?>
            <li>
                <a href="<?=$arItem["LINK"]?>" class="<?=($arItem["SELECTED"]) ? 'active' : ''?>">
                    <i class="bi bi-circle"></i><span><?=$arItem["TEXT"]?></span>
                </a>
            </li>
        <?endif?>
    <?endif?>

    <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>

<?if ($previousLevel > 1):?>
    </ul></li>
<?endif?>
</ul>
<?endif?>
