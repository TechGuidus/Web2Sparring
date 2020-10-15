<?php

require_once "Controller/ProductosController.php";
require_once "Controller/UserController.php";
require_once "RouterClass.php";


define ("BASE_URL", '//'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]).'/');


$r = new Router();

//Default//
$r->addRoute("productos", "GET", "ProductosController", "listarProductos");
$r->addRoute("categorias", "GET", "ProductosController", "listarCategorias");

//Navegacion//
$r->addRoute("index", "GET","ProductosController","index"); 
$r->addRoute("productos", "GET","ProductosController","productos");
$r->addRoute("comunidad", "GET","ProductosController","comunidad");

//Tablas//



  //////////////////RUTAS CATEGORIA/////////////////////
$r->addRoute("tablaCategorias", "GET", "ProductosController", "tablaCategorias"); 

$r->addRoute("InsertarCategoria", "POST","ProductosController", "InsertarCategoria");
$r->addRoute("BorrarCategoria/:ID", "GET","ProductosController", "suprimirCategoria");
$r->addRoute("EditarCategoria/:ID", "GET", "ProductosController", "EditarIdCategoria");
$r->addRoute("ModificarCategoria", "POST", "ProductosController", "EditarCategoria");



  //////////////////RUTAS PRODUCTO/////////////////////
  $r->addRoute("tablaProductos", "GET", "ProductosController", "baseCompleta");
  $r->addRoute("Insertar", "POST","ProductosController", "InsertarProducto"); 
  $r->addRoute("Borrar/:ID", "GET","ProductosController", "suprimirProducto");
  $r->addRoute("Editar/:ID", "GET", "ProductosController", "EditarIdProducto");
  $r->addRoute("Editar", "POST", "ProductosController", "EditarProducto");
  $r->addRoute("Ver/:ID", "GET", "ProductosController", "verProducto");
  $r->addRoute("Select", "GET","ProductosController", "getProductosPorCategoria");
  
  //////////////////RUTAS USUARIO/////////////////////
  $r->addRoute("login", "GET", "UserController", "Login");
  $r->addRoute("desloguear", "GET", "UserController", "Desloguear");
  $r->addRoute("verificar", "POST", "UserController", "verificar");
  $r->addRoute("chequeologin","GET","UserController","showLogin");


  
  //////////////////DEFAULT/////////////////////
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
$r->setDefaultRoute("ProductosController", "index");



