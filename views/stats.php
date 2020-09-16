<?php
   include_once './api-web/GDGraph.php';
   if ($_SESSION['role'] == 'Admin' && isset($_SESSION['VALID'])) {
      if (isset($_POST['init']) && isset($_POST['end'])) {
         $date_init = $_POST['init'];
         $date_end = $_POST['end'];
         $titulofecha = 'Del ' . $date_init . ' al ' . $date_end;
      } else {
         $date_init = date("Y-m-d", strtotime("-1 month"));
         $date_end = date("Y-m-d", strtotime("now"));
         $titulofecha = 'Del ' . $date_init . ' al ' . $date_end;
      }
      $statsdata = new StatsController();
      
      $template = '
        <section class="central-fr-up">
        <label>%s %s</label>
        <form method="post">
        <input name="init" type="date" placeholder="dd-mm-yyyy">
        <input name="end" type="date" placeholder="dd-mm-yyyy">
        <input type="hidden" name="LEVEL" value="stats">
        <input type="submit" class="add" value="%s">
        </form>
        </section>
        <section class="containerv central-body">
        ';
      printf($template, TXTLastMonth, TXTSelectDate, TXTBtnUpdate);
   }
   
   
   //grafico 1
   $accesosarray = $statsdata->date_access($date_init, $date_end);
   if ($accesosarray) {
      $accesos = new GDGraph($accesosarray, 270, $titulofecha);
      $template = '
     <section class="flex-item-rh center-box-pad">
        <h3>%s</h3>';
      printf($template, TXTAccess);
      echo '<img class="imgstats" src="';
      $accesos->bar_graph();
      echo '" alt="graph"/></section>';
   } else{
      $template = '
     <section class="flex-item-rh center-box-pad">
        <h3>%s</h3>
        <h2>%s</h2>
        </section>';
      printf($template, TXTAccess,TXTNoData);
      
   }
   
   //grafico 2
   
   
   $userpoductsarray = $statsdata->data_product_users();
   if ($userpoductsarray) {
      $products = new GDGraph($userpoductsarray, 270, TXTProductUsers);
      $template = '
     <section class="flex-item-rh center-box-pad">
        <h3>%s</h3>';
      printf($template, TXTProductUsers);
      echo '<img class="imgstats" src="';
      $products->pie_graph();
      echo '" alt="graph"/></section>';
   } else{
      $template = '
     <section class="flex-item-rh center-box-pad">
        <h3>%s</h3>
        <h2>%s</h2>
        </section>';
      printf($template, TXTProductUsers,TXTNoData);
   }
   
   //Grafico 3
   $messagessarray = $statsdata->messages($date_init, $date_end);
   if ($messagessarray) {
      $messages = new GDGraph($messagessarray, 270, TXTMessages);
      $template = '
     <section class="flex-item-rh center-box-pad">
        <h3>%s</h3>';
      printf($template, TXTMessages);
      echo '<img class="imgstats" src="';
      $messages->pie_graph();
      echo '" alt="graph"/></section>';
   } else{
      $template = '
     <section class="flex-item-rh center-box-pad">
        <h3>%s</h3>
        <h2>%s</h2>
        </section>';
      printf($template, TXTMessages,TXTNoData);
   }
   
   
   echo '</section>';//end graph section