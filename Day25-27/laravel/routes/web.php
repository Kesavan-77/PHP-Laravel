<?php
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\GalleryController;
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

// Route::get('/',function(){
//     return view('welcome');
// });

// Route::get('/paginate', function () {
//     $users = User::paginate(15);
//     return view('pagination',compact('users'));
// });

// Route::get('/joke', [JokeController::class, 'getRandomJoke']);

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::post('/gallery', [GalleryController::class, 'upload'])->name('gallery.post');


Route::post('/galleryDownload', [GalleryController::class, 'download'])->name('gallery.download');
Route::post('/galleryDelete', [GalleryController::class, 'delete'])->name('gallery.delete');