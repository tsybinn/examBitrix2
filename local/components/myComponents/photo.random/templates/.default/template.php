<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="photo-random">
	<?if(is_array($arResult["PICTURE"])):?>
        <?
        $this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
		<a href="<?=$arResult["DETAIL_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arResult['ID']);?>"><img
				border="0"
				src="<?=$arResult["PICTURE"]["src"]?>"
				width="<?=$arResult["PICTURE"]["width"]?>"
				height="<?=$arResult["PICTURE"]["height"]?>"
				alt="<?=$arResult["PICTURE"]["ALT"]?>"
				title="<?=$arResult["PICTURE"]["TITLE"]?>"
				/></a><br />
	<?endif?>
	<a href="<?=$arResult["DETAIL_PAGE_URL"]?>"><?=$arResult["NAME"]?></a>
</div>
<?
$frame->end();
?>