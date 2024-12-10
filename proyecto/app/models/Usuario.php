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
       $this->db->query("SELECT id, 
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

  public function listarIncapacidad($pagina, $limite)
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

 public function buscarIncapacidad($id)
{
    # consulta
    $this->db->query("SELECT   id, 
                             rfc,
                             nombre_usuario,  
                             departamento_usuario, 
                             dias_incapacidad,
                             tipo_incapacidad,
                             pago_general 
                    FROM incapacidades 
                    WHERE id =:id");

    $this->db->bind(':id', $id);

    try {
        return  $this->db->unico();
    } catch (Exception $evt) {
        return false;
    }
} // fin de buscarIncapacidad

public function eliminarIncapacidades($id)
 {
     # preparacion
     $this->db->query('DELETE FROM incapacidades WHERE id = :id');

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

 public function editarIncapacidad($data){
    $this->db->query("UPDATE incapacidades SET rfc=:rfc,
                                                nombre_usuario=:nombre_usuario,
                                              departamento_usuario=:departamento_usuario,
                                            dias_incapacidad=:dias_incapacidad,
                                              tipo_incapacidad=:tipo_incapacidad,
                                              pago_general=:pago_general
                        WHERE id = :id");
    
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':rfc', $data['rfc']);
    $this->db->bind(':nombre_usuario', $data['nombre_usuario']);
    $this->db->bind(':departamento_usuario', $data['departamento_usuario']);
    $this->db->bind(':dias_incapacidad', $data['dias_incapacidad']);
    $this->db->bind(':tipo_incapacidad', $data['tipo_incapacidad']);
    $this->db->bind(':pago_general', $data['pago_general']);
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

 # VACACIONES
 public function listarTotalVacaciones()  {
      $this->db->query("SELECT    id, 
                             nombre_vacaciones, 
                             rfc_vacaciones, 
                             departamento_vacaciones, 
                             dias_vacaciones,
                             salidad_vacaciones,
                             entrada_vacaciones,
                             pago_vacaciones 
                  FROM vacaciones");

    $usuarios = $this->db->multiple();

 return $usuarios;
 }
 public function listarVacacion($pagina, $limite)
{

 $this->db->query('SELECT * FROM vacaciones');
 $this->db->multiple();
 $numero_registros = $this->db->conteoReg();
 // enviar query, prepare
 $this->db->query("SELECT    id, 
                             nombre_vacaciones,
                             rfc_vacaciones,  
                             departamento_vacaciones, 
                             dias_vacaciones,
                             salidad_vacaciones,
                             entrada_vacaciones,
                             pago_vacaciones  
                  FROM vacaciones LIMIT :offset , :limite");

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
 return $usuarios;
} 

public function agregarVacacion($data)
{
        # preparacion
    $this->db->query('INSERT INTO vacaciones (nombre_vacaciones, rfc_vacaciones, departamento_vacaciones, dias_vacaciones, salidad_vacaciones, entrada_vacaciones, pago_vacaciones) VALUES (:nombre_vacaciones, :rfc_vacaciones, :departamento_vacaciones, :dias_vacaciones, :salidad_vacaciones, :entrada_vacaciones, :pago_vacaciones)');
    # vinculacion
    $this->db->bind(':nombre_vacaciones', $data['nombre_vacaciones']);
    $this->db->bind(':rfc_vacaciones', $data['rfc_vacaciones']);
    $this->db->bind(':departamento_vacaciones', $data['departamento_vacaciones']);
    $this->db->bind(':dias_vacaciones', $data['dias_vacaciones']);
    $this->db->bind(':salidad_vacaciones', $data['salidad_vacaciones']);
    $this->db->bind(':entrada_vacaciones', $data['entrada_vacaciones']);
    $this->db->bind(':pago_vacaciones', $data['pago_vacaciones']);
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

public function buscarVacacion($id)
{
    # consulta
    $this->db->query("SELECT   id, 
                             nombre_vacaciones,
                             rfc_vacaciones,  
                             departamento_vacaciones, 
                             dias_vacaciones,
                             salidad_vacaciones,
                             entrada_vacaciones,
                             pago_vacaciones 
                    FROM vacaciones 
                    WHERE id =:id");

    $this->db->bind(':id', $id);

    try {
        return  $this->db->unico();
    } catch (Exception $evt) {
        return false;
    }
} // fin de buscarNomina

/**
 * metodo agregar usuario
 * @param arreglo
 * @return valor (false, true)
 */
public function editarVacacion($data){
$this->db->query("UPDATE vacaciones SET nombre_vacaciones=:nombre_vacaciones,
                                          rfc_vacaciones=:rfc_vacaciones,
                                          departamento_vacaciones=:departamento_vacaciones,
                                        dias_vacaciones=:dias_vacaciones,
                                          salidad_vacaciones=:salidad_vacaciones,
                                          entrada_vacaciones=:entrada_vacaciones,
                                          pago_vacaciones=:pago_vacaciones
                    WHERE id = :id");

$this->db->bind(':id', $data['id']);
$this->db->bind(':nombre_vacaciones', $data['nombre_vacaciones']);
$this->db->bind(':rfc_vacaciones', $data['rfc_vacaciones']);
$this->db->bind(':departamento_vacaciones', $data['departamento_vacaciones']);
$this->db->bind(':dias_vacaciones', $data['dias_vacaciones']);
$this->db->bind(':salidad_vacaciones', $data['salidad_vacaciones']);
$this->db->bind(':entrada_vacaciones', $data['entrada_vacaciones']);
$this->db->bind(':pago_vacaciones', $data['pago_vacaciones']);
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

public function eliminarVacaciones($id)
 {
     # preparacion
     $this->db->query('DELETE FROM vacaciones WHERE id = :id');

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
