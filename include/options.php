<?


    CModule::IncludeModule("iblock");

    //ru
	$arSelect = Array("*");
	$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>'ru');
	$res = CIBlockElement::GetList(Array("name"=>"ASC"), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement())
	{
							
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
	}
	$GLOBALS['options_field'] = $arFields; 
	$GLOBALS['options_props'] = $arProps;

    //en
    $arSelect = Array("*");
    $arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CODE"=>'en');
    $res = CIBlockElement::GetList(Array("name"=>"ASC"), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {

        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
    }
    $GLOBALS['options_field_en'] = $arFields;
    $GLOBALS['options_props_en'] = $arProps;
?>