<?php

use App\Http\Controllers\actividadesController;
use App\Http\Controllers\admin;
use App\Http\Controllers\campanna;
use App\Http\Controllers\campanna_recurso;
use App\Http\Controllers\campañaables;
use App\Http\Controllers\conpannia;
use App\Http\Controllers\contacto;
use App\Http\Controllers\datosHistoricosController;
use App\Http\Controllers\documentos;
use App\Http\Controllers\formulario;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\notasController;
use App\Http\Controllers\oportunidad;
use App\Http\Controllers\plantillas;
use App\Http\Controllers\PrediccionController;
use App\Http\Controllers\producto;
use App\Http\Controllers\reunionesController;
use App\Http\Controllers\socialmedia;
use App\Http\Controllers\tareas;
use App\Http\Controllers\twittercontroller;
use App\Http\Controllers\usuarios as ControllersUsuarios;
use App\Http\Controllers\vendedor;
use App\Models\admin as ModelsAdmin;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Necesario para consultar las tablas

Route::get('/', function () {
    return view('usuarios.login');
});
//route::get("/u/{usuario}", [App\Http\Controllers\usuarios::class, 'VerificarUsuarios'])->name('verificar.usuarios');

route::get('/', [App\Http\Controllers\usuarios::class, 'indexLogin'])->name('user.login');
//ANTES route::post("verificado", [App\Http\Controllers\usuarios::class, 'datoslogin'])->name('veri.login');
//AHORA
route::post("verificado", [App\Http\Controllers\homecontroller::class, 'datoslogin'])->name('veri.login');

route::get('logout', [App\Http\Controllers\usuarios::class, 'logOut'])->name('log.login');
route::get('/perfil/{usuario}', [App\Http\Controllers\usuarios::class, 'perfil'])->name('perfil.user');
//route::get("/dashboard", [App\Http\Controllers\homecontroller::class, "index"])->name('dash.index');
route::get("/dashboard", [App\Http\Controllers\datosHistoricosController::class, "VentasTotales"])->name('dash.index');
// SOLO PARA PRUEBAS route::get('notifi', [App\Http\Controllers\homecontroller::class, 'appnoti'])->name("noti.sistem");
route::get("/dashboard", [App\Http\Controllers\homecontroller::class, "index"])->name('dash.index');
Route::controller(ControllersUsuarios::class)->group(function () {
    Route::get("usuarios/view", "index")->name('usuarios.index');
    route::get("usuarios/create", "create")->name('usuarios.create');
    route::get("usuarios/{usuario}", "show")->name('usuarios.show');
});
Route::resource("usuarios", App\Http\Controllers\usuarios::class);
route::get("usuarios/{usuario}/edit", [ControllersUsuarios::class, "edit"])->name("usuarios.edit");
//_-----------------------
route::controller(admin::class)->group(function () {
    route::get('admin/busqueda', 'search')->name('admin.search'); // CHEKEAR
    route::get("admins", 'index')->name('admin.index');
    route::get("admins/view", 'index')->name('admin.index');
    route::get("admin/create", 'create')->name('admin.create');
    route::get("admin/{encargados}", 'show')->name('admin.show');
});
Route::resource("admin", App\Http\Controllers\admin::class);
route::get('admin/{admin}/edit', [admin::class, 'edit'])->name('admin.edit');
//FALTA VENDEDOR
//_------------------------
route::controller(vendedor::class)->group(function () {
    route::get('vendedor/view', 'index')->name('vendedor.index');
    route::get('vendedor/create', 'create')->name('vendedor.create');
    route::get('vendedor/{id}/show', 'show')->name('vendedor1.show');
    route::get(' vendedor', 'index')->name('vendedor.index');
});
//_------------------------
route::resource("vendedor", App\Http\Controllers\vendedor::class);

route::controller(oportunidad::class)->group(function () {
    route::get('oportunidades/view', 'index')->name('opo.index');
    route::get('oportunidades/create', 'create')->name('opo.create');
    route::get('oportunidades/{oportunidad}/show', 'show')->name('opo.show');
});
route::resource("oportunidades", App\Http\Controllers\oportunidad::class);
route::get("oportunidades/{oportunidad}/edit", [App\Http\Controllers\oportunidad::class, 'edit'])->name('oportunidad.edit');
Route::post('oportunidades/{id}/cambiarEstado', [App\Http\Controllers\oportunidad::class, 'cambiarEstado']);
route::controller(producto::class)->group(function () {
    route::get('productos/index', 'index')->name('productos.index');
    route::get('productos/create', 'create')->name('productos.create');
    route::get('productos/{producto}', 'show')->name('productos.show');
});
route::resource('productos', App\Http\Controllers\producto::class);
route::get('productos/{producto}/edit', [App\Http\Controllers\producto::class, 'edit'])->name('productos.edit');

