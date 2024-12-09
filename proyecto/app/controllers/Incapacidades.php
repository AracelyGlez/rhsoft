<?php
class Incapacidades extends Controller
{
    // inicializar un modelo
    private $incapacidadesModel;

    public function __construct()
    {
        // construct para usar la conexion a base de datos y creacion de modelo
        $this->incapacidadesModel = $this->model('Incapacidad');
    }

    public function agregarIncapacidades() {
         // parte de inicializacion de campos 
         $data = [
            'button' => 'Guardar',
            'rfc' => '',
            'nombre_usuario' => '',
            'departamento_usuario' => '',
            'dias_incapacidad' => '',
            'tipo_incapacidad' => '',
            'pago_general' => '',
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
                'nombre_usuario' => $_POST['nombre_usuario'],
                'departamento_usuario' => $_POST['departamento_usuario'],
                'dias_incapacidad' => $_POST['dias_incapacidad'],
                'tipo_incapacidad' => $_POST['tipo_incapacidad'],
                'pago_general' => $_POST['pago_general'],
                
            ];

            if ($this->db->execute()) {
                return true;
            } else {
                error_log("Error al insertar en incapacidades: " . $this->db->errorInfo());
                return false;
            }
            //  //para tracking
            //                    echo '<pre>';
            //                    print_r($data);

            //                    echo '</pre>';
            //                    die();
            //            // fin de tracking
            # validacion del lado del servidor // todas las posibles
            if (!preg_match('/^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$/', $data['rfc'])) {
                $data['msg_error'] = 'El RFC no tiene un formato válido.';
            } elseif (!is_numeric($data['dias_incapacidad']) || $data['dias_incapacidad'] <= 0) {
                $data['msg_error'] = 'Los días de incapacidad deben ser un número positivo.';
            } elseif (!is_numeric($data['pago_general']) || $data['pago_general'] <= 0) {
                $data['msg_error'] = 'El pago debe ser un número positivo.';
            }
        
            # guardar
            if ($this->nominasModel->agregarIncapacidades($data)) {
            redirigir('/usuarios/index/1/10'); // Helper que utiliza header("Location:")
            } else {
             $data['msg_error'] = 'Oops, algo salió mal al guardar los datos.';
            }
        } 
        $this->view('usuarios/incapacidades');
    }

}