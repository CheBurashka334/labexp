<?
    //Формирование даты
    function EditData ($DATA,$lang) // конвертирует формат даты с 04.11.2008 в 04 Ноября, 2008
    {
        if($lang=='ru') {
            $MES = array(
                "01" => "января",
                "02" => "февраля",
                "03" => "марта",
                "04" => "апреля",
                "05" => "мая",
                "06" => "июня",
                "07" => "июля",
                "08" => "августа",
                "09" => "сентября",
                "10" => "октября",
                "11" => "ноября",
                "12" => "декабря"
            );
            $arData = explode(".", $DATA);
            $d = ($arData[0] < 10) ? substr($arData[0], 1) : $arData[0];

            $newData = $d . " " . $MES[$arData[1]] . " " . $arData[2];
            return $newData;
        }
        elseif($lang=='en') {
            $MES = array(
                "01" => "january",
                "02" => "February",
                "03" => "March",
                "04" => "April",
                "05" => "May",
                "06" => "June",
                "07" => "July",
                "08" => "August",
                "09" => "September",
                "10" => "October",
                "11" => "November",
                "12" => "December"
            );
            $arData = explode(".", $DATA);
            $d = ($arData[0] < 10) ? substr($arData[0], 1) : $arData[0];

            $newData = $d . " " . $MES[$arData[1]] . " " . $arData[2];
            return $newData;
        }
        else{

        }

    }
?>