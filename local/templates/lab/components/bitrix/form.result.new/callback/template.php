<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc as LC;

?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
    <p class="xx-big">
        <?=$arResult["FORM_NOTE"]?>
    </p>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	?>
           <?/* <pre>
                <?print_r($arQuestion)?>
            </pre>*/?>

				<?/*if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				    <span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>

                <?=$arQuestion["HTML_CODE"]*/?>
                <?
                    switch ($arQuestion['STRUCTURE'][0]['FIELD_TYPE']) {
                        case 'text':
                            ?>
                            <input type="text" class="inputtext" name="form_text_<?=$arQuestion['STRUCTURE'][0]['FIELD_ID']?>" placeholder="<?=$arQuestion['CAPTION']?>" />
                            <?
                            break;
                        case 'textarea':
                            ?>
                            <div class="textarea-field">
                                <textarea class="inputtext" name="form_textarea_<?=$arQuestion['STRUCTURE'][0]['FIELD_ID']?>" placeholder="<?=$arQuestion['CAPTION']?>" rows="3"></textarea>
                                <div class="lines"></div>
                            </div>
                            <?
                            break;
                       /*case 'text':
                            break;*/

                 }
            ?>
	<?
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
		<?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
        <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />

<?
} // isUseCaptcha
?>


				&nbsp;<input type="hidden" name="web_form_apply" value="Y" />
                <input type="submit" name="web_form_apply" class="btn" value="<?=LC::getMessage("FORM_APPLY_NEW")?>" />



<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>