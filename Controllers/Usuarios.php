<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        //print_r($this->model->getUsuario());
        $this->views->getView($this, "index");
    }
    public function validar()
    {
        if(empty($_POST["usuario"]) || empty($_POST["clave"]))
        {
            $msg = "Los campos estan vacios";
        }
        else
        {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $data = $this->model->getUsuario($usuario, $clave);
            if($data)
            {
                $_SESSION["usuario"] = $data["idUsuario"];
                $_SESSION["usuario"] = $data["usuario"];
                $_SESSION["nombre"] = $data["nombre"];
                $msg="ok";
            }
            else
            {
                $msg = "Usuario o contraseña incorrecta ";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        print_r($_POST);
        die();
    }
}
?>