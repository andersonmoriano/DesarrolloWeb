<?php
    require_once "Config/Config.php";
    $ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index"; //empty() verifica si una variable está vacia
    $array = explode("/", $ruta); //convertir un string a un array
    $controller = $array[0];
    $metodo = "index";   
    $parametro = "";

    if(!empty($array[1]))
    {
        if(!empty($array[1] != ""))
        {
            $metodo = $array[1];
        }
    }
    if(!empty($array[2]))
    {
        if(!empty($array[2]!=""))
        {
            for($i=2; $i<count($array); $i++)
            {
                $parametro .= $array[$i]. ",";
            }
            $parametro = trim($parametro, ",");
        }
    }
    echo $parametro;
    require_once "Config/App/autoload.php";
    $dirControllers = "Controllers/".$controller.".php";
    if(file_exists( $dirControllers))
    {
        require_once  $dirControllers;
        $controller = new $controller;
        if(method_exists($controller, $metodo))
        {
            $controller->$metodo($parametro);
        }
        else
        {
            echo "no existe el metodo";
        }
    } 
    else
    {
        echo "no existe el controlador";
    }
?>