<?php
class Usuarios extends Controller
{
    // inicializar un modelo
    private $usuariosModel;

    public function __construct()
    {
        // construct para usar la conexion a base de datos y creacion de modelo
        $this->usuariosModel = $this->model('Usuario');
    }
    public function vacaciones() {
        $this->view('usuarios/vacaciones');
    }

    public function nominas() {
        $this->view('usuarios/nominas');
    }

    public function incapacidades() {
        $this->view('usuarios/incapacidades');
    }
}