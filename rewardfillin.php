<?php
  session_start();
  
  $ip=$_SERVER["REMOTE_ADDR"]; // 透過 proxy server 來的, 上面會得到 proxy 的 IP
  $a=getallheaders();
  if (isset($a["X-Forwarded-For"])) {
      $ip = $a["X-Forwarded-For"];
  }  
  
  $link = mysql_connect("203.68.161.82", "subject", "") or die("無法連結資料庫:" . mysql_error( )); 
  mysql_query('SET NAMES big5');
  mysql_select_db("questionnaire",$link) or die("無法選擇資料庫");
  Srand(Sin(Time())*10000);
  $rewardno=Rand(1,Getrandmax());
  $write_string="'".$rewardno."'".","."'".$_SESSION['classno']."'".",".$_SESSION['subject_no'].","."'".$ip."'".","."'".$subjectname."'".","."'".$email."'".","."'".$mailaddress."'";
  $sql = "INSERT INTO questionnaire.reward (reward_no,class_no,subject_no,ip_addr,name,email,mail_addr) VALUES (".$write_string.");";
  $result = mysql_query($sql) or die("查詢錯誤" . mysql_error( ));
  
?>

<SCRIPT language="JavaScript">
   alert("登入完成,再次感謝您的協助\n您的抽獎編號為:"+<?=$rewardno?>);
   window.location=('http://203.68.161.82/questionnaire/');
   window.close();
</script>

<?
  mysql_free_result($result);
  
  session_unregister("classno"); 
  session_unregister("subject_no"); 
  
?>