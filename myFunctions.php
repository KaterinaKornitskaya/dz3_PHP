<?php
function getCountriesArr($countryFile){
    $fileContent = "";
    while(!feof($countryFile)) {
        $fileContent .= fgets($countryFile);
    }
    $countriesArr = preg_split("/\s/", $fileContent);
    return $countriesArr;
}

function isCountryReal($country, $dictionaryFile)
{
    $dictionaryArr = getCountriesArr($dictionaryFile);
    foreach ($dictionaryArr as $item) {
        if($item == $country){
            return true;
        }
    }
    return false;
}

function isCountryUnique($country, $countryFile)
{
    $fl = true;
    $dictionaryArr = getCountriesArr($countryFile);
    foreach ($dictionaryArr as $item) {
        if($item != $country){
            continue;
        }
        else{
            $fl = false;
        }
    }
    return $fl;
}


?>
