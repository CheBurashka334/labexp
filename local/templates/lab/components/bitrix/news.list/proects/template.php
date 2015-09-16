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
$this->setFrameMode(true);
?>
<?
use \Bitrix\Main\Localization\Loc as LC;
?>
<div class="projects-list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

        <div class="project-item" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');">
            <div class="container container-small">
                <div class="item-title large"><?echo $arItem["NAME"]?></div>
                <div class="item-anons"><?echo $arItem["PREVIEW_TEXT"];?></div>
                <a class="btn read-more get-page-content" href="<?echo $arItem["DETAIL_PAGE_URL"]?>" data-href="<?echo $arItem["DETAIL_PAGE_URL"]?>?ajax=y" <?/*onclick="ajlink('<?echo $arItem["DETAIL_PAGE_URL"]?>');"*/?>><?=LC::getMessage('NAME_BTN');?></a>
            </div>
        </div>

    <?endforeach;?>
</div>
