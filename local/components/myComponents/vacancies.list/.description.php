<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Список вакансий",
	"DESCRIPTION" => "Показывает список каталогов и елементов инфоблока",
    "CACHE_PATH" => "Y",
	"SORT" => 40,
	"PATH" => array(
		"ID" => "additional",
		"CHILD" => array(
			"ID" => "additional",
			"NAME" => GetMessage("T_IBLOCK_DESC_CAT"),
			"SORT" => 20,
		)
	),
);

?>