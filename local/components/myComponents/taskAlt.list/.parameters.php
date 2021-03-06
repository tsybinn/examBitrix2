<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
    if(!CModule::IncludeModule("iblock"))
        return;
    //***** формирования массива типов инфоблоков

    $arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));
//*** формирование списков инфоблоков
    $arIBlocks=array();
    $db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
    while($arRes = $db_iblock->Fetch())
        $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

   //** формирования массива свойств инфоблока */
    $arProperty_LNS = array();
    $rsProp = CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array(
        "ACTIVE"=>"Y",
        "IBLOCK_ID"=>(isset($arCurrentValues["IBLOCK_ID"])?$arCurrentValues["IBLOCK_ID"]:$arCurrentValues["ID"])));

    while ($arr=$rsProp->Fetch())
    {
        $arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
        if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S")))
        {
            $arProperty_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
        }
    }

    $arComponentParameters = array(
        "GROUPS" => array(
        ),
        "PARAMETERS" => array(
            "IBLOCK_TYPE" => array(
                "PARENT" => "BASE",
                "NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
                "TYPE" => "LIST",
                "VALUES" => $arTypesEx,
                "DEFAULT" => "news",
                "REFRESH" => "Y",
            ),
            "IBLOCK_ID" => array(
                "PARENT" => "BASE",
                "NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
                "TYPE" => "LIST",
                "VALUES" => $arIBlocks,
                "DEFAULT" => '={$_REQUEST["ID"]}',
                "ADDITIONAL_VALUES" => "Y",
                "REFRESH" => "Y",
            ),
            "ELEMENT_COUNT" => array(
                "PARENT" => "BASE",
                "NAME" => GetMessage("T_IBLOCK_DESC_LIST_CONT"),
                "TYPE" => "STRING",
                "DEFAULT" => "5",
            ),

            "PROPERTY_CODE" => array(
                "PARENT" => "DATA_SOURCE",
                "NAME" => GetMessage("T_IBLOCK_PROPERTY"),
                "TYPE" => "LIST",
                "MULTIPLE" => "Y",
                "VALUES" => $arProperty_LNS,
                "ADDITIONAL_VALUES" => "N",
            ),
            "CACHE_TIME"  =>  Array("DEFAULT"=>180),
            "CACHE_GROUPS" => array(
                "PARENT" => "CACHE_SETTINGS",
                "NAME" => GetMessage("CP_BPR_CACHE_GROUPS"),
                "TYPE" => "CHECKBOX",
                "DEFAULT" => "Y",
            ),
        ),
    );

//** пагинация */
    CIBlockParameters::AddPagerSettings(
        $arComponentParameters,
        GetMessage("T_IBLOCK_DESC_PAGER_NEWS"), //$pager_title
        true, //$bDescNumbering
        true, //$bShowAllParam
        true, //$bBaseLink
        $arCurrentValues["PAGER_BASE_LINK_ENABLE"]==="Y" //$bBaseLinkEnabled
    );
