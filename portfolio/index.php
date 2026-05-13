<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
$APPLICATION->SetPageProperty("page_text_under_title", "Ознакомьтесь с нашими успешными проектами и реализованными решениями.");

?>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog",
    "portfolio",
    Array(
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "13",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/portfolio/",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SEF_URL_TEMPLATES" => Array(
            "sections" => "",
            "section" => "#SECTION_ID#/",
            "element" => "#SECTION_ID#/#ELEMENT_ID#/",
        ),
        "VARIABLE_ALIASES" => Array(
            "sections" => Array(),
            "section" => Array("SECTION_ID" => "SECTION_ID"),
            "element" => Array("ELEMENT_ID" => "ELEMENT_ID", "SECTION_ID" => "SECTION_ID"),
        )
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
