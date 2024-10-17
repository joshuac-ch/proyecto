<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\conpannia;
use App\Http\Controllers\contacto;
use App\Http\Controllers\formulario;
use App\Http\Controllers\oportunidad;
use App\Http\Controllers\producto;
use App\Http\Controllers\socialmedia;
use App\Http\Controllers\twittercontroller;
use App\Http\Controllers\usuarios as ControllersUsuarios;
use App\Http\Controllers\vendedor;
use App\Models\admin as ModelsAdmin;
use App\Models\usuarios;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::get("/dashboard", [App\Http\Controllers\homecontroller::class, "index"]);
Route::controller(ControllersUsuarios::class)->group(function () {
    Route::get("usuarios/view", "index")->name('usuarios.index');
    route::get("usuarios/create", "create")->name('usuarios.create');
    route::get("usuarios/{usuario}", "show")->name('usuarios.show');
});
Route::resource("usuarios", App\Http\Controllers\usuarios::class);
route::get("usuarios/{usuario}/edit", [ControllersUsuarios::class, "edit"])->name("usuarios.edit");
//_-----------------------
route::controller(admin::class)->group(function () {
    route::get("admin/view", 'index')->name('admin.index');
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
});
route::controller(twittercontroller::class)->group(function () {
    route::post('/post-tweet', 'postTweet')->name('post.tweet');
    Route::get('/authenticate-twitter', 'authenticate')->name('twitter.authenticate');
    route::get('publi-tw', 'index')->name('twitter.index');
});


//route::resource('tweets', App\Http\Controllers\twittercontroller::class);
