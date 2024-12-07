<?php

class Nomina
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }

    // public function listarTotalNominas()
    // {
    //     $this->db->query("SELECT     
    //                                 rfc, 
    //                                 nombre_nomina, 
    //                                 departamento_nomina, 
    //                                 nss_nomina,
    //                                 horas_nomina,
    //                                 pago_nominas,
    //                                 id
    //                      FROM nominas");

    //     $nominas = $this->db->multiple();

    //     return $nominas;
    // }

    public function agregarNominas($data)
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
}