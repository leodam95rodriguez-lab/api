<?php
/**
 * Configuración de la Base de Datos MySQL
 */
$host = "localhost";
$user = "root";     // Usuario por defecto de XAMPP
$pass = "";         // Contraseña por defecto de XAMPP (vacía)
$db   = "sistema_api";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión: " . $conn->connect_error]));
}

/**
 * Función para guardar un nuevo usuario en la BD
 */
function guardarUsuario($usuario, $password) {
    global $conn;
    // Evitar inyección SQL básica
    $usuario = $conn->real_escape_string($usuario);
    $password = $conn->real_escape_string($password);
    
    $sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false; // Probablemente el usuario ya existe
    }
}

/**
 * Función para obtener un usuario para el login
 */
function buscarUsuario($usuario, $password) {
    global $conn;
    $usuario = $conn->real_escape_string($usuario);
    $password = $conn->real_escape_string($password);
    
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
    $result = $conn->query($sql);
    
    return ($result->num_rows > 0);
}
?>
