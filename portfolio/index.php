<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
?>

<?if(!$_REQUEST["ELEMENT_ID"] && !$_REQUEST["SECTION_ID"]):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "portfolio_sections",
        Array(
            "IBLOCK_ID" => "10",
            "SECTION_ID" => "0",
            "TOP_DEPTH" => "2",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
        )
    );?>
<?endif;?>

<?if($_REQUEST["SECTION_ID"] && !$_REQUEST["ELEMENT_ID"]):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section",
        "portfolio_list",
        Array(
            "IBLOCK_ID" => "10",
            "SECTION_ID" => intval($_REQUEST["SECTION_ID"]),
            "PAGE_ELEMENT_COUNT" => "10",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
        )
    );?>
<?endif;?>

<?if($_REQUEST["ELEMENT_ID"]):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.element",
        "portfolio_detail",
        Array(
            "IBLOCK_ID" => "10",
            "ELEMENT_ID" => intval($_REQUEST["ELEMENT_ID"]),
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
        )
    );?>
<?endif;?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>