<?php
/**
 * Indentificación
 */
class Ruta {
    protected $controladorActual = 'Home';
    protected $metodoActual      = 'index';
    protected $parametros        = [];

    public function __construct() {
      $url = $this->getUrl();   //recibe un arreglo
      // para probar 
      // echo '<pre>' ;  
      // var_dump($url);
      // echo '</pre>' ;
      // validar $url
      if($url != null){
        // CARGAR CONTROLADOR
        if(file_exists(APPROOT . '/controllers/' . ucwords($url[0]) . '.php')) {
          $this->controladorActual = ucwords($url[0]);
      } // if exist

      // limpiar la memoria (opcional, muy recomendable)
      unset($url[0]);
    } // if not null
      // cargar fisicamente el archivo
      include_once APPROOT . '/controllers/' . $this->controladorActual . '.php';

      // Instanciar el controlador
      $this->controladorActual = new $this->controladorActual;

      //USAR METODO 
      if(isset($url[1])){
        if(method_exists($this->controladorActual, $url[1])){
          $this->metodoActual = $url[1];
        }
        // limpiar la memoria (opcional, muy recomendable)
       unset($url[1]);

      } // if metodo
      // PARAMETROS
      $this->parametros = ($url)?array_values($url) : [];

      // ya tenemos controlador, metodo, y posiblemente paramtros===> hacer la peticion y correr
      call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);
       
   
  } // fin de __construct

    public function getUrl(){
        if(isset($_GET['url'])){
            # limpiar url
            $url = rtrim($_GET['url'],'/'); // recortar espacios en blanco
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); // crea un arreglo
            return $url;
        } // fin de isset
    } // fin de getUrl
  } // fin de la clase
