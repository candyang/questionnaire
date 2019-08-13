<?php
  session_start();
  session_register("bp1_str");
  
  for($i=1;$i<=13;$i++){ //第一部份第1題
  	
    if ($a[$i]<>""){
       $write_string=$write_string.$a[$i].",";
    }else {
       $write_string=$write_string."0".",";
    }
  }


  for($i=1;$i<=10;$i++){ //第一部份第2題
    if ($b[$i]<>""){
       $write_string=$write_string.$b[$i].",";
    }else {
    	 $write_string=$write_string."0".",";
    }
  }

  for($i=1;$i<=9;$i++){ //第一部份第3題
    if ($c[$i]<>""){
       $write_string=$write_string.$c[$i].",";
    }else {
    	 $write_string=$write_string."0".",";
    }
  }

  for($i=1;$i<=9;$i++){ //第一部份第4題
    if ($d[$i]<>""){
       $write_string=$write_string.$d[$i].",";
    }else {
    	 $write_string=$write_string."0".",";
    }
  }
  
 
  $_SESSION['bp1_str']=$write_string;

?>
<html>
<head>
</head>
<body>

<SCRIPT language="JavaScript">
   window.location=('questionnaireBp2.htm');
</script>