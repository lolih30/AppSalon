<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $router->render('auth/login');
    }

    public static function logout()
    {
        echo "Desde logout";
    }

    public static function olvide(Router $router)
    {
        $router->render('auth/olvide-password', []);
    }
    public static function recuperar()
    {
        echo "Desde recuperar";
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario;
        //alertas vacias
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //revisar que alertas esta vacio 
            if (empty($alertas)) {
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear el password
                    $usuario->hashPassword();
                    //generar un token unico 
                    $usuario->crearToken();
                    //creare email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    //Crear usuario 
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }


        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }
}
