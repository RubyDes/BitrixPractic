<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @var CBitrixComponentTemplate $this */
?>

<form action="<?=$arResult["FORM_ACTION"]?>" class="search-form">
    <input class="input-seach" type="text" name="q" placeholder="">
    <input class="button-seach" name="s" type="submit" value="<?=GetMessage("SEARCH_BUTTON")?>">
</form>