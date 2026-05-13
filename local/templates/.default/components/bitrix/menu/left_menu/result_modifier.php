<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

foreach ($arResult as $key => &$arItem) {
    $iconClass = $arItem['PARAMS']['menu_ico'];
    if (empty($iconClass)) {
        $iconClass = 'bi-arrow-right-circle';
    }
    $arItem['ICON_CLASS'] = $iconClass;
}
?>