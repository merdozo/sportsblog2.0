<?php

function loadLanguage($lang = 'tr')
{
    $langFile = ROOT_PATH . '/app/helpers/languages/' . $lang . '.php';
    if (file_exists($langFile)) {
        require($langFile);
        return $lang;
    } else {
        die("Language file not found: " . $langFile);
    }
}

$lang = loadLanguage(); // Load the default language
