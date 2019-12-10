<?php


if (isset($_POST['o'])){
    $o = $_POST['o'];

}

$scoreSystem = array
  (

array("Beginner courses",1),
array("Forms 1-3 in Secondary School",0),
array("CSEC level",1),
array("CAPE level",2),
array("Yes",1),
array("No",0),
array("Writing Code in various Languages (C, Java, etc)",3),
array("Understanding the inner workings of Computer Systems",3),
array("Learning how to fully optimize algorithms and applications",2),
array("Networking and Understanding how the Internet Works",2),
array("I’m fairly adept at writing code",4),
array("I’m ok at writing code",3),
array("I have a basic understanding but not much experience",2),
array("I’ve never written code before",0),
array("I enjoy it",4),
array("I can understand concepts but putting them into practice is difficult",2),
array("Practical aspects are fine but Theory like Proofs go over my head",1),
array("I just don’t like it",0),
array("Theory based",2),
array("Interactive",1),
array("Application Development",4),
array("Database Design/Management",3),
array("Network Manager",3),
array("Computer Repair / Building Systems",1),
array("Database Management",2)


  );

//$spreadsheet_url="https://docs.google.com/spreadsheets/d/e/2PACX-1vSYRAEt1XbwI8jjhu4P1muAJYYz5-3oMkBz_J7tq0ecbbO171qF_RqvDYSXgHOr-iRqqshpo6ScvrIQ/pub?output=csv";
$spreadsheet_url="https://docs.google.com/spreadsheets/d/e/2PACX-1vSYRAEt1XbwI8jjhu4P1muAJYYz5-3oMkBz_J7tq0ecbbO171qF_RqvDYSXgHOr-iRqqshpo6ScvrIQ/pub?gid=1007514533&single=true&output=csv";
if(!ini_set('default_socket_timeout', 15)) echo "<!-- unable to change socket timeout -->";

if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $spreadsheet_data[] = $data;
        
    }
    fclose($handle);

//var_dump($spreadsheet_data);
}
else{
    die("Problem reading csv");
}
$last = array();


//find correct row
foreach ($spreadsheet_data  as  $key=> $value) {

    if($value[10] == $o){

        $last = $value;
    }

}

$score = 0;

//iterate contents of row to get bucket value
foreach ($last as  $key=> $value) {

    foreach($scoreSystem as $arr){

      if($arr[0] == $value){
         $score = $score + $arr[1];
      }
  }

}

//echo score
echo $score;





//send last values through score system





?>