<?php
  session_start();
  
  $ip=$_SERVER["REMOTE_ADDR"]; // �z�L proxy server �Ӫ�, �W���|�o�� proxy �� IP
  $a=getallheaders();
  if (isset($a["X-Forwarded-For"])) {
      $ip = $a["X-Forwarded-For"];
  }  
  
  $link = mysql_connect("203.68.161.82", "subject", "") or die("�L�k�s����Ʈw:" . mysql_error( )); 
  mysql_query('SET NAMES big5');
  mysql_select_db("questionnaire",$link) or die("�L�k��ܸ�Ʈw");
  Srand(Sin(Time())*10000);
  $rewardno=Rand(1,Getrandmax());
  $write_string="'".$rewardno."'".","."'".$_SESSION['classno']."'".",".$_SESSION['subject_no'].","."'".$ip."'".","."'".$subjectname."'".","."'".$email."'".","."'".$mailaddress."'";
  $sql = "INSERT INTO questionnaire.reward (reward_no,class_no,subject_no,ip_addr,name,email,mail_addr) VALUES (".$write_string.");";
  $result = mysql_query($sql) or die("�d�߿��~" . mysql_error( ));
  
?>

<SCRIPT language="JavaScript">
   alert("�n�J����,�A���P�±z����U\n�z������s����:"+<?=$rewardno?>);
   window.location=('http://203.68.161.82/questionnaire/');
   window.close();
</script>

<?
  mysql_free_result($result);
  
  session_unregister("classno"); 
  session_unregister("subject_no"); 
  
?>