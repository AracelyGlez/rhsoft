<?php

class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
}