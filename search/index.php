<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:search.page",
    "search_page",
    Array(
        "RESTART" => "N",
        "NO_WORD_LOGIC" => "N",
        "CHECK_DATES" => "N",
        "USE_TITLE_RANK" => "N",
        "DEFAULT_SORT" => "rank",
        "FILTER_NAME" => "",
        "arrFILTER" => array("iblock_content"),
        "arrFILTER_iblock_content" => array("13"),
        "SHOW_WHERE" => "N",
        "SHOW_WHEN" => "N",
        "PAGE_RESULT_COUNT" => "6",
        "PAGER_TEMPLATE" => "modern",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "3600",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_SHOW_ALWAYS" => "N",
        "USE_SUGGEST" => "N",
        "SHOW_RATING" => "N",
        "SHOW_ITEM_TAGS" => "N",
        "SHOW_USER_TAGS" => "N",
        "SHOW_ITEM_DATE_CHANGE" => "N",
        "SHOW_ORDER_BY" => "N",
        "SHOW_TAGS_CLOUD" => "N",
        "AJAX_MODE" => "N",
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>