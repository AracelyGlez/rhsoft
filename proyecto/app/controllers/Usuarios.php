<?php
class Usuarios extends Controller
{
    private $usuariosModel;

    public function __construct()
    {
        // construct para usar la conexion a base de datos y creacion de modelo
        $this->usuariosModel = $this->model('Usuario');
    }

    public function index() {
        $this->view('usuarios/nominas');
    }

    // public function agregar()
    // {
    //     // parte de inicializacion de campos 
    //     $data = [
    //         'button' => 'Enviar',
    //         'rfc' => '',
    //         'nombre_nomina' => '',
    //         'departamento_nomina' => '',
    //         'nss_nomina' => '',
    //         'horas_nomina' => '',
    //         'pago_nominas' => ''
    //     ];
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $data = [
    //             'rfc' => $_POST['rfc'],
    //             'nombre_nomina' => $_POST['nombre_nomina'],
    //             'departamento_nomina' => $_POST['departamento_nomina'],
    //             'nss_nomina' => $_POST['nss_nomina'],
    //             'horas_nomina' => $_POST['horas_nomina'],
    //             'pago_nominas' => $_POST['pagos_nomina'],
    //         ];
    //         //  //para tracking
    //         //                    echo '<pre>';
    //         //                    print_r($data);

    //         //                    echo '</pre>';
    //         //                    die();
    //         //            // fin de tracking
    //         # validacion del lado del servidor // todas las posibles
    //         if (empty($data['rfc']) || empty($data['nombre_nomina']) || empty($data['departamento_nomina']) || 
    // empty($data['nss_nomina']) || empty($data['horas_nomina']) || empty($data['pago_nominas'])) {
    //             $data['msg_error'] = 'Algunos campos están vacíos';
    //         }
    //     }
    //     $this->view('usuarios/nominas', $data);
    // }

    
    public function vacaciones() {
        $this->view('usuarios/vacaciones');
    }

    public function incapacidades() {
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