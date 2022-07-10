<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Login::index');

/*
* --------------------------------------------------------------------
* Additional Routing
* --------------------------------------------------------------------
*
* There will often be times that you need additional routing and you
* need it to be able to override any defaults in this file. Environment
* based routes is one such time. require() additional route files here
* to make that happen.
*
* You will have access to the $routes object within that file without
* needing to reload it.
*/
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

//ruta  --> 
$routes->get('/inicio', 'Inicio::index');
$routes->post('/login', 'Login::login');
$routes->get('perfil', 'UsuariosController::configurarPerfil');
$routes->get('actualizarPassword', 'UsuariosController::configurarPassword');
$routes->get('salir', 'Inicio::salir');
$routes->get('reservar', 'ReservasController::reservar');

$routes->get('/lista-habitaciones', 'HabitacionController::index');
$routes->get('nueva_habitacion', 'HabitacionController::crear');
$routes->post('guardar_habitacion', 'HabitacionController::guardar');
$routes->get('editar_habitacion/(:num)', 'HabitacionController::editar/$1');
$routes->get('eliminar_habitacion/(:num)', 'HabitacionController::borrar/$1');

$routes->get('/lista-tipohab', 'TipoHabController::index');
$routes->get('/lista_reservas', 'ReservasController::index');

$routes->get('/lista-clientes', 'ClientesController::index');
$routes->get('nuevo_cliente', 'ClientesController::crear_cli');
$routes->post('registrar_cliente', 'ClientesController::registrar');

$routes->get('/lista_usuarios', 'UsuariosController::index');
$routes->get('editar_usuario/(:num)', 'UsuariosController::editar/$1');
$routes->get('nuevo_usuario', 'UsuariosController::crear');
$routes->post('guardar_usuario', 'UsuariosController::guardar');
$routes->post('actualizar_usuario', 'UsuariosController::actualizar');
$routes->get('eliminar_usuario/(:num)', 'UsuariosController::borrar/$1');

