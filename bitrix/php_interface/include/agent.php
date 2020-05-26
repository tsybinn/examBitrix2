<?

function AgentCheckPrice()
{

    if (CModule::IncludeModule("iblock")) {
        $arSort = false;
        $arFilter = array(

            "IBLOCK_ID" => IBLOCK_CAT_ID,
            "ACTIVE" => "Y",
            "ID" => $arTemp,
            "PROPERTY_PRICE" => false,
        );
        $arGroupBy = false;
        $arNavStartParams = array("nTopCount" => 50); //; вот здесь  надо или из елемента инфоблока
        $arSelect = array("ID", "NAME", "PROPERTY_PRICE",);
        $DBres = CIBlockElement::GetList(
            $arSort,
            $arFilter,
            $arGroupBy,
            $arNavStartParams,
            $arSelect
        );

        $arResult = array(); // масссив  с значениями полец связанных елементов
        while ($arRes = $DBres->GetNext()) {

            $arResult[] = $arRes;
        }

        //dump($arResult);
        CEventLog::Add(
            array(
                'SEVERITY' => 'SECURITY',
                'AUDIT_TYPE_ID' => 'CHEK_PRICE',
                'MODULE_ID' => 'infoblock',
                'ITEM_ID' => 'infoblock',
                'DESCRIPTION' => "Поверка цен, нет цен для " . count($arResult) . "elements",
            )
        );


        if (count($arResult)) {
            $filter = array("GROUPS_ID" => array(GROUP_ADMIN_ID));

            $rsUser = CUser::GetList(($by = "personal_country"), ($order = "desc"), $filter);
            $arEmail = array();

            while ($arUser = $rsUser->GetNext()) {

                $arEmail[] = $arUser["EMAIL"];
            }

            if (count($arEmail) > 0) {

                $arEventFields = array(
                    "TEXT" => count($arResult),
                    "EMAIL" => implode(", ", $arEmail)

                );

            CEvent::Send("CHECK_CATALOG", SITE_ID, $arEventFields) ; 
            }
        }


        
    }
    return "AgentCheckPrice();";
}
