<?php
   
   class ViewController
   {
      
      private static $view_path = './views/';
      
      public function load_view($view)
      {
         require_once(self::$view_path . 'header.php');
         $this->sessiontimer();
         require_once(self::$view_path . $view . '.php');
         require_once(self::$view_path . 'footer.php');
         
      }
      
      private function sessiontimer()
      {
         if (isset($_SESSION['timer'])) {
            $doomtime = $_SESSION['timer'] + ($_SESSION['timeoflife'] - time());
            if ($doomtime <= 0) {
               session_unset();
               session_destroy();
               header("Location: /vinculacion");
               exit();
            } else {
               $_SESSION['timer'] = time();
            }
         }
         
      }
   }