<?php

flush();

set_time_limit(0);
error_reporting(0);

$get = file_get_contents("https://www.worldometers.info/coronavirus/");
preg_match_all('/<span style="color:#aaa">(.*?) </s', $get, $cases);

    $left_b = $match[1][0];
preg_match_all('/<div class="maincounter-number"> <span>(.*?)</s', $get, $deads);
preg_match_all('/<span class="number-table" style="color:#8ACA2B">(.*?)</s', $get, $recovered);
#--------------------------------------------- style="color:#8ACA2B "> <span>48,238</span>

    $NewCases = $cases[1][0];
    $Death = $deads[1][0];
    $Recovered = $recovered[1][0];

$jsonoutput = array("result"=>true,"New Cases: "=>$NewCases,"death: "=>$Death,"recovered"=>$Recovered);


$encode = json_encode($jsonoutput);
echo $encode;
