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

# Metodos Incapacidades

public function listarTotalIncapacidades()
  {
       $this->db->query("SELECT    id, 
                              rfc, 
                              nombre_usuario, 
                              departamento_usuario, 
                              dias_incapacidad,
                              tipo_incapacidad,
                              pago_general 
                   FROM incapacidades");

  $usuarios = $this->db->multiple();

  return $usuarios;
  }

  public function listarIncapacidades($pagina, $limite)
  {
  
    $this->db->query('SELECT * FROM incapacidades');
    $this->db->multiple();
    $numero_registros = $this->db->conteoReg();
    // enviar query, prepare
    $this->db->query("SELECT    id, 
                                rfc, 
                                nombre_usuario, 
                                departamento_usuario, 
                                dias_incapacidad,
                                tipo_incapacidad,
                                pago_general 
                     FROM incapacidades LIMIT :offset , :limite");
  
    $this->db->bind(':offset', ((($pagina) ? ($pagina - 1) : 0) * $limite));
    $this->db->bind(':limite', $limite, PDO::PARAM_INT);
    // muchos o uno?                            
    $usuarios['usuarios'] = $this->db->multiple();
    $paginacion = [
        'limite' => $limite,
        'pagina' => $pagina,
        'paginas' => (ceil($numero_registros / $limite)),
        'numero_registros' => $numero_registros,
        'pag_previa' => ($pagina - 1),
        'pag_siguiente' => ($pagina + 1),
    ];
    $usuarios = array_merge($paginacion, $usuarios);
    // para tracking /  debug
  
    // echo '<pre>';
    // print_r($usuarios);
    // echo '</pre>';
    // die();
   // fin de tracking / debug
    return $usuarios;
  }

  public function agregarIncapacidad($data)
 {
         # preparacion
     $this->db->query('INSERT INTO incapacidades (rfc, nombre_usuario, departamento_usuario, dias_incapacidad, tipo_incapacidad, pago_general) VALUES (:rfc, :nombre_usuario, :departamento_usuario, :dias_incapacidad, :tipo_incapacidad, :pago_general)');
     # vinculacion
     $this->db->bind(':rfc', $data['rfc']);
     $this->db->bind(':nombre_usuario', $data['nombre_usuario']);
     $this->db->bind(':departamento_usuario', $data['departamento_usuario']);
     $this->db->bind(':dias_incapacidad', $data['dias_incapacidad']);
     $this->db->bind(':tipo_incapacidad', $data['tipo_incapacidad']);
     $this->db->bind(':pago_general', $data['pago_general']);
//         echo '<pre>';
// print_r($data);
// echo '</pre>';
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




  public function listarTotalNominas()
  {
       $this->db->query("SELECT    id, 
                              rfc, 
                              nombre_nomina, 
                              departamento_nomina, 
                              nss_nomina,
                              horas_nomina,
                              pago_nominas 
                   FROM nominas");

  $usuarios = $this->db->multiple();

  return $usuarios;
  }
  public function listarNominas($pagina, $limite)
{

  $this->db->query('SELECT * FROM nominas');
  $this->db->multiple();
  $numero_registros = $this->db->conteoReg();
  // enviar query, prepare
  $this->db->query("SELECT    id, 
                              rfc, 
                              nombre_nomina, 
                              departamento_nomina, 
                              nss_nomina,
                              horas_nomina,
                              pago_nominas 
                   FROM nominas LIMIT :offset , :limite");

  $this->db->bind(':offset', ((($pagina) ? ($pagina - 1) : 0) * $limite));
  $this->db->bind(':limite', $limite, PDO::PARAM_INT);
  // muchos o uno?                            
  $usuarios['usuarios'] = $this->db->multiple();
  $paginacion = [
      'limite' => $limite,
      'pagina' => $pagina,
      'paginas' => (ceil($numero_registros / $limite)),
      'numero_registros' => $numero_registros,
      'pag_previa' => ($pagina - 1),
      'pag_siguiente' => ($pagina + 1),
  ];
  $usuarios = array_merge($paginacion, $usuarios);
  // para tracking /  debug

  // echo '<pre>';
  // print_r($usuarios);
  // echo '</pre>';
  // die();
 // fin de tracking / debug
  return $usuarios;
} 

 public function agregarNomina($data)
 {
         # preparacion
     $this->db->query('INSERT INTO nominas (rfc, nombre_nomina, departamento_nomina, nss_nomina, horas_nomina, pago_nominas) VALUES (:rfc, :nombre_nomina, :departamento_nomina, :nss_nomina, :horas_nomina, :pago_nominas)');
     # vinculacion
     $this->db->bind(':rfc', $data['rfc']);
     $this->db->bind(':nombre_nomina', $data['nombre_nomina']);
     $this->db->bind(':departamento_nomina', $data['departamento_nomina']);
     $this->db->bind(':nss_nomina', $data['nss_nomina']);
     $this->db->bind(':horas_nomina', $data['horas_nomina']);
     $this->db->bind(':pago_nominas', $data['pago_nominas']);
//         echo '<pre>';
// print_r($data);
// echo '</pre>';
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

  public function eliminar($id)
 {
     # preparacion
     $this->db->query('DELETE FROM nominas WHERE id = :id');

     #vinculacion
     $this->db->bind(':id', $id);

     #ejecucion
     try {

         $this->db->execute();
         return true;
     } catch (Exception $evt) {
         // echo $evt->getMessage();
         // die();
         return false;
     }
 }

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
