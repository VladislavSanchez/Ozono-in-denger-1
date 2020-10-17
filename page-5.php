<?php
   session_start();
   $ip = $_SERVER['REMOTE_ADDR'];
   $server = $_SERVER['SERVER_ADDR'];
   $connect = mysqli_connect($server, 'user','useruseruser228.', 'polling'); 
   $res = mysqli_query($connect, "SELECT ip FROM respondents WHERE ip = '$ip'");
   
      while ($res = mysqli_fetch_assoc($res)) {
        echo "$res[0]";
      }
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
    	<meta charset="utf-8">
    	<title>Озоновый слой | Опрос</title>
    	<meta name="description" content="Опрос на тему разрушения озонового слоя">
    	<meta name="keywords" content="озон, что такое озон, где применяют озон, зачем нужен озон, опрос">
    	<meta name="robots" content="all">
    	<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
 	   <header>
 	   	<img class="header-fon" src="img/fon-5.jpg" alt="Атмосфера из космоса">
 	   	<p class="header-title header-title-page-5">Опрос по теме</p>
  	   </header>
       <main>
       	<nav>
       		<ul class="nav-ul">
       			<li class="nav-block"><a href="index.html">Что такое озон?</a></li>
       			<li class="nav-block"><a href="page-2.html">Озоновые дыры</a></li>
       			<li class="nav-block"><a href="page-3.html">Как спастись?</a></li>
       			<li class="nav-block"><a href="page-4.html">Правовая основа</a></li>
       			<li class="nav-block"><a href="#">Опрос</a></li>
       		</ul>
       	</nav>
       	   <section>
       	   	<?php 
             if ($connect == false) {
          	   echo '<p class="alarm">Ошибка подключения к базе данных</p>'; 
               die(); 
             } 
             $query = "SELECT COUNT(*) FROM data";
             $res = mysqli_query($connect, "$query");
             if ($res == false) {
                echo '<p class="alarm">Ошибка при запросе к базе данных</p>';
                die();
             }
             $voted = mysqli_fetch_array($res);
             mysqli_close($connect);
             ?>
       	   	<div class="polling-statistics-container">
       	 	     <h2 class="polling-statistics">Статистика</h2>
       	 	     <hr>
                 <div class="polling-statistics-result"></p>
                    <p>Проголосовало:<?php echo '<span class="voted">'.$voted[0].'</span>'; ?></p>
                 </div>
       	 	</div>
       	 	<?php
               if (empty($_SESSION['respondents'])) {
       	 	   echo '<div class="polling-statistics-container polling-indent">
       	 	   <form action="polling-handler.php" method="POSt">
               <p class="question">Что такое озон?</p>
               <label class="radio-align"><input type="radio" name="question1" value="1" required="required">Жидкость, замораживающая всё, к чему прикоснётся</label><br>
               <label class="radio-align"><input type="radio" name="question1" value="2" required="required">Голубоватый газ, защищающий нашу планету</label><br>
               <label class="radio-align"><input type="radio" name="question1" value="3" required="required">Продукт горения древесины</label>
               <hr>
               <p class="question">Какую роль для нашей планеты играет озон?</p>
               <label class="radio-align"><input type="radio" name="question2" value="1" required="required">Используется в производстве</label><br>
               <label class="radio-align"><input type="radio" name="question2" value="2" required="required">Никакой</label><br>
               <label class="radio-align"><input type="radio" name="question2" value="3" required="required">Защищает нашу планету от УФ излучения</label>
               <hr>
               <p class="question">Кто открыл озон?</p>
               <label class="radio-align"><input type="radio" name="question3" value="1" required="required">М. Ван Маруи</label><br>
               <label class="radio-align"><input type="radio" name="question3" value="2" required="required">Мишель Адансон</label><br>
               <label class="radio-align"><input type="radio" name="question3" value="3" required="required">Карл Линней</label>
               <hr>
               <p class="question">Когда мы можем почувствовать запах озона?</p>
               <label class="radio-align"><input type="checkbox" name="question4[]" value="1">Всегда</label><br>
               <label class="radio-align"><input type="checkbox" name="question4[]" value="2">В дождь</label><br>
               <label class="radio-align"><input type="checkbox" name="question4[]" value="3">В грозу</label><br>
               <label class="radio-align"><input type="checkbox" name="question4[]" value="4">В облачную погоду</label><br>
               <label class="radio-align"><input type="checkbox" name="question4[]" value="5">В жаркую погоду</label>
               <hr>
               <p class="question">Чем опасны озоновые дыры?</p>
               <input class="text-style" type="text" name="question5" placeholder="Введите ваш ответ" required="required"><br>
               <input class="submit-style" type="submit" value="Отправить ответы">
       	 	</div>
       	 </form>';
       	} else {
       		echo '<div class="polling-statistics-container polling-indent">
       		<p class="respondents">Спасибо за участие!</p>
       		</div>';
       	}
        session_destroy();
       	     ?>
       	   </section>
       </main>
       <footer class="footer-5">
       	   <a class="footer-content" href="#">Принять участие в опросе</a>
       	   <a class="footer-content" href="https://vk.com/vlad12345g" target="_blank">Связь со мной</a>
       </footer>
 </body>
</html>