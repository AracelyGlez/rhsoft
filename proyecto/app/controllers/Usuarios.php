<?php
class Usuarios extends Controller
{
    private $usuariosModel;

    public function __construct()
    {
        // construct para usar la conexion a base de datos y creacion de modelo
        $this->usuariosModel = $this->model('Usuario');
    }
 
    public function agregarNominas() {
        $data = [
            'button' => 'Guardar',
            'rfc' => '',
            'nombre_nomina' => '',
            'departamento_nomina' => '',
            'nss_nomina' => '',
            'horas_nomina' => '',
            'pago_nominas' => '',
            'msg_error' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     //para tracking
        //         echo '<pre>';
        //         print_r($_POST);
        //         echo '<br>';
        //         print_r($_FILES);
        //         echo '</pre>';
        //        die();
        //    // fin de tracking
           
            $data = [
                'rfc' => $_POST['rfc'],
                'nombre_nomina' => $_POST['nombre_nomina'],
                'departamento_nomina' => $_POST['departamento_nomina'],
                'nss_nomina' => $_POST['nss_nomina'],
                'horas_nomina' => $_POST['horas_nomina'],
                'pago_nominas' => $_POST['pago_nominas'],
                
            ];
            //  //para tracking
            //                    echo '<pre>';
            //                    print_r($data);

            //                    echo '</pre>';
            //                    die();
            //            // fin de tracking
            # validacion del lado del servidor // todas las posibles
            if (!preg_match('/^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$/', $data['rfc'])) {
                $data['msg_error'] = 'El RFC no tiene un formato válido.';
            } elseif (!is_numeric($data['horas_nomina']) || $data['horas_nomina'] <= 0) {
                $data['msg_error'] = 'Las horas trabajadas deben ser un número positivo.';
            } elseif (!is_numeric($data['pago_nominas']) || $data['pago_nominas'] <= 0) {
                $data['msg_error'] = 'El pago debe ser un número positivo.';
            }
        
            # guardar
            if (empty($data['msg_error'])) {
                if ($this->usuariosModel->agregarNomina($data)) {
                    // Redirigir a la lista de nóminas si todo salió bien 
                   header("Location: /usuarios/agregarNominas"); // Ajusta según tu lógica de paginación
                    exit; // Detener ejecución después de la redirección
                } else {
                    $data['msg_error'] = "Hubo un error al guardar la nómina. Intenta nuevamente.";
                }
            }
        } 
        $this->view('usuarios/nominas',$data);
    }

    
    public function editarNominas($id){
        $data = [
            'button' => 'Actualizar',
            'msg_error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'], // ojo aqui // <========= nuevo
                'rfc' => $_POST['rfc'],
                'nombre_nomina' => $_POST['nombre_nomina'],
                'departamento_nomina' => $_POST['departamento_nomina'],
                'nss_nomina' => $_POST['nss_nomina'],
                'horas_nomina' => $_POST['horas_nomina'],
                'pago_nominas' => $_POST['pago_nominas'],   
            ];
            if (empty($data['rfc']) || empty($data['nombre_nomina']) || empty($data['departamento_nomina']) || empty($data['nss_nomina']) || empty($data['horas_nomina']) || empty($data['pago_nominas'])) {
                $data['msg_error'] = 'Algunos campos estan vacios';
            }
            if ($this->usuariosModel->editarNomina($data)) {
                // El nombre sugerido sería actualizar usuario
                // $this->view('usuarios/index/1/10');
                  header('Location:/usuarios/tablaNomina/1/10');
                 exit();
            } else {
                $data['msg_error'] = 'Opps , algo salio mal';
            }
        } 
        
        $usuario = $this->usuariosModel->buscarNomina($id);
        $data = [
            'button' => 'Actualizar',
            'id' => $usuario->id, 
            'rfc' => $usuario->rfc,
            'nombre_nomina' => $usuario->nombre_nomina,
            'departamento_nomina' => $usuario->departamento_nomina,
            'nss_nomina' => $usuario->nss_nomina,
            'horas_nomina' => $usuario->horas_nomina,
            'pago_nominas' => $usuario->pago_nominas,
        ];

        $this->view('usuarios/editarNominas', $data);
        // echo 'fue get';
        } 

    
    public function eliminarNomina($id)
    {
        if (!$this->usuariosModel->eliminar($id)) {
            echo 'No se pudo dar de baja';
            // esto es solo de prueba, hay que hacerlo mas elaborado
        } else {
            /**
             * esta es una vista llamada internamente y necesito una llamada exterma (de la url)
             * $this->view('usuarios/index/1/10'); <== incorrecto
             * header('Location:/controlador) <== correcto
             */

            redirigir('/usuarios/tablaNomina/1/10');
        }
    }

     public function imprimir($formato)
   {

       $usuarios = $this->usuariosModel->listarTotalNominas();
        
       
           $this->view('usuarios/imprimir_fpdf', $usuarios);
        
        
   }

   
