<?
include_once("myFunction.php");
define("IBLOCK_CAT_ID",2);
define("IBLOCK_NEWS_ID",1);
define("IBLOCK_STOCKS_ID",5);
define("GROUP_ADMIN_ID",1);
define("IBLOCK_FEEDBACK_ID",6);
define("USER_GRUP_CONTMANEGER",5);
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/agent.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/agentCheckActivity.php");

if (file_exists($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/event_hendlers.php")){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/event_hendlers.php");
    };


// файл /bitrix/php_interface/init.php
// регистрируем обработчик
    AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("MyClass", "OnBeforeIBlockElementDeleteHandler"));






    //Обработчик в файле /bitrix/php_interface/init.php

//        AddEventHandler("main", "OnBeforeEventAdd", array("MyClass", "OnBeforeEventAddHandler"));
//        class MyClass
//        {
//            function OnBeforeEventAddHandler($event, $lid, $arFields)
//            {
//
//                dump($event);
//                dump($lid);
//                dump($arFields);
//               exit();
//    //            $arFields["NEW_FIELD"] = "Новый макрос для почтового шаблона";
//    //            $arFields["VS_BIRTHDAY"] = "Изменение существующего макроса";
//    //            $lid = 's2'; //Изменяем привязку к сайту
//            }
//        }