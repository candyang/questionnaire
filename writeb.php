<?php
  session_start();
  session_register("subject_no");
   
//個人基本資料


$link = mysql_connect("203.68.161.82", "subject", "") or die("無法連結資料庫:" . mysql_error( )); 
mysql_query('SET NAMES big5');
mysql_select_db("questionnaire",$link) or die("無法選擇資料庫");

$querynum=" SELECT Count(*) as subjectno from nonvisitor;";
$fullnum=mysql_query($querynum);
$num=mysql_fetch_array($fullnum);


$write_string=$gender.",".$age.",".$edu.",".$job.","."'".$job_other."'".",".$live.",";
$write_string=$_SESSION['siteno'].",".($num['subjectno']+1).",".$_SESSION['bp1_str'].$_SESSION['bp2_str'].$write_string."'".$comment."'";


$sql = "INSERT INTO questionnaire.nonvisitor (museum_no,subject_no,A1,A2,A3,A4,A5,A6,A7,A8,A9,A10,AO1,AO2,AO3,B1,B2,B3,B4,B5,B6,B7,BO1,BO2,BO3,C1,C2,C3,C4,C5,C6,CO1,CO2,CO3,D1,D2,D3,D4,D5,D6,DO1,DO2,DO3,E1,E2,E3,E4,E5,E6,E7,E8,E9,EO1,EO2,EO3,F1,F2,F3,F4,F4_other,F5,G) VALUES (".$write_string.");";

$result = mysql_query($sql) or die("查詢錯誤" . mysql_error( ));

$_SESSION['subject_no']=($num['subjectno']+1);

mysql_free_result($fullnum);
mysql_free_result($result);

session_unregister("bp1_str"); 
session_unregister("bp2_str");  
session_unregister("siteno");

?>

<html>
<head>
</head>
<body>

<SCRIPT language="JavaScript">
   window.location=('reward.htm');
</script>

