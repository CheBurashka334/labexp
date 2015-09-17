<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

    <div class="main-menu-box">
        <ul class="main-menu nostyle">
    <?
    foreach($arResult as $arItem):
        if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
            continue;
        ?>
        <?if($arItem["SELECTED"]):?>
            <li class="menu-item">
                <a href="<?=$arItem["LINK"]?>" <?if($arItem['PARAMS']['ajax']=='y'):?>data-href="<?echo $arItem["LINK"]?>?ajax=y"<?endif;?> class="menu-link active <?if($arItem['PARAMS']['ajax']=='y'):?>get-page-content<?endif;?>"><?=$arItem["TEXT"]?></a>
            </li>
         <?else:?>
            <li class="menu-item">
                <a href="<?=$arItem["LINK"]?>" <?if($arItem['PARAMS']['ajax']=='y'):?>data-href="<?echo $arItem["LINK"]?>?ajax=y"<?endif;?> class="menu-link <?if($arItem['PARAMS']['ajax']=='y'):?>get-page-content<?endif;?>"><?=$arItem["TEXT"]?></a>
            </li>
        <?endif?>
    <?endforeach?>
        </ul>
    </div>
<?endif?>