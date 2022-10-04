<?php
require_once("./clases/accesoDatos.php");
require_once("./clases/ProductoEnvasado.php");

use Zelarayan\AccesoDatos;
use Zelarayan\ProductoEnvasado;

$producto_json = isset($_POST["producto_json"]) ? $_POST["producto_json"] : NULL;
$exito = false;
$mensaje = "No se pudo modificar el producto";

if ($producto_json) {
    $producto_obj = json_decode($producto_json, true);

    $producto = new ProductoEnvasado(
        $producto_obj["id"],
        $producto_obj["codigoBarra"],
        $producto_obj["precio"],
        "",
        $producto_obj["nombre"],
        $producto_obj["origen"]
    );

    if ($producto->Modificar()) {
        $exito = true;
        $mensaje = "Producto modificado";
    }
}

$retornoJSON = array("exito" => $exito, "mensaje" => $mensaje);

echo json_encode($retornoJSON);
