<?php

class maincontroler
{
    public $maincontroler;

    public function __construct()
    { //App-Flow

           if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['VALID'])) {
            $_SESSION['VALID'] = false;
        }

        if ($_SESSION['VALID']) {
            $this->maincontroler = isset($_GET['LEVEL']) ? $_GET['LEVEL'] : 'home';
            $controller = new ViewController(); // aplicar doble despacho?

            switch ($this->maincontroler) {
                case 'home':
                    $controller->load_view($this->maincontroler);
                    break;

                case 'users':
                    if (!isset($_POST['LEVEL'])) $controller->load_view('users');
                    else $controller->load_view($_POST['LEVEL']);
                    break;

                case 'out':
                    $user_session = new SessionController();
                    $user_session->logout();

                    break;

                default:
                    $controller->load_view('error404');
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
                    header('Location: ./');
                }


            }
        }
    }


}