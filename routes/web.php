<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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
    return view('home');
});

/* information web pages */
Route::get('feature', [WebsiteController::class, 'feature']);
Route::get('issue', [WebsiteController::class, 'issue']);
Route::get('download', [WebsiteController::class, 'download']);
Route::get('faqs', [WebsiteController::class, 'faqs']);
Route::get('about', [WebsiteController::class, 'about']);
Route::get('whatsnew', [WebsiteController::class, 'whatsnew']);


Route::get('doc/overview', [WebsiteController::class, 'overview']);
Route::get('doc/installation', [WebsiteController::class, 'installation']);
Route::get('doc/quickstart', [WebsiteController::class, 'quickstart']);

Route::get('doc/functionality/trim', [WebsiteController::class, 'trim']);
Route::get('doc/functionality/dedup_basic', [WebsiteController::class, 'dedupbasic']);
Route::get('doc/functionality/dedup_pos', [WebsiteController::class, 'deduppos']);
Route::get('doc/functionality/dedup_gene', [WebsiteController::class, 'dedupgene']);
Route::get('doc/functionality/dedup_sc', [WebsiteController::class, 'dedupsc']);
Route::get('doc/functionality/dechimeric', [WebsiteController::class, 'dechimeric']);

Route::get('doc/fileformat/input', [WebsiteController::class, 'input']);
Route::get('doc/fileformat/output', [WebsiteController::class, 'output']);

Route::get('doc/methodology/dechimeric', [WebsiteController::class, 'metdechimeric']);
Route::get('doc/methodology/markovclustering', [WebsiteController::class, 'metmcl']);
Route::get('doc/methodology/directional', [WebsiteController::class, 'metdirectional']);

Route::get('doc/changelog', [WebsiteController::class, 'changelog']);
