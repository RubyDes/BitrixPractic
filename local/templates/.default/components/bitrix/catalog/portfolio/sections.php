<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "portfolio_sections",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_ID" => "0",
        "TOP_DEPTH" => "2",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    )
);?>