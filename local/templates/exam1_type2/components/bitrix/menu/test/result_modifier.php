<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if(!isset($arResult) || !is_array($arResult)) {
    return;
}


$icons = array(
    'Дашборд' => 'bi-grid',
    'Основные' => 'bi-menu-button-wide',
    'Дополнительные' => 'bi-files',
    'Профиль' => 'bi-person'
);

foreach($arResult as &$arItem) {
    if(!isset($arItem['PARAMS'])) {
        $arItem['PARAMS'] = array();
    }
    
    if(empty($arItem['PARAMS']['menu_ico']) && isset($icons[$arItem['TEXT']])) {
        $arItem['PARAMS']['menu_ico'] = $icons[$arItem['TEXT']];
    }
}
unset($arItem);
?>