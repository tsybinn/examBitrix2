<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукция");
?><?$APPLICATION->IncludeComponent(
	"myComponents:photo.random",
	"",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "180",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"IBLOCK_ID" => "2",
		"IBLOCK_PROP" => "13",
		"IBLOCK_TYPE" => "products",
		"IMG_HEIGHT1" => "99",
		"IMG_WIDTH1" => "99",
		"PARENT_SECTION" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>