<?php if(!isset($_COOKIE["language"])) {
    $language = json_decode(file_get_contents("../../multilanguage/English.json"), true);
} else {
    $language = json_decode(file_get_contents("../../multilanguage/".$_COOKIE["language"].".json"), true);
}
?>