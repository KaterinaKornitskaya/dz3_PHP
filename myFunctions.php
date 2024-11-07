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
    $fl = false;
    $dictionaryArr = getCountriesArr($dictionaryFile);
    foreach ($dictionaryArr as $item) {
        if($item == $country){
            $fl = true;
            return $fl;
        }
    }
    return $fl;
}
?>
