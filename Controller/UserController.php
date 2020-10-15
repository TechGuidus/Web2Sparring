<?php
require_once "./View/UserView.php";
require_once "./Model/UserModel.php";


class UserController{

    private $userView;
    private $userModel;


    function __construct(){
        $this->userView = new UserView();
        $this->userModel = new UserModel();
    }

    function Login(){
        $this->userView->showLogin();
    }

    function deslogueo(){
        session_start();
        session_destroy();
        header("Location:" .LOGIN);
    }
     
    
    function verificar(){
        $email = $_POST["input_email"];
        $pass = $_POST["input_pass"];

        
        if(!empty($email)&& !empty($pass)){
            if(isset($email)){
                $emailFromDB= $this->userModel->GetEmail($email);
                if(isset($userFromDB)&& $userFromDB){

                    if (password_verify($pass, $emailFromDB->password)){
                        session_start();
                        $_SESSION['email'] = $emailFromDB->email;
                        header("Location: " .HOME);
                    }else{
                        $this->userView->showLogin("Contraseña incorrecta");
                    }
                }else{// En caso que no exista un email en la DB
                    $this->userView->showLogin("Email incorrecto");
                }
            }
        }
    }
        
        
        //chequeo de inicio de sesion
        private function chequeologin(){
            session_start();
            if(!isset($_SESSION["email"])){
                header("Location: ".LOGIN);
                
            }
        }
        

      
        
    
}
