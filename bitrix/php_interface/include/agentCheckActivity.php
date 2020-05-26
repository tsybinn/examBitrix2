<?



function agentCheckActivity()
{

    if (CModule::IncludeModule("iblock")) 
    {
        $arSelect = array("ID");
        $arFilter = array("IBLOCK_ID" => IBLOCK_STOCKS_ID, "!ACTIVE_DATE" => "Y");  // Чтобы выбрать все не активные по датам элементы, используется такой синтаксис: "!ACTIVE_DATE"=> "Y"
        $rsResCat = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect); //выбрать все не активные по датам элементы
        $arItems = array();
        while ($arItemCat = $rsResCat->GetNext()) {
            $arItems[] = $arItemCat;
        }
        //dump($arItems);

        if (count($arItems) > 0) {
            //отправка опевещения в журнал событий
            CEventLog::Add(array(
                "SEVERITY" => "SECURITY",
                "AUDIT_TYPE_ID" => "CHECK_ACTIVI",
                "MODULE_ID" => "iblock",
                "ITEM_ID" => "IBLOCK_STOCKS_ID",
                "DESCRIPTION" => "Проверка  неактивных елементов по дате, неактивных  " . count($arItems) . " элемента",
            ));


            $arFilter = array(
                "GROUPS_ID" => array(2)
            );
            $rsUsers = CUser::GetList(($by = "personal_country"), ($order = "desc"), $arFilter); // вытаскиваем данные всех администраторов
            $arEmail = array();

            while ($arResUser = $rsUsers->GetNext()) {
                $arEmail[] = $arResUser["EMAIL"]; // array  emails admin
            };

            $arEventFields = array(
                "TEXT" => "Проверка  неактивных елементов по дате, неактивны  " . count($arItems) . " элементов",
                "EMAIL" => implode(", ", $arEmail), //greate list email 
            );
            CEvent::Send("INFO_ACTIVITY_ELEMENTS", "s1", $arEventFields); //cоздает почтовое событие которое будет в дальнейшем отправлено в качестве E-Mail сообщения


        }
    }

    return "agentCheckActivity();";

}





























?>