<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title></title>
</head>
<body>

<?php

$link = mysql_connect("203.68.161.82", "subject", "") or die("�L�k�s����Ʈw:" . mysql_error( )); 
mysql_query('SET NAMES big5');
//mysql_query("SET character set utf8",$link);
//mysql_query("SET CHARACTER_SET_database=utf8",$link);
//mysql_query("SET CHARACTER_SET_CLIENT=utf8",$link);
//mysql_query("SET CHARACTER_SET_RESULTS=utf8",$link);

mysql_select_db("questionnaire",$link) or die("�L�k��ܸ�Ʈw");

$query = "SELECT * FROM site where city_no=".$city;

$result = mysql_query($query) or die("�d�߿��~" . mysql_error( ));

?>

<table cellpadding="0" cellspacing="0" height="488">
	<!-- MSTableType="layout" -->
	<tr>
		<td valign="top" height="70">
		<p align="center"><font size="6">
		<?
		if($class=='A'){
		  echo "�п�ܱz���[���a�����]";
		} else {
			echo "�п�ܱz�Ҫ����a�����]";
  	}
		echo "<form method=post action=sessionpage.php target=\"_top\">";
		?>
		</font></td>
	</tr>
	<tr>
		<td height="418"  valign="top">
		<?php
		  $querycity= "	SELECT city_name FROM site where city_no=".$city;
		  $cityname=mysql_query($querycity);
		  $row=mysql_fetch_array($cityname);
		  echo $row['city_name'];
		  mysql_free_result($cityname);
		?>
		<input type="hidden" name="class" value="<?echo $class?>">
		<table border="1" id="table1">
			<tr>
				<td>�@</td>
				<td>�]�٦W</td>
				<td width=61>����<br>(�m��)</td>
				<td>�]�٦a�}</td>
				<td width=50>�ثe�񵪤H��</td>
			</tr>


<?php
			while ($row = mysql_fetch_array($result)){
			$querynum=" SELECT Count(*) as maxnum from visitor where museum_no=".$row['site_no'];
			$fillnum=mysql_query($querynum);
			$num=mysql_fetch_array($fillnum);
			if ($num['maxnum']<$row['A_maxnum']){
	    echo "<tr><td height=24>"."<input type=radio value=".$row['site_no']." name=R1></td>";
	    } else {
	    echo "<tr><td height=24>�H�F�񵪤W��,�L�k���</td>";
	    }
	    echo "<td height=24>".$row['site_name']."</td>";
	    if ($row['country']<>""){
	    	echo "<td height=24 width=61>".$row['city_name']."<br>(".$row['country'].")"."</td>";
	    } else {
	    	echo "<td height=24 width=61>".$row['city_name']."</td>";
	    }
			echo "<td height=24>".$row['site_address']."</td>";
			echo "<td height=24 width=50>".$num['maxnum']."</td></tr>";
			mysql_free_result($fillnum); 
					
	    }
		  
	
	mysql_free_result($result);
?>
</table><p align="center"><font size="4">                   
<input type="submit" value="�T�w���" style="font-family: �s�ө���; font-size: 14pt"></font>
</td></tr>
</table>

</body>

</html>