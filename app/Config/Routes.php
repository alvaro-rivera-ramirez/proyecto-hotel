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
$routes->get('/inicio', 'Inicio::index',['filter' => 'auth']);
$routes->post('/login', 'Login::login');
$routes->get('perfil', 'UsuariosController::configurarPerfil',['filter' => 'auth']);
$routes->post('ed_perfil', 'UsuariosController::editarPerfil');
$routes->get('actualizarPassword', 'UsuariosController::configurarPassword',['filter' => 'auth']);
$routes->post('ed_Password', 'UsuariosController::editarPassword');
$routes->get('salir', 'Inicio::salir');

$routes->get('reservar', 'ReservasController::reservar',['filter' => 'auth']);
//$routes->get('reservar/(:num)', 'ReservasController::reservarHab/$1',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('guardar_reserva', 'ReservasController::guardar');
$routes->get('/lista_reservas', 'ReservasController::index',['filter' => 'auth']);
$routes->post('listar_reserva', 'ReservasController::listar');
$routes->post('obtener_reservas', 'ReservasController::listar_reservas');
$routes->post('listar_detalle', 'ReservasController::listar_detalle');
$routes->post('listar_hab_tipo', 'ReservasController::getHabTipo');
$routes->post('actualizar_reserva', 'ReservasController::actualizar');
$routes->post('eliminar_reserva', 'ReservasController::borrar',['filter' => 'auth:Administrador']);

//rutas de habitaciones
$routes->get('/lista-habitaciones', 'HabitacionController::index',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('listar_habitaciones', 'HabitacionController::listar');
$routes->get('nueva_habitacion', 'HabitacionController::crear',['filter' => 'auth:Administrador']);
$routes->post('guardar_habitacion', 'HabitacionController::guardar');
$routes->post('actualizar_habitacion', 'HabitacionController::actualizar');
$routes->get('editar_habitacion/(:num)', 'HabitacionController::editar/$1',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('eliminar_habitacion/(:num)', 'HabitacionController::borrar/$1');

$routes->get('/lista-tipohab', 'TipoHabController::index',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('listar_tipohab', 'TipoHabController::listar');
$routes->get('nuevo_tipohab', 'TipoHabController::crear',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('guardar_tipohab', 'TipoHabController::guardar');
$routes->post('actualizar_tipohab', 'TipoHabController::actualizar');
$routes->get('editar_tipohab/(:num)', 'TipoHabController::editar/$1',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('eliminar_tipohab/(:num)', 'TipoHabController::borrar/$1');

$routes->get('/lista-clientes', 'ClientesController::index',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('/listar_clientes', 'ClientesController::listar');
$routes->get('nuevo_cliente', 'ClientesController::crear_cli',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('registrar_cliente', 'ClientesController::registrar',['filter' => 'auth']);
$routes->post('buscar_dni', 'ClientesController::buscardni');
$routes->get('editar_cliente/(:num)', 'ClientesController::editar/$1',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('actualizar_cliente', 'ClientesController::actualizarCli');
$routes->post('eliminar_cliente/(:num)', 'ClientesController::borrar/$1');

//RUTAS DE USUARIOS
$routes->get('/lista_usuarios', 'UsuariosController::index',['filter' => 'auth:Administrador,Recepcionista']);
$routes->post('/listar_usuarios', 'UsuariosController::listar');
$routes->get('editar_usuario/(:num)', 'UsuariosController::editar/$1',['filter' => 'auth:Administrador']);
$routes->get('nuevo_usuario', 'UsuariosController::crear',['filter' => 'auth:Administrador']);
$routes->post('guardar_usuario', 'UsuariosController::guardar');
$routes->post('actualizar_usuario', 'UsuariosController::actualizar');
$routes->get('eliminar_usuario/(:num)', 'UsuariosController::borrar/$1',['filter' => 'auth:Administrador']);
$routes->get('recuperar_password', 'UsuariosController::recuperarPassword');


$routes->get('demo-pdf', 'PdfController::demoPDF');

//reportes del dia
$routes->get('reporte-diario', 'ReportesController::reporteDiario',['filter' => 'auth']);
$routes->post('ganancia_diario', 'ReportesController::gananciaD');
$routes->post('reservas_dia', 'ReportesController::listaReporteDia');

//reportes del cliente
$routes->get('reporte-cliente', 'ReportesController::reporteCliente',['filter' => 'auth:Administrador']);
$routes->post('cantidad_mes', 'ReportesController::reservasMes');
$routes->post('clientes_reservas', 'ReportesController::listaReporteMes');
$routes->get('resumen-cliente', 'ReportesController::resumenCliente',['filter' => 'auth']);


//reportes del mes
$routes->get('reporte-mes', 'ReportesController::reporteMes',['filter' => 'auth']);
$routes->post('ganancia_mes', 'ReportesController::gananciaM');
$routes->post('reservas_mes', 'ReportesController::listaReporteMesFull');

//PDF REPORTES
//$routes->get('imprimirpdfCliente', 'ReportesController::imprimirReporteCliente',['filter' => 'auth']);


//PDF

$routes->get('/imprimir_hab', 'HabitacionController::imprimir',['filter' => 'auth']);
$routes->get('/imprimir_tipohab', 'TipoHabController::imprimir',['filter' => 'auth']);
$routes->get('/imprimir_usuarios', 'UsuariosController::imprimir',['filter' => 'auth:Administrador']);
$routes->get('/imprimir_clientes', 'ClientesController::imprimir',['filter' => 'auth:Administrador']);
$routes->get('/imprimir_boleta/(:num)', 'ReservasController::imprimir_boleta/$1',['filter' => 'auth']);
//$routes->post('imprimir_boleta', 'ReservasController::imprimir_boleta',['filter' => 'auth']);

//PDF

//REPORTES EN PDF
$routes->get('imprimirpdfCliente', 'ReportesController::PDF_cliente',['filter' => 'auth']);
$routes->get('imprimirpdfMes', 'ReportesController::PDF_mes',['filter' => 'auth']);
$routes->get('imprimirpdfDia', 'ReportesController::PDF_dia',['filter' => 'auth']);



//Reporte de Habitacion
$routes->get('reporte-habitacion', 'ReportesController::reporteHabitacion',['filter' => 'auth']);
$routes->post('ganancia_tipohab', 'ReportesController::gananciaTipoHab');
$routes->post('habitaciones_reservas', 'ReportesController::listaReporteMesHabitacion');
$routes->post('obtener_reservas_hab', 'ReportesController::listarDetalleHab');

// $routes->post('cantidad_mes_habitacion', 'ReportesController::reservasMesHabitacion');

