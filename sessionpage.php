<?php
  session_start();
  session_register("classno");
  session_register("siteno"); 

  $_SESSION['classno']=$class;
  $_SESSION['siteno']=$R1;

?>

<html>
<head>

</head>
<body>
<?php  
  if($class=='A'){
?>

		  <SCRIPT language="JavaScript">
		     window.location=('questionnaireA.htm');
		  </script>
<?		
		} else {
?>
      <SCRIPT language="JavaScript">
		     window.location=('questionnaireB.htm');
		  </script>
<?		
		}
  
?>
</body>
</html>

