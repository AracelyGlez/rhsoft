<?php

/**
 * Modelo Usuario
 */

class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
  # preparacion

    public function loginUsuario($data) {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>'; 
        // die();
        $this->db->query("SELECT nombre_usuario, correo_usuario, contrasena_usuario FROM usuarios
        WHERE correo_usuario =:correo_usuario");
        $this->db->bind(':correo_usuario', $data['correo_usuario']);
        $usuario=$this->db->unico();
        //Ahora vamos a buscar la coincidencia con el password
        if($this->db->conteoReg()) {
            //Cumple el primer filtro, ahora acciones para revisar password
            $passHash = $usuario->password_usuario;
            if(password_verify($data['contrasena_usuario'], $passHash)) {
                return $usuario;
            }
        }
        return false;
        }


} // fin de class
