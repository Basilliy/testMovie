<?php

    use App\Http\Controllers\MovieController;
    use App\Http\Controllers\SongController;
    use App\Http\Controllers\SystemController;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::group(['prefix' => 'movie'], function () {
        Route::get('', [MovieController::class, 'all'])->name('movie.all');
        Route::get('{movie}', [MovieController::class, 'info'])->name('movie.info');
        Route::post('add', [MovieController::class, 'create'])->name('movie.add');
        Route::delete('{movie}/delete', [MovieController::class, 'delete'])->name('movie.delete');
        Route::put('{movie}/update', [MovieController::class, 'update'])->name('movie.update');
    });

    Route::group(['prefix' => 'song'], function () {
        Route::get('', [SongController::class, 'all'])->name('song.all');
        Route::get('{song}', [SongController::class, 'info'])->name('song.info');
        Route::post('add', [SongController::class, 'create'])->name('song.add');
        Route::delete('{song}/delete', [SongController::class, 'delete'])->name('song.delete');
        Route::put('{song}/update', [SongController::class, 'update'])->name('song.update');
    });
