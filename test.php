<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
    $APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent("myComponents:vacancies.list", "current", Array(
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "180",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"DETAIL_URL" => "",
		"IBLOCK_ID" => "4",	// Инфоблок
		"IBLOCK_PROP" => "",
		"IBLOCK_TYPE" => "vacancies",	// Тип инфоблока
		"IMG_HEIGHT1" => "99",
		"IMG_WIDTH1" => "99",
		"PARENT_SECTION" => "",	// ID раздела
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>