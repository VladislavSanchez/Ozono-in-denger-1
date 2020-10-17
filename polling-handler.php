<?php
   session_start();
   $question1 = $_POST['question1'];
   $question2 = $_POST['question2'];
   $question3 = $_POST['question3'];
   $question4 = $_POST['question4'];
   $question5 = $_POST['question5'];
   $server = $_SERVER['SERVER_ADDR'];
   $connect = mysqli_connect($server, 'user','useruseruser228.', 'polling'); 
   $ip = $_SERVER['REMOTE_ADDR'];
   if ($connect == false) {
       $_SESSION['error_connect'] = 'Ошибка подключения';
       echo $_SESSION['error_connect'];
       echo '<script>document.location.href="page-5.php"</script>';
       die(); 
   } 
   $query = "INSERT INTO respondents (ip) VALUES ('$ip')";
   $res = mysqli_query($connect, $query);
   if ($res == false) {
   	  session_start();
      $_SESSION['error_query'] = 'Ошибка при запросе';
      echo $_SESSION['error_query'];
      echo '<script>document.location.href="page-5.php"</script>';
      die();
   }
   $query = "INSERT INTO data (question1, question2, question3, question4, question5) VALUES ('$question1', '$question2', '$question3', '$question4[0]' '$question4[1]' '$question4[2]' '$question4[3]' '$question4[4]', '$question5')";
   $res = mysqli_query($connect, $query);
   if ($res == false) {
   	  session_start();
      $_SESSION['error_query'] = 'Ошибка при запросе';
      echo $_SESSION['error_query'];
      echo '<script>document.location.href="page-5.php"</script>';
      die();
   }
   $_SESSION['respondents'] = 'Успешно!';
   echo '<script>document.location.href="page-5.php"</script>';
?>