<?php
/**
* meal_api.php
* Created: Tuesday, Jan 30, 2018
* 
* Juneyoung KANG <juneyoung@juneyoung.kr>
* Gyoha High School
*
* Creates a today school meal JSON file from the NEIS webpage.
* Github : https://github.com/Juneyoung-Kang/school-meal/
*
* How to use?
* http://juneyoung.kr/api/school-meal/meal_api.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2
* 
* For more information, visit github and see README.md
*
* Licensed under The MIT License
*/

error_reporting(0);                           // error reporting disable
header("Content-type: application/json; charset=UTF-8");        // json type and UTF-8 encoding

require "simple_html_dom.php";                // use 'simple_html_dom.php'

$countryCode = $_GET['countryCode'];          // local office of education website
$schulCode =  $_GET['schulCode'];             // school code
$insttNm = $_GET['insttNm'];                  // school name
$schulCrseScCode = $_GET['schulCrseScCode'];  // school levels code
$schMmealScCode = $_GET['schMmealScCode'];    // meal kinds code

// custom date
// $schYmd = $_GET['schYmd'];

$MENU_URL = "sts_sci_md01_001.do";            // view weekly table

$today=date("Y.m.d");                         // get date using date() function. ex) 2018.01.01
$day=date("w");                               // get day using date() function. ex) 0==Sunday, 1==Monday, 6==Saturday

// url for today
$URL="http://" . $countryCode . "/" . $MENU_URL . "?schulCode=" . $schulCode . "&insttNm=" . urlencode( $insttNm ) . "&schulCrseScCode=" . $schulCrseScCode . "&schMmealScCode=" . $schMmealScCode . "&schYmd=" . $today;

// DOMDocument
$dom=new DOMDocument;

// load HTML file 
$html=$dom->loadHTMLFile($URL);
$dom->preserveWhiteSpace=false;

// get elements by tag name
$table=$dom->getElementsByTagName('table');
$tbody=$table->item(0)->getElementsByTagName('tbody');
$rows=$tbody->item(0)->getElementsByTagName('tr');
$cols=$rows->item(1)->getElementsByTagName('td');

// check blank has values
if($cols->item($day)->nodeValue==null){
    echo '';
}else{
    $final=$cols->item($day)->nodeValue;
}

// replace unnecessary characters
$final=preg_replace("/[0-9]/", "", $final);
$final=str_replace(".", "", $final);

// change code number to text
if($schulCrseScCode==1){
    $schulCrseScCode="유치원";
}
if($schulCrseScCode==2){
    $schulCrseScCode="초등학교";
}
if($schulCrseScCode==3){
    $schulCrseScCode="중학교";
}
if($schulCrseScCode==4){
    $schulCrseScCode="고등학교";
}
if($schMmealScCode==1){
    $schMmealScCode="조식";
}
if($schMmealScCode==2){
    $schMmealScCode="중식";
}
if($schMmealScCode==3){
    $schMmealScCode="석식";
}

// no meal
if($final==null){
    $final="오늘은 급식이 없습니다.";
}

// array
$array = array(
    '교육청 코드' => $countryCode,
    '학교 코드' => $schulCode,
    '학교 명' => $insttNm,
    '학교 종류' => $schulCrseScCode,
    '급식 종류' => $schMmealScCode,
    '날짜' => $today,
    '메뉴' => $final
);

// json encoding
$json = json_encode($array, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

// echo json
echo $json;
?>