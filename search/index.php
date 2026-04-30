<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:search.page",
    ".default",
    Array(
        "PAGE_RESULT_COUNT" => "6",
        "PAGER_TEMPLATE" => "modern",
        "RESTART" => "N",
        "NO_WORD_LOGIC" => "N",
        "CHECK_DATES" => "N",
        "USE_TITLE_RANK" => "N",
        "DEFAULT_SORT" => "rank",
        "SHOW_WHERE" => "N",
        "SHOW_WHEN" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_SHOW_ALWAYS" => "N",
        "USE_SUGGEST" => "N",
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>