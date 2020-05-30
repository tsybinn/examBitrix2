<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    /** @var array $arParams */
    /** @var array $arResult */
    /** @global CMain $APPLICATION */
    /** @global CUser $USER */
    /** @global CDatabase $DB */
    /** @var CBitrixComponentTemplate $this */
    /** @var string $templateName */
    /** @var string $templateFile */
    /** @var string $templateFolder */
    /** @var string $componentPath */
    /** @var CBitrixComponent $component */
    $frame = $this->createFrame()->begin('');
?>
<? //dump($arResult) ?>
<?php

    foreach ($arResult as  $key=>$Items):?>

        <ul class="vacant" >
            <li id="elem"><h3><?=$key?></h3></li>
            <ul  id="elem2" >
                <? foreach ($Items as $elem) :?>
                    <?
                    $this->AddEditAction(
                            $elem['ID'], $elem['EDIT_LINK'], CIBlock::GetArrayByID($elem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction(
                            $elem['ID'], $elem['DELETE_LINK'], CIBlock::GetArrayByID($elem["IBLOCK_ID"], "ELEMENT_DELETE"), array(
                                    "CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <li id="<?=$this->GetEditAreaId($elem['ID']);?>" class="panel"><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>

                    <?endforeach;?>

            </ul>
        </ul>


    <? $i++; endforeach ?>
<script>
    let elem1 = document.querySelector('#elem');
    let elem2 = document.querySelector('#elem2');
    elem1.addEventListener('click', func);


    function func() {
        elem2.classList.toggle('active');
    }

</script>