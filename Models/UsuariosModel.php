<?php
class UsuariosModel extends Query
{
    public function  __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contraseña = '$clave'";
        $data = $this->select($sql);
        return $data;
    }
}
?>