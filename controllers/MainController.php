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
            
            switch ($this->MainController) {
               case 'home':
                  $controller->load_view('home');//$this->MainController
                  break;
               
               case 'users':
                  if (!isset($_POST['LEVEL'])) {
                     $controller->load_view('users');
                  } else {
                     $controller->load_view($_POST['LEVEL']);
                  }
                  break;
               case 'products':
                  if (!isset($_POST['LEVEL'])) {
                     $controller->load_view('products');
                  } else {
                     $controller->load_view($_POST['LEVEL']);
                  }
                  break;
               case 'find':
                  if (!isset($_POST['LEVEL'])) {
                     $controller->load_view('find');
                  } else {
                     $controller->load_view($_POST['LEVEL']);
                  }
                  break;
               case 'stats':
                  if (!isset($_POST['LEVEL'])) {
                     $controller->load_view('stats');
                  } else {
                     $controller->load_view($_POST['LEVEL']);
                  }
                  break;
               
                  case 'toolsusers':
                  if (!isset($_POST['LEVEL'])) {
                     $controller->load_view('toolsusers');
                  } else {
                     $controller->load_view($_POST['LEVEL']);
                  }
                  break;
   
               case 'toolsadmin':
                  if (!isset($_POST['LEVEL'])) {
                     $controller->load_view('toolsadmin');
                  } else {
                     $controller->load_view($_POST['LEVEL']);
                  }
                  break;
               
               case 'out':
                  $_SESSION['VALID'] = false;
                  $controller->load_view('login');
                  break;
   
               case 'home':
                  $controller->load_view('home');
                  break;
                  
              
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