<?php

namespace Model;

class Usuario extends ActiveRecord
{
    //base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnaDB = [
        'id', 'nombre', 'apellido',
        'email', 'password', 'telefono', 'admin', 'confirmado', 'token'
    ];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? null;
        $this->confirmado = $args['confirmado'] ?? null;
        $this->token = $args['token'] ?? '';
    }

    //Mensajes de validacion para la creacion 
    public function validarNuevaCuenta()
    {
        if(!$this->nombre){
            self::$alertas['error'][]= 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][]= 'El apellido es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][]= 'El Email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][]= 'El password es obligatorio';
        }
        if(strlen($this->password) < 6 ){
            self::$alertas['error'][] = 'El password debe te terner almenos 6 caracteres';
        }

        return self::$alertas;
    }

    //revisa si el usuario ya existe 
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email. "' LIMIT 1";
       
       $resultado = self::$db;

    }
}
