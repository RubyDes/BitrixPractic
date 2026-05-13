<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Данные");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"table", 
	array(
		"IBLOCK_TYPE" => "statistic", 
		"IBLOCK_ID" => "14",           
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",            
		"SEF_FOLDER" => "/statistic_na/main/table/",
		"CACHE_TYPE" => "A",          
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		
		"SEF_URL_TEMPLATES" => array(
			"news" => "",                 
			"section" => "",
			"detail" => "#ELEMENT_ID#/",  
		),
		"VARIABLE_ALIASES" => array(
			"news" => array(),
			"section" => array(),
			"detail" => array(
				"ELEMENT_ID" => "ELEMENT_ID",
			),
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