#VACACIONES
    public function agregarVacaciones() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'button' => 'Guardar',
            'nombre_vacaciones' => '',
            'rfc_vacaciones' => '',
            'departamento_vacaciones' => '',
            'dias_vacaciones' => '',
            'salidad_vacaciones' => '',
            'entrada_vacaciones' => '',
            'pago_vacaciones' => '',
            'msg_error' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre_vacaciones' => $_POST['nombre_vacaciones'],
                'rfc_vacaciones' => $_POST['rfc_vacaciones'],
                'departamento_vacaciones' => $_POST['departamento_vacaciones'],
                'dias_vacaciones' => $_POST['dias_vacaciones'],
                'salidad_vacaciones' => $_POST['salidad_vacaciones'],
                'entrada_vacaciones' => $_POST['entrada_vacaciones'],
                'pago_vacaciones' => $_POST['pago_vacaciones'],  
            ];
            # validacion del lado del servidor // todas las posibles
            if (!preg_match('/^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$/', $data['rfc_vacaciones'])) {
                $data['msg_error'] = 'El RFC no tiene un formato válido.';
            } elseif (!is_numeric($data['pago_vacaciones']) || $data['pago_vacaciones'] <= 0) {
                $data['msg_error'] = 'El pago debe ser un número positivo.';
            } elseif ($data['dias_vacaciones'] <= 0) {
                $data['msg_error'] = 'El número de días debe ser mayor a 0.';
            } elseif (!strtotime($data['salidad_vacaciones']) || !strtotime($data['entrada_vacaciones'])) {
                $data['msg_error'] = 'Las fechas de salida y entrada deben tener un formato válido.';
            } elseif (strtotime($data['salidad_vacaciones']) > strtotime($data['entrada_vacaciones'])) {
                $data['msg_error'] = 'La fecha de salida no puede ser posterior a la fecha de entrada.';
            }
        
            # guardar
            if (empty($data['msg_error'])) {
                if ($this->usuariosModel->agregarVacacion($data)) {
                    // Redirigir a la lista de nóminas si todo salió bien
                   header("Location: /usuarios/agregarVacaciones"); // Ajusta según tu lógica de paginación
                    exit; // Detener ejecución después de la redirección
                } else {
                    $data['msg_error'] = "Hubo un error al guardar las vacaciones. Intenta nuevamente.";
                }
            }
        }
        $this->view('usuarios/vacaciones',$data);
    }

    public function editarVacaciones($id){
        $data = [
            'button' => 'Actualizar',
            'msg_error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'], // ojo aqui // <========= nuevo
                'rfc_vacaciones' => $_POST['rfc_vacaciones'],
                'nombre_vacaciones' => $_POST['nombre_vacaciones'],
                'departamento_vacaciones' => $_POST['departamento_vacaciones'],
                'dias_vacaciones' => $_POST['dias_vacaciones'],
                'salidad_vacaciones' => $_POST['salidad_vacaciones'],
                'entrada_vacaciones' => $_POST['entrada_vacaciones'],
                'pago_vacaciones' => $_POST['pago_vacaciones'],   
            ];
            if (empty($data['rfc_vacaciones']) || empty($data['nombre_vacaciones']) || empty($data['departamento_vacaciones']) || empty($data['dias_vacaciones']) || empty($data['salidad_vacaciones']) || empty($data['entrada_vacaciones']) || empty($data['pago_vacaciones'])) {
                $data['msg_error'] = 'Algunos campos estan vacios';
            }
            if ($this->usuariosModel->editarVacacion($data)) {
                // El nombre sugerido sería actualizar usuario
                // $this->view('usuarios/index/1/10');
                  header('Location:/usuarios/tablaVacacion/1/10');
                 exit();
            } else {
                $data['msg_error'] = 'Opps , algo salio mal';
            }
        } 
        
        $usuario = $this->usuariosModel->buscarVacacion($id);
        $data = [
            'button' => 'Actualizar',
            'id' => $usuario->id, 
            'rfc_vacaciones' => $usuario->rfc_vacaciones,
            'nombre_vacaciones' => $usuario->nombre_vacaciones,
            'departamento_vacaciones' => $usuario->departamento_vacaciones,
            'dias_vacaciones' => $usuario->dias_vacaciones,
            'salidad_vacaciones' => $usuario->salidad_vacaciones,
            'entrada_vacaciones' => $usuario->entrada_vacaciones,
            'pago_vacaciones' => $usuario->pago_vacaciones,
        ];

        $this->view('usuarios/editarVacaciones', $data);
        // echo 'fue get';
        } 
    public function eliminarVacacion($id)
    {
        if (!$this->usuariosModel->eliminarVacaciones($id)) {
            echo 'No se pudo dar de baja';
            // esto es solo de prueba, hay que hacerlo mas elaborado
        } else {

            redirigir('/usuarios/tablaVacacion/1/10');
        }
    }

    public function imprimirVacaciones($formato)
    {
 
        $usuarios = $this->usuariosModel->listarTotalVacaciones();
         
        
            $this->view('usuarios/imprimir_fpdfVacacion', $usuarios);
         
         
    }

    
      public function tablaNomina($pagina = 1, $limite = 10){
        $usuarios = $this->usuariosModel->listarNomina($pagina, $limite);
        $this->view('usuarios/tabla_nominas',$usuarios);
        
    }

    public function tablaVacacion($pagina = 1, $limite = 10){
        $usuarios = $this->usuariosModel->listarVacacion($pagina, $limite);
        $this->view('usuarios/tabla_vacaciones',$usuarios);
       
    }
 public function index(){
     $this->view('usuarios/archivos'); 
    
        
          
      }

    #INCAPACIDADES

    public function agregarIncapacidades() {
        $this->view('usuarios/incapacidades');
    }

    public function registrar() {
        $data = [
            'button' => 'Guardar',
            'nombre_usuario' => '',
            'correo_usuario' => '',
            'password_usuario' => '',
            'conf_password' => '',
            'msg_error' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'nombre_usuario' => $_POST['nombre_usuario'],
                'correo_usuario' => $_POST['correo_usuario'],
                'password_usuario' => $_POST['password_usuario'],
                'conf_password' => $_POST['conf_password']
            ];
            //  //para tracking
            //                    echo '<pre>';
            //                    print_r($data);

            //                    echo '</pre>';
            //                    die();
            //            // fin de tracking
            # validacion del lado del servidor // todas las posibles
            if (empty($data['nombre_usuario'])) {
                $data['msg_error'] = '';
            }
            # validacion especial (correo, password)
            if (!filter_var($data['correo_usuario'], FILTER_VALIDATE_EMAIL)) {
                $data['msg_error'] = 'Formato correo no valido';
            }

            if ($data['password_usuario'] != $data['conf_password']) {
                $data['msg_error'] = 'Password y su confirmacion no concuerda';
            }
            # comprobacion de no duplicado
            //   dato a comprobar sea el correo, o el rfc o los dos
            // pendiente
            # guardar
            if (empty($data['msg_error'])) {
                unset($data['conf_password']);
                // pasar de texto plano el password a cadena hash
                $data['password_usuario'] = password_hash($data['password_usuario'], PASSWORD_DEFAULT);
                // llamar al modelo Usuario metodo agregarUsuario

                if ($this->usuariosModel->agregarUsuario($data)) {
                    // $x=2;
                    // if($x==1){
                    // redigir('usuarios/index/1/10'); Esto se construiría en helpers 20/11/24
                    header('Location:/usuarios/index/1/10'); //desde url
                    // $this->view('usuarios/index/1/10');
                } else {
                    $data['msg_error'] = 'Opps , algo salio mal';
                }
            }
        } // fin de post

        $this->view('usuarios/registrar', $data);
    }

    public function login() {
        //Inicialización de campos
        // session_start(); No es el lugar adecuado, en config o en este caso en helpers---> apoyo
        $data = [
            'correo_usuario' => '',
            'contrasena_usuario' => '',
            'msg_error' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                'correo_usuario' => $_POST['correo_usuario'],
                'contrasena_usuario' => $_POST['contrasena_usuario']
            ];
             # validacion del lado del servidor // todas las posibles
            if (empty($data['contrasena_usuario']) || empty($data['correo_usuario'] )) {
                $data['msg_error'] = 'Algunos campos estan vacios';
            }
            # validacion especial (correo, password)
            if (!filter_var($data['correo_usuario'], FILTER_VALIDATE_EMAIL)) {
                $data['msg_error'] = 'Formato correo no valido';
            }
            # comprobación de no duplicado
            //   dato a comprobar sea el correo, o el rfc o los dos
            // pendiente
            # guardar
            if (empty($data['msg_error'])) {
               // llamar al modelo Usuario metodo agregarUsuario
                unset($data['msg_error']); 
               $logueado = $this->usuariosModel->loginUsuario($data); 
               //Para tracking
            //    echo '<pre>';
            //    print_r($logueado);
            //    echo '</pre>'; 
            //     die();  
                if ($logueado) {
                    //Aprovechar la superglobal $_SESSION
                    // Para su uso es necesario iniciar una sesión
                    $_SESSION['nombre_usuario'] = $logueado->nombre_usuario;
                    header('Location:/home'); //desde url
                } else {
                    $data['msg_error'] = 'Correo y/o password no concuerdan';
                }
            }
        } // fin de post

        $this->view('usuarios/login', $data);
        // echo 'fue get';
    } //fin del login

      public function logout() {
        unset($_SESSION['nombre_usuario']);
        session_destroy();
        redirigir('/usuarios/login');
    } 

    public function editar($id)
    {

        // echo $id;
        // echo '<br>'. $_SERVER['REQUEST_METHOD'];

        // die();

        // parte de inicializacion de campos 
        $data = [
            'button' => 'Actualizar',
            'msg_error' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'cambiar_password' => (isset($_POST['cambiar_password']) && $_POST['cambiar_password'] == '0') ? false : true, // <========= nuevo
                'id' => $_POST['id'], 
                'nombre_usuario' => $_POST['nombre_usuario'],
                'telefono_usuario' => $_POST['telefono_usuario'],
                'password_usuario' => $_POST['password_usuario'],
                'conf_password' => $_POST['conf_password']
            ];
            //para tracking
            //    echo '<pre>';
            //    print_r($_POST);
            //    echo '<br>';
            //    print_r($_FILES);
            //    echo '</pre>';
            //    die();
            // fin de tracking
            # validacion del lado del servidor // todas las posibles
            if (empty($data['nombre_usuario'])) {
                $data['msg_error'] = 'Algunos campos estan vacios';
            }
            # validacion especial (correo, password)
            if (!filter_var($data['correo_usuario'], FILTER_VALIDATE_EMAIL)) {
                $data['msg_error'] = 'Formato correo no valido';
            }
            if ($data['cambiar_password']) { // <========= nuevo
                if ($data['password_usuario'] != $data['conf_password']) {
                    $data['msg_error'] = 'Password y su confirmacion no concuerda';
                }
            }
            # comprobacion de no duplicado
            //   dato a comprobar sea el correo, o el rfc o los dos
            // pendiente
            # guardar
            if (empty($data['msg_error'])) {
                unset($data['conf_password']);
                // pasar de texto plano el password a cadena hash

                if ($data['cambiar_password']) {  // <========= nuevo
                    $data['password_usuario'] = password_hash($data['password_usuario'], PASSWORD_DEFAULT);
                }
                // llamar al modelo Usuario metodo agregarUsuario

                if ($this->usuariosModel->editarUsuario($data)) {
                    // El nombre sugerido sería actualizar usuario
                    // $this->view('usuarios/index/1/10');
                    header('Location:/usuarios/index/1/10');
                } else {
                    $data['msg_error'] = 'Algo salió mal';
                }
            }
        } // fin de post
}

  
}