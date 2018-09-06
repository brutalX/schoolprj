<?php
ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    $servername = "localhost";
    $serverusername = "root";
    $serverpassword = "";
    $database = "phpprog";

    $connection = new mysqli($servername,$serverusername,$serverpassword,$database);

    function getLastLoginTime($current,$previous){
            // $currentTime = strtotime($current);
            // $previousTime = strtotime($previous);
            $secondsDifference = $current - $previous;
            if ($secondsDifference > 86400){
                return '<span class="greenspan">'. round ($secondsDifference / 86400) ."d</span>" ;
            }
            else if ($secondsDifference > 3600){
                return '<span class="greenspan">'. round ($secondsDifference / 3600) ."h</span>" ;
            }
            else if ($secondsDifference >60){
                return '<span class="greenspan">'. round ($secondsDifference / 60) ."m</span>" ;
            }
            else{
                return '<span class="greenspan">'.$secondsDifference ."s</span>" ;
            }
            
        }
    ?>