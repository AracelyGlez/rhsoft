<?php
class Usuarios extends Controller
{
    // inicializar un modelo
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