<?php
class Conexion {
    function getConectar() {
        // Variables de conexión
        $server = "localhost:3306";
        $login = "root";
        $clave = "";
        $bd = "bd_titishop";

        // Conexión usando mysqli_connect
        $cn = mysqli_connect($server, $login, $clave, $bd);

        // Validación de conexión
        if (!$cn) {
            die("Error al conectar: " . mysqli_connect_error());
        }

        return $cn;
    }
}
?>