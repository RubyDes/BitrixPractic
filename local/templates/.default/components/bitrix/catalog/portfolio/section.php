<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["VARIABLES"]["SECTION_ID"])
{
    CModule::IncludeModule("iblock");
    $rsSection = CIBlockSection::GetByID($arResult["VARIABLES"]["SECTION_ID"]);
    if($arSection = $rsSection->GetNext())
    {
        $APPLICATION->SetTitle($arSection["NAME"]);
    }
}
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "portfolio_list",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "PAGE_ELEMENT_COUNT" => "10",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
    )
);?>