Route::get('productos/{producto}/delete', [App\Http\Controllers\producto::class, 'confirmDelete'])->name('productos.confirmDelete');

// Ruta para eliminar el producto
Route::delete('productos/{producto}', [App\Http\Controllers\producto::class, 'destroy'])->name('productos.destroy');

route::controller(conpannia::class)->group(function () {
    route::get('compannias/index', 'index')->name('companias.index');
    route::get('compannias/create', 'create')->name('compannias.create');
    route::get('compannias/{compania}/show', 'show')->name('compannias.show');
});
route::resource('compannias', App\Http\Controllers\conpannia::class);
route::get('compannias/{compannia}/edit', [App\Http\Controllers\conpannia::class, 'edit'])->name('compannias.edit');

route::controller(formulario::class)->group(function () {
    route::get('formularios/index', 'index')->name('formu.index');
});

route::controller(contacto::class)->group(function () {
    route::get('contactos/index', 'index')->name('contactos.index');
    route::get('contactos/create', "create")->name('contactos.create');
    route::get('contactos/{contacto}/show', 'show')->name('contactos.show');
});
route::resource("contactos", App\Http\Controllers\contacto::class);
route::get('contactos/{contacto}/edit}', [App\Http\Controllers\contacto::class, 'edit'])->name('contactos.edit');

route::controller(socialmedia::class)->group(function () {
    route::get('social-media/index', 'index')->name("social.index");
    route::get('social-media/admin', 'admin')->name('social.admin');
    route::get('social-media/publi', 'publi')->name('social.publi');
    route::get('socialmedia', 'index')->name('social.index');
});
route::controller(twittercontroller::class)->group(function () {
    route::post('/post-tweet', 'postTweet')->name('post.tweet');
    //Route::get('/authenticate-twitter', 'authenticate')->name('twitter.authenticate');
    route::get('publi-tw', 'index')->name('twitter.index');
    //Route::get('/twitter/authenticate', 'authenticate2');
    //Route::get('/twitter/callback', 'callback');
    Route::get('/auth/twitter', 'redirectToTwitter')->name('twitter.auth');

    //  route::get('socialmedia/show', 'showSocialPubli')->name('social.muestreo');
    // Ruta de callback AQUI VA LA RUTA DE LLAMADA OSEA LA RUTA DE DIRRECIONAMIENTO
    Route::get('/auth/twitter/callback', 'handleTwitterCallback')->name('twitter.callback');
    Route::get('/tweet', 'tweet');
    Route::get('/callback', 'callback');
});

route::controller(campanna_recurso::class)->group(function () {
    route::get('campannas/index', 'index')->name('campannas.index');
    route::get('campañas', 'index')->name('campannas.index');
    route::get('campannas/create', 'create')->name('campannas.create');
});
route::resource('campana', App\Http\Controllers\campanna_recurso::class);
route::get('campannas/{campana}/edit', [App\Http\Controllers\campanna_recurso::class, 'edit'])->name('campannas.edit');

// Ruta para eliminar
route::get('campannas/{campana_espe}/delete', [App\Http\Controllers\campanna_recurso::class, 'avisoDelet'])->name('camapanas.confirmDelete');

