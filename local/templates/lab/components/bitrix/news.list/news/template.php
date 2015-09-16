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
    //D7 локализация
    use \Bitrix\Main\Localization\Loc as LC;
?>
<div class="news-list">
    <div class="block-title large container container-small"><?=LC::getMessage('NEWS');?></div>
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
        <div class="news-item">
            <a class="container container-small item-link get-page-content" href="<?echo $arItem["DETAIL_PAGE_URL"]?>" data-href="<?echo $arItem["DETAIL_PAGE_URL"]?>?ajax=y">
                <div class="item-date x-small">
                    <?echo EditData($arItem["DISPLAY_ACTIVE_FROM"])?>
                </div>
                <div class="item-title x-big"><?echo $arItem["NAME"]?></div>
                <div class="item-anons"><?echo $arItem["PREVIEW_TEXT"];?></div>
            </a>
        </div>
    <?endforeach;?>
</div>
