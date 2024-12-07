<?php
class Usuarios extends Controller
{
    private $nominasModel;

    public function __construct()
    {
        // construct para usar la conexion a base de datos y creacion de modelo
        $this->nominasModel = $this->model('Nomina');
    }

    public function index() {
        $this->view('usuarios/nominas');
    }

    public function agregar()
    {
        // parte de inicializacion de campos 
        $data = [
            'button' => 'Enviar',
            'rfc' => '',
            'nombre_nomina' => '',
            'departamento_nomina' => '',
            'nss_nomina' => '',
            'horas_nomina' => '',
            'pago_nominas' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'rfc' => $_POST['rfc'],
                'nombre_nomina' => $_POST['nombre_nomina'],
                'departamento_nomina' => $_POST['departamento_nomina'],
                'nss_nomina' => $_POST['nss_nomina'],
                'horas_nomina' => $_POST['horas_nomina'],
                'pago_nominas' => $_POST['pagos_nomina'],
            ];
            //  //para tracking
            //                    echo '<pre>';
            //                    print_r($data);

            //                    echo '</pre>';
            //                    die();
            //            // fin de tracking
            # validacion del lado del servidor // todas las posibles
            if (empty($data['rfc']) || empty($data['nombre_nomina']) || empty($data['departamento_nomina']) || 
    empty($data['nss_nomina']) || empty($data['horas_nomina']) || empty($data['pago_nominas'])) {
                $data['msg_error'] = 'Algunos campos están vacíos';
            }
        }
        $this->view('usuarios/nominas', $data);
    }

    
    public function vacaciones() {
        $this->view('usuarios/vacaciones');
    }

    public function incapacidades() {
        $this->view('usuarios/incapacidades');
    }

    public function registrar() {
        $this->view('usuarios/registrar');
    }

    public function login() {
        // //Inicialización de campos
        // // session_start(); No es el lugar adecuado, en config o en este caso en helpers---> apoyo
        // $data = [
        //     'correo_usuario' => '',
        //     'contrasena_usuario' => '',
        //     'msg_error' => ''
        // ];
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $data = [
        //         'correo_usuario' => $_POST['correo_usuario'],
        //         'contrasena_usuario' => $_POST['contrasena_usuario']
        //     ];
        //      # validacion del lado del servidor // todas las posibles
        //     if (empty($data['contrasena_usuario']) || empty($data['correo_usuario'] )) {
        //         $data['msg_error'] = 'Algunos campos estan vacios';
        //     }
        //     # validacion especial (correo, password)
        //     if (!filter_var($data['correo_usuario'], FILTER_VALIDATE_EMAIL)) {
        //         $data['msg_error'] = 'Formato correo no valido';
        //     }
        //     # comprobación de no duplicado
        //     //   dato a comprobar sea el correo, o el rfc o los dos
        //     // pendiente
        //     # guardar
        //     if (empty($data['msg_error'])) {
        //        // llamar al modelo Usuario metodo agregarUsuario
        //         unset($data['msg_error']); 
        //        $logueado = $this->usuariosModel->loginUsuario($data); 
        //        //Para tracking
        //     //    echo '<pre>';
        //     //    print_r($logueado);
        //     //    echo '</pre>'; 
        //     //     die();  
        //         if ($logueado) {
        //             //Aprovechar la superglobal $_SESSION
        //             // Para su uso es necesario iniciar una sesión
        //             $_SESSION['nombre_usuario'] = $logueado->nombre_usuario;
        //             header('Location:/home'); //desde url
        //         } else {
        //             $data['msg_error'] = 'Correo y/o password no concuerdan';
        //         }
        //     }
        // } // fin de post

        $this->view('usuarios/login');
        // echo 'fue get';
    } //fin del login

    // public function logout() {
    //     unset($_SESSION['nombre_usuario']);
    //     session_destroy();
    //     redirigir('/usuarios/login');
    // } 
}