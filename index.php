<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries Task</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    <h1>Countries Task</h1>
    <form action="index.php" method="post">
        <label>
            <input type="text" name="countryName" placeholder="Country Name">
        </label>
        <label>
            <input type="submit" value="Submit">
        </label>
    </form>
    </body>
</html>

<?php
    include_once("myFunctions.php");
    if(isset($_POST['countryName'])){
        $countryNameFromUser = htmlentities($_POST['countryName']);

        $fileDictName = "dictionary.txt";
        $dictFile = fopen($fileDictName, "a+") or die("Unable to open file!");

        if($countryNameFromUser == ''){
            echo "<p>Please, fill the field!</p>";
            return;
        }
        else if(!isCountryReal($countryNameFromUser, $dictFile)){
            echo "<p>There is no such country.</p>";
            return;
        }
        else{
            $countryNameToWrite = $countryNameFromUser."\n";
            $fileCountryName = "country.txt";
            $countryFile = fopen($fileCountryName, "a+") or die("Unable to open file!");

            fwrite($countryFile, $countryNameToWrite);
            fclose($countryFile);
            fclose($dictFile);

            $countryFile = fopen($fileCountryName, "a+") or die("Unable to open file!");
            $arr = getCountriesArr($countryFile);
            //print_r($arr);
            fclose($countryFile);

            echo "<form action='index.php' method='post'>";
            echo "<select>";

            foreach($arr as $country){
                if($country != "")
                    echo "<option value='$country'>$country</option>";
            }
            echo "</select>";
            echo "</form>";
        }
    }
?>