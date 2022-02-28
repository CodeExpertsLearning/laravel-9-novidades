<?php

use Illuminate\Support\Facades\Route;
use \App\Models\{Restaurant, Menu};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



Route::controller(\App\Http\Controllers\RestaurantController::class)
        ->name('restaurants.')
        ->prefix('restaurants')
        ->scopeBindings() //aplica o route model binding com escopo para rotas com parametros aninhados
        ->group(function(){

            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');

            Route::get('/{restaurant}/menus/{menu}', function(Restaurant $restaurant, Menu $menu){
                dd($menu);
            });

        });


// Route::get('/restaurants/{restaurant}/menus/{menu}', function(Restaurant $restaurant, Menu $menu){
//     dd($menu);
// })
// ->scopeBindings();