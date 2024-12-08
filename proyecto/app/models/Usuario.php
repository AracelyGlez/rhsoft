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

  public function agregarUsuario($data)
  {
      # preparacion
      $this->db->query('INSERT INTO usuarios (nombre_usuario, correo_usuario, password_usuario) VALUES (:nombre_usuario, :correo_usuario, :password_usuario)');
      # vinculacion
      $this->db->bind(':nombre_usuario', $data['nombre_usuario']);
      $this->db->bind(':correo_usuario', $data['correo_usuario']);
      $this->db->bind(':password_usuario', $data['password_usuario']);
      # ejecucion
      try {
          // return $this->db->execute();
          $this->db->execute();
          return true;
      } catch (Exception $evt) {
          // echo $evt->getMessage();
          // die();
          return false;
      }
  }

    public function loginUsuario($data) {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>'; 
        // die();
        $this->db->query("SELECT nombre_usuario, correo_usuario, password_usuario FROM usuarios
        WHERE correo_usuario =:correo_usuario");
        $this->db->bind(':correo_usuario', $data['correo_usuario']);
        $usuario=$this->db->unico();
        //Ahora vamos a buscar la coincidencia con el password
        if($this->db->conteoReg()) {
            //Cumple el primer filtro, ahora acciones para revisar password
            $passHash = $usuario->password_usuario;
            if(password_verify($data['password_usuario'], $passHash)) {
                return $usuario;
            }
        }
        return false;
        }

        public function editarUsuario($data) {
            # preparacion
             //para tracking
                //    echo '<pre>';
                //    print_r($data);
                //    echo '</pre>';
                //    die();
                $cadena ='';
             $cadena = $data['cambiar_password']?',password_usuario=:password_usuario':''; 
            $this->db->query("UPDATE usuarios SET nombre_usuario=:nombre_usuario, 
                                                  correo_usuario=:correo_usuario {$cadena}
          
                            WHERE id = :id");
    //                   echo $cadena;
    // die();     
            # vinculacion
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':nombre_usuario', $data['nombre_usuario']);
            $this->db->bind(':correo_usuario', $data['correo_usuario']);
            if($data['cambiar_password'])
                $this->db->bind(':password_usuario', $data['password_usuario']);
            # ejecucion
            try {
                // return $this->db->execute();
                $this->db->execute();
                return true;
            } catch (Exception $evt) {
                // echo $evt->getMessage();
                // die();
                return false;
            }
        }


} // fin de class
