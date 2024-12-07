<?php
class Nominas extends Controller
{
    // inicializar un modelo
    private $nominasModel;

    public function __construct()
    {
        // construct para usar la conexion a base de datos y creacion de modelo
        $this->nominasModel = $this->model('Nomina');
    }

    public function agregar() {
         // parte de inicializacion de campos 
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

            if ($this->db->execute()) {
                return true;
            } else {
                error_log("Error al insertar en nominas: " . $this->db->errorInfo());
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
            } elseif (!is_numeric($data['horas_nomina']) || $data['horas_nomina'] <= 0) {
                $data['msg_error'] = 'Las horas trabajadas deben ser un número positivo.';
            } elseif (!is_numeric($data['pago_nominas']) || $data['pago_nominas'] <= 0) {
                $data['msg_error'] = 'El pago debe ser un número positivo.';
            }
        
            # guardar
            if ($this->nominasModel->agregarNominas($data)) {
            redirigir('/usuarios/index/1/10'); // Helper que utiliza header("Location:")
            } else {
             $data['msg_error'] = 'Oops, algo salió mal al guardar los datos.';
            }
        } 
        $this->view('usuarios/nominas');
    }

}