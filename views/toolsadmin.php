<?php
   if ($_SESSION['role'] == 'Admin' && $_SESSION['VALID']) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuTools);
      $template='
      <section class="center-box">
            <section class="container">
                <section class="flex-item">
                    <form class="central-fr-up" method="post" enctype="multipart/form-data">
                       
                       <label for="ziptable>">%s: </label><input type="file" name="ziptable">
                       
                       <input type="submit" name="todo" value="%s" onclick="function wait() {
                         alert("whait");
                       }">
                    </form>
                </section>
                <section class="flex-item">
                
                </section>
            </section>
        </section>
        <script type="application/javascript"></script>
        
      ';
      printf($template,TXTloadZipTable,TXTUserBtnActivate);
     }
    if ($_SESSION['role'] == 'Admin' && $_SESSION['VALID'] && isset($_POST['todo'])) {
      $filltable=new IZip();
      printf('<h2 class="form-Title">%s</h2>', TXTmenuTools);
      $template='
      <section class="center-box">
            <section class="container">
                <section class="flex-item">
                    <h2>%s</h2>
                </section>
      ';
      printf($template,TXTWait);
      $response=$filltable->loadLargeZip($_FILES["ziptable"]["tmp_name"]);
      $template='<section class="container">
                <section class="flex-item">
                    <h2>%s</h2>
                </section>
      ';
      
      if ($response[0]=0){
         printf($template,
         TXTStatusUpdate);
      }elseif ($response[0]=1062){
           printf($template,
           TXTduplicated);
      }else{
         $errottext=TXTError.$response[0];
         printf($template,
            $errottext);
         
      }
     
      
   }
