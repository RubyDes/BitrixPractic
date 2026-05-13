<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "/portfolio/",
        "SECTION_PAGE_URL" => "#SECTION_ID#/",
        "DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#/",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "13",
        "DEPTH_LEVEL" => "2",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    )
);

if (is_array($aMenuLinksExt)) {
    foreach ($aMenuLinksExt as $menuItem) {
        if (is_array($menuItem)) {
            if (isset($menuItem[1]) && is_array($menuItem[1])) {
                $menuItem[1] = !empty($menuItem[1]) ? (string)current($menuItem[1]) : "";
            }
            if (isset($menuItem[1])) {
                $menuItem[1] = (string)$menuItem[1];
            }
            $aMenuLinks[] = $menuItem;
        }
    }
}
