<?
$arUrlRewrite = array(
    array(
        "CONDITION" => "#^/projects/([a-zA-Z0-9_-]+)(/)(?:\\\\?.*)?#",
        "RULE" => "ELEMENT_CODE=$1",
        "ID" => "bitrix:news.detail",
        "PATH" => "/projects/detail.php",
    ),
    array(
        "CONDITION" => "#^/news/([a-zA-Z0-9_-]+)(/)(?:\\\\?.*)?#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "bitrix:news.detail",
        "PATH" => "/news/detail.php",
    ),
    array(
        "CONDITION" => "#^/charity/([a-zA-Z0-9_-]+)(/)(?:\\\\?.*)?#",
        "RULE" => "ELEMENT_CODE=\$1",
        "ID" => "bitrix:news.detail",
        "PATH" => "/charity/detail.php",
    ),
);

?>