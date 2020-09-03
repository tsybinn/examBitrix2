<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акции");
?><?$APPLICATION->IncludeComponent(
	"myComponents:ExchangeRates.list", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"VALUTE_NAME" => array(
			0 => "R01010",
			1 => "R01020A",
			2 => "R01035",
			3 => "R01060",
			4 => "R01090B",
			5 => "R01100",
			6 => "R01115",
			7 => "R01135",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "180",
		"CACHE_GROUPS" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>