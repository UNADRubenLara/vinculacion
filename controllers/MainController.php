<?php
   
   class MainController
   {
      public $MainController;
      
      public function __construct()
      {
         
         if (!isset($_SESSION)) {
            session_start();
         }
         if (!isset($_SESSION['VALID'])) {
            $_SESSION['VALID'] = false;
         }
         
         if ($_SESSION['VALID']) {
            $this->MainController = isset($_GET['LEVEL']) ? $_GET['LEVEL'] : 'home';
            $controller = new ViewController();
            if ($this->MainController == 'out') {
               $_SESSION['VALID'] = false;
               $controller->load_view('login');
            } else {
               if (!isset($_POST['LEVEL'])) {
                  $controller->load_view($this->MainController);
               } else {
                  $controller->load_view($_POST['LEVEL']);
               }
            }
            
            
         } else {
            if (!isset($_POST['USER']) && !isset($_POST['PASS'])) {
               $login_form = new ViewController();
               $login_form->load_view('login');
               
            } else {
               $user_session = new SessionController();
               $session = $user_session->login($_POST['USER'], $_POST['PASS']);
               if (!$session) {
                  $login_form = new ViewController();
                  $login_form->load_view('login');
                  header('Location: ./?ERROR=' . $_POST['USER']);
               } else {
                  $_SESSION['VALID'] = true;
                  header('Location: ./home');
               }
               
               
            }
         }
      }
      
      
   }