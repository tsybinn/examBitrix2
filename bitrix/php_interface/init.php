<?
include_once("myFunction.php");

define("IBLOCK_CAT_ID",2);
define("IBLOCK_NEWS_ID",1);
define("IBLOCK_STOCKS_ID",5);
define("GROUP_ADMIN_ID",1);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/agent.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/php_interface/include/agentCheckActivity.php");