//Route::delete('campannas/{campana_espe}', [App\Http\Controllers\campanna_recurso::class, 'destroy'])->name('campanas.destoy');
//route::resource('tweets', App\Http\Controllers\twittercontroller::class);
Route::get('/sugerencias', function () {
    // Obtener todas las tablas de la base de datos
    $tablas = DB::select("
        SELECT TABLE_NAME
        FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'sistema' AND TABLE_NAME IN('admins','campanna_recursos','campañas','compannias','contactos','emails',
                                                         'formularios','oportunidads','productos','publicacion','seguimiento','socialmedia',
                                                         'soporte','ti','usuarios','vendedors')

    ");

    // Mapear las tablas en un arreglo simple
    $tablas_list = array_map(function ($tabla) {
        return $tabla->TABLE_NAME; // Usar el nombre de la columna directamente
    }, $tablas);

    // Devolver la lista de tablas como JSON
    return response()->json($tablas_list);
});
Route::get('/whatsapp/webhook', [App\Http\Controllers\WhatsAppController::class, 'handleWebhook']);
Route::get('/send-whatsapp', [App\Http\Controllers\WhatsAppController::class, 'sendTemplateMessage'])->name('enviar-mensaje.wasap');
route::get('WhatsApp/index', [App\Http\Controllers\WhatsAppController::class, 'index']);
Route::get('/enviar-imagen', [App\Http\Controllers\WhatsAppController::class, 'mostrarFormulario'])->name('formulario-imagen.wasap'); //enviar imagen desde watsap
Route::post('/enviar-imagen', [App\Http\Controllers\WhatsAppController::class, 'enviarImagen'])->name('enviar-imagen.wasap');
route::get('veri-wasap', [App\Http\Controllers\WhatsAppController::class, 'verifyWebhook']);
Route::get('/webhook', [App\Http\Controllers\WhatsAppController::class, 'handleIncomingMessage']);

//Ruta google
route::get('pruebas', [App\Http\Controllers\homecontroller::class, 'VentasMensuales']);
//apreta boton manga al autentificate
//Route::get('auth-google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
//muestra resultado
//Route::get('callback-goole/', [GoogleController::class, 'handleGoogleCallback'])->name('calback.goole');
//route::get('enviar-email', [GoogleController::class, "enviarEmail"])->name('google.enviarEmail');
//route::resource("google", App\Http\Controllers\GoogleController::class);

Route::get('auth-google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('callback-goole', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::post('enviar-email', [GoogleController::class, 'enviarEmail'])->name('google.enviarEmail');

route::controller(plantillas::class)->group(function () {
    route::get('plantillas/index', 'index')->name("planti.index");
    route::get('plantillas/create', 'create')->name('planti.create');
    route::get('plantillas/{plantilla}/show', 'show')->name('planti.show');
});
route::resource("plantillas", App\Http\Controllers\plantillas::class);

route::controller(tareas::class)->group(function () {
    route::get('tareas/index', 'index')->name('tareas.index');
    route::get('tareas/create', 'create')->name('tarea.create');
});
route::resource('tarea', App\Http\Controllers\tareas::class);
route::get('tareas/{tarea}/editar', [App\Http\Controllers\tareas::class, 'edit'])->name("tarea.edit");
route::get('tareas/{tarea}/eliminar', [App\Http\Controllers\tareas::class, 'AdvEliminar'])->name("tarea.AdvEliminar");

//NOTAS
route::controller(notasController::class)->group(function () {
    route::get('notas/index', 'index')->name('notas.index');
    route::get('notas/create', 'create')->name('notas.create');
});
route::resource('nota', App\Http\Controllers\notasController::class);

route::controller(documentos::class)->group(function () {
    route::get('documentos/index', 'index')->name("documentos.index");
    route::get('documentos/create', 'create')->name("documentos.create");
});
route::resource('documento', App\Http\Controllers\documentos::class);

route::controller(reunionesController::class)->group(function () {
    route::get('reuniones/index', 'index')->name('reuniones.index');
    route::get('reuniones/create', 'create')->name('reuniones.create');
    Route::get('mostrar/reunion', 'obtenerReuniones');
    Route::get('calendario', 'calendario')->name('calendario.index');
});

route::resource('reunion', App\Http\Controllers\reunionesController::class);
route::get('reuniones/{reunion}/edit', [App\Http\Controllers\reunionesController::class, 'edit'])->name('editar.reunion');
route::get('reuniones/{reunion}/delete', [App\Http\Controllers\reunionesController::class, 'adventercia'])->name('adv.reunion');

//Modelo de prediccion

Route::get('/predecir-oportunidad', [PrediccionController::class, 'predecirOportunidad']); //FALTA REVIAR
Route::get('/predicciones', [PrediccionController::class, 'mostrarPredicciones'])->name('mostrar.predicciones');
//predicciones
route::controller(PrediccionController::class)->group(function () {
    route::get('predicciones/create', 'create')->name('create.predi');
});
route::resource('prediccion', App\Http\Controllers\PrediccionController::class);

route::controller(actividadesController::class)->group(function () {
    route::get('actividades/index', 'index')->name('acti.index');
    route::get('actividades/{actividad}/show', 'show')->name('acti.sho');
});

route::resource('actividad', App\Http\Controllers\actividadesController::class);

route::controller(datosHistoricosController::class)->group(function () {
    route::get('datoshistoricos/', 'ventasGanadasPorMes')->name('historico.index');
    Route::get('/promedio', 'Promedio');
    Route::get('/ventas-por-region', 'ventasPorRegion');
    Route::get('/ventas-por-estado', 'pvsg');
    route::get('/sector', 'sectorOportunidades');
    //  route::get('/canal', 'ventasPorCanalEstado');
});
route::get('in', [App\Http\Controllers\PrediccionController::class, 'generarInsights']);

//puebas
route::get('historia', [App\Http\Controllers\historiaController::class, 'sectorOportunidades']);
route::get('canales', [App\Http\Controllers\historiaController::class, 'ventasPorCanalEstado']);
