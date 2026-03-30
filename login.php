// Cambia la parte de la búsqueda por esta:
if (buscarUsuario($usuario, $password)) {
    echo json_encode(["exito" => true, "mensaje" => "autenticación satisfactoria"]);
} else {
    echo json_encode(["exito" => false, "mensaje" => "error en la autenticación"]);
}
