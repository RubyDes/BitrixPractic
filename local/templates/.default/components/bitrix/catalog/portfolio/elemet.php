<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$elementId = 0;

if(isset($arResult["VARIABLES"]["ELEMENT_ID"]))
{
    $elementId = intval($arResult["VARIABLES"]["ELEMENT_ID"]);
}
elseif(isset($_REQUEST["ELEMENT_ID"]))
{
    $elementId = intval($_REQUEST["ELEMENT_ID"]);
}

if($elementId)
{
    CModule::IncludeModule("iblock");
    $rsElement = CIBlockElement::GetByID($elementId);
    if($arElement = $rsElement->GetNext())
    {
        $APPLICATION->SetTitle($arElement["NAME"]);
    }
}
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.element",
    "portfolio_detail",
    Array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_ID" => $elementId,
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
    )
);?>