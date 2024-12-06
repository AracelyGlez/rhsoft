<?php
/**
 * Controlador general para cargar vistas y modelos y no generar repeticion de codigo
 */
class Controller {
    // metodo vista
    /**
     * @param $view -- valor simple, es decir sin extension
     */
    public function view($view,$data = []){
        if(file_exists(APPROOT . '/views/' . $view . '.php')) {
           require_once APPROOT . '/views/' . $view . '.php';
        }  // if exist 
        else  {
            /**
             * Recomienda manejar los codigos 404
             */
        die("La vista {$view} no existe");
        }
    } // fin de metodo view

    // queda pendiente el modelo ===listo

    public function model($model){
        if(file_exists(APPROOT . '/models/' . $model . '.php')) {
            require_once APPROOT . '/models/' . $model . '.php';
            return new $model();
         }  // if exist 
         else  {
             /**
              * Recomienda manejar los codigos 404
              */
         die("El modelo {$model} no existe");
         }
    }


}