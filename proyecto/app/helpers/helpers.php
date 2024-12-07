<?php
/** 
 * Iniciar sesiones
 */
session_start();

/** 
 * Función redirigir
 * @param $locacion --- controlador/método/argumentos
 */

 if(!function_exists('redirigir')) {
    function redirigir($locacion) {
        header('Location: '. $locacion);
    }
 }

 /**
  * Para permisos varios
  */

//   if(!function_exists('estaLogueado')) {
//     function estaLogueado() {
//         return (isset($_SESSION['nombre_usuario']) && !empty($_SESSION['nombre_usuario']))? true:false;
//     }
//  }
/**
 * Function inciiales
 * @param $texto --- nombre propio de preferencia
 * @return $iniciales
 */
 if(!function_exists('iniciales')) {
    function iniciales($texto) {
       $iniciales = '';
       $nombre = explode(' ',$texto);
       foreach($nombre as $dato) {
        $iniciales .= strtoupper($dato[0][0]);
       }
       return $iniciales;
    }
 }

 /**
 * Función esAdministrador
 * Comprueba si el usuario actual tiene el rol de administrador.
 * @return bool --- true si es administrador, false en caso contrario.
 */
if (!function_exists('esAdministrador')) {
   function esAdministrador() {
       // Verifica que el usuario esté logueado y tenga el rol "admin".
       return estaLogueado() && isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
   }
}

/**
* Función cerrarSesion
* Destruye la sesión actual para cerrar sesión.
* @return void
*/
if (!function_exists('cerrarSesion')) {
   function cerrarSesion() {
       session_unset(); // Elimina todas las variables de sesión.
       session_destroy(); // Destruye la sesión.
       setcookie(session_name(), '', time() - 3600, '/'); // Borra la cookie de sesión.
       redirigir('/login.php'); // Redirige al login.
   }
}

/**
* Comentario adicional:
* Puedes agregar más funciones auxiliares según las necesidades del proyecto.
* Ejemplo: validaciones específicas, formateos, etc.
*/

?>
