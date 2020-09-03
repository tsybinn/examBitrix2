<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
    $APPLICATION->SetTitle("test");
    
?><br>
   <?$APPLICATION->IncludeComponent(
	"myComponents:taskAlt.list", 
	".default", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "180",
		"CACHE_TYPE" => "A",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_COUNT" => "5",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "taskAlt",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "templatesMy",
		"PAGER_TITLE" => "",
		"PROPERTY_CODE" => array(
			0 => "COUNTVOTING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>