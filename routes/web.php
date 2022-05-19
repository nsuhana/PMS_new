<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProjectEditorController;
use App\Http\Controllers\ProjectCardController;
use App\Http\Controllers\StatusKemajuanKewanganProjekController;
use App\Http\Controllers\StatusKemajuanKerjaProjekController;
use App\Http\Controllers\KumpulanFasaController;
use App\Http\Controllers\SubKumpulanFasaController;
use App\Http\Controllers\PublicSearchController;
use App\Http\Controllers\ProjectSettingController;
use App\Http\Controllers\EditorCommentController;
use App\Http\Controllers\RestoreUserController;
use App\Http\Controllers\RestoreProjectController;
use App\Http\Controllers\RestoreVendorController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\PDFController;

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

Route::get('en', function() {
    session(['locale' => 'en']);
    return back();
});

Route::get('my', function() {
    session(['locale' => 'my']);
    return back();
});

// Route::get('routes', function () {
//     $routeCollection = Route::getRoutes();

//     echo "<table style='width:100%'>";
//     echo "<tr>";
//     echo "<td width='10%'><h4>HTTP Method</h4></td>";
//     echo "<td width='10%'><h4>Route</h4></td>";
//     echo "<td width='10%'><h4>Name</h4></td>";
//     echo "<td width='70%'><h4>Corresponding Action</h4></td>";
//     echo "</tr>";
//     foreach ($routeCollection as $value) {
//         echo "<tr>";
//         echo "<td>" . $value->methods()[0] . "</td>";
//         echo "<td>" . $value->uri() . "</td>";
//         echo "<td>" . $value->getName() . "</td>";
//         echo "<td>" . $value->getActionName() . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
// });

//  =============================================== 
//                 ANY USER OR GUEST
//  ===============================================

Route::get('/test', function () { return view('template'); });

Route::get('/base', function () { return view('testbase'); });

Route::get('/', [HomeDashboardController::class, 'index'])->name('dashboard');
Route::get('/2', [HomeDashboardController::class, 'index2'])->name('dashboard');

Route::get('/search/home', function () { return view('search.home'); })->name('search.home');

// Route untuk search projek > start
Route::post('/search', [PublicSearchController::class, 'index']);
Route::get('/search/result', [PublicSearchController::class, 'search']);
Route::get('/search/detail', [PublicSearchController::class, 'show']);
// Route untuk search projek > end

// RESTful route accessible to any user or guest > start
Route::resource('/projek', ProjectController::class);
Route::resource('/vendor', VendorController::class)->only(['index', 'show']);
// RESTful route accessible to any user or guest > end

Route::resource('/user', PublicProfileController::class);
    
Route::get('/user/{user}/tukar-kata-laluan', [PublicProfileController::class, 'changePasswordView']);
Route::post('/user/{user}/tukar-kata-laluan', [PublicProfileController::class, 'changePassword']);


//  =============================================== 
//                  LOGGED IN USER ONLY
//  ===============================================

// Route::group(['middleware' => ['auth']], function() {

//     // RESTful route only accessible to login user > start
//     // Route::resource('/projek', ProjectController::class)->only(['index']);
//     // RESTful route only accessible to login user > end

// });

//  =============================================== 
//  USER WITH STAFF PRIVILEGE ONLY (NOT NORMAL USER)
//  ===============================================

Route::group(['middleware' => ['isNotNormalUser']], function () {
    
    // RESTful route only accessible to special user > start
    Route::resource('/projek', ProjectController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::resource('/vendor', VendorController::class)->only(['create', 'store', 'edit', 'update']);
    Route::resource('/projek/{projek}/kandungan', ProjectCardController::class);
    Route::resource('/projek/{projek}/ulasan', EditorCommentController::class);
    // RESTful route only accessible to special user > end

    // Route untuk access projek general setting > start
    Route::get('/projek/{projek}/tetapan', [ProjectSettingController::class, 'index']);
    Route::get('/projek/{projek}/tetapan/update-status-projek', [ProjectSettingController::class, 'updateStatus']);
    Route::get('/projek/{projek}/tetapan/update-status-publish', [ProjectSettingController::class, 'updateStatusPublish']);
    Route::get('/projek/{projek}/tetapan/update-description', [ProjectSettingController::class, 'updateDescription']);

    Route::get('/projek/{projek}/tetapan/editor', [ProjectEditorController::class, 'index']);
    Route::get('/projek/{projek}/tetapan/editor/read', [ProjectEditorController::class, 'read']);

    Route::get('/projek/{projek}/tetapan/editor/store', [ProjectEditorController::class, 'store']);
    Route::get('/projek/{projek}/tetapan/editor/read', [ProjectEditorController::class, 'read']);
    Route::get('/projek/{projek}/tetapan/editor/search', [ProjectEditorController::class, 'search']);
    Route::get('/projek/{projek}/tetapan/editor/{user_projek}/update-status', [ProjectEditorController::class, 'updateStatus']);
    Route::get('/projek/{projek}/tetapan/editor/{user_projek}/delete', [ProjectEditorController::class, 'destroy']);
    // Route untuk access projek general setting > end

    // Route untuk view [Status kemajuan Kerja Projek] > start
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek', [StatusKemajuanKerjaProjekController::class, 'index']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/read', [StatusKemajuanKerjaProjekController::class, 'read']);
    // Route untuk view [Status kemajuan Kerja Projek] > end

    // Route untuk view [Status Kemajuan Kewangan Projek] > start
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek', [StatusKemajuanKewanganProjekController::class, 'index']);
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/read', [StatusKemajuanKewanganProjekController::class, 'read']);
    // Route untuk view [Status Kemajuan Kewangan Projek] > end

    // Route untuk edit [Status kemajuan Kerja Projek] > start
    // ----- Fasa utama > start
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/create', [StatusKemajuanKerjaProjekController::class, 'create']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/store', [StatusKemajuanKerjaProjekController::class, 'store']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/edit', [StatusKemajuanKerjaProjekController::class, 'edit']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/update', [StatusKemajuanKerjaProjekController::class, 'update']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/delete', [StatusKemajuanKerjaProjekController::class, 'destroy']);
    // ----- fasa utama > end

    // ----- kumpulan fasa > start
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/create', [KumpulanFasaController::class, 'create']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/store', [KumpulanFasaController::class, 'store']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/edit', [KumpulanFasaController::class, 'edit']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/update', [KumpulanFasaController::class, 'update']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/delete', [KumpulanFasaController::class, 'destroy']);
    // ----- kumpulan fasa > end

    // ----- sub-kumpulan fasa > start
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/sub-kumpulan-fasa/create', [SubKumpulanFasaController::class, 'create']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/sub-kumpulan-fasa/store', [SubKumpulanFasaController::class, 'store']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/sub-kumpulan-fasa/{sub_kumpulan_fasa}/edit', [SubKumpulanFasaController::class, 'edit']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/sub-kumpulan-fasa/{sub_kumpulan_fasa}/update', [SubKumpulanFasaController::class, 'update']);
    Route::get('/projek/{projek}/status-kemajuan-kerja-projek/{status_kemajuan_kerja_projek}/kumpulan-fasa/{kumpulan_fasa}/sub-kumpulan-fasa/{sub_kumpulan_fasa}/delete', [SubKumpulanFasaController::class, 'destroy']);
    // ----- sub-kumpulan fasa > end
    // Route untuk edit [Status kemajuan Kerja Projek] > end

    // Route untuk edit [Status Kemajuan Kewangan Projek] > start
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/create', [StatusKemajuanKewanganProjekController::class, 'create']);
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/store', [StatusKemajuanKewanganProjekController::class, 'store']);
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/{status_kemajuan_kewangan_projek}/edit', [StatusKemajuanKewanganProjekController::class, 'edit']);
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/{status_kemajuan_kewangan_projek}/detail', [StatusKemajuanKewanganProjekController::class, 'show']);
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/{status_kemajuan_kewangan_projek}/update', [StatusKemajuanKewanganProjekController::class, 'update']);
    Route::get('/projek/{projek}/status-kemajuan-kewangan-projek/{status_kemajuan_kewangan_projek}/delete', [StatusKemajuanKewanganProjekController::class, 'destroy']);
    // Route untuk edit [Status Kemajuan Kewangan Projek] > end


});


//  =============================================== 
//                  ADMIN USER ONLY
//  ===============================================

Route::group(['middleware' => ['isAdmin']], function () {

    Route::get('admin', [HomeAdminController::class, 'index'])->name('admin');
    // Route::get('admin', function () { return view('admin.index'); })->name('admin');

    Route::get('/admin/generate-pdf', [PDFController::class, 'generatePDF']);
    
    // Route untuk ke [unpublish projek@admin] > start
    Route::put('/admin/projek/{projek}/unpublish', [ProjectController::class, 'unpublishProjek']);
    // Route untuk ke [unpublish projek@admin] > end

    // Route untuk ke [trashed user] > start
    Route::get('/admin/user/deleted', [RestoreUserController::class, 'index']);
    Route::put('/admin/user/{id}/restore', [RestoreUserController::class, 'restoreUser']);
    Route::put('/admin/user/{id}/permanent-delete', [RestoreUserController::class, 'forceDestroyUser']);
    // Route untuk ke [trashed user] > end
    
    // Route untuk ke [trashed projek] > start
    Route::get('/admin/projek/deleted', [RestoreProjectController::class, 'index']);
    Route::put('/admin/projek/{id}/restore', [RestoreProjectController::class, 'restoreProjek']);
    Route::put('/admin/projek/{id}/permanent-delete', [RestoreProjectController::class, 'forceDestroyProjek']);
    // Route untuk ke [trashed projek] > end
    
    // Route untuk ke [trashed vendor] > start
    Route::get('/admin/vendor/deleted', [RestoreVendorController::class, 'index']);
    Route::put('/admin/vendor/{id}/restore', [RestoreVendorController::class, 'restoreVendor']);
    Route::put('/admin/vendor/{id}/permanent-delete', [RestoreVendorController::class, 'forceDestroyVendor']);
    // Route untuk ke [trashed vendor] > end

    // RESTful route only accessible to Admin > start
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('/user', UserController::class);
        Route::resource('/projek', ProjectController::class);
        Route::resource('/vendor', VendorController::class);
        Route::resource('/log', LogActivityController::class);
    });
    // RESTful route only accessible to Admin > end

    Route::post('/admin/log/delete', [LogActivityController::class, 'destroyAll']);

    // Route untuk edit [user, vendor] status > start
    Route::put('/admin/user/{user}/status', [UserController::class, 'updateStatus']);
    Route::put('/admin/vendor/{vendor}/status', [VendorController::class, 'updateStatus']);
    // Route untuk edit [user, vendor] status > end

    // Route untuk tambah collaborator/editor untuk projek > start
    Route::get('/admin/projek/{projek}/editor', [ProjectEditorController::class, 'index']);
    Route::get('/admin/projek/{projek}/editor/store', [ProjectEditorController::class, 'store']);
    Route::get('/admin/projek/{projek}/editor/read', [ProjectEditorController::class, 'read']);
    Route::get('/admin/projek/{projek}/editor/search', [ProjectEditorController::class, 'search']);
    Route::get('/admin/projek/{projek}/editor/{user_projek}/update-status', [ProjectEditorController::class, 'updateStatus']);
    Route::get('/admin/projek/{projek}/editor/{user_projek}/delete', [ProjectEditorController::class, 'destroy']);
    // Route untuk tambah collaborator/editor untuk projek > start

});


// Route::group(['middleware' => ['auth', 'isAdmin']], function () {
//     // Admin Home Page 
    // Route::get('/admin', function () { return view('admin.index'); })->name('admin');

//     // RESTful route only accessible to Admin > start
//     Route::resource('/admin/user', UserController::class);
//     // Route::resource('/admin/projek', ProjectController::class);
//     Route::resource('/admin/vendor', VendorController::class);
//     // RESTful route only accessible to Admin > end

//     // Route untuk edit [user, vendor] status > start
//     Route::put('/admin/user/{user}/status', [UserController::class, 'updateStatus']);
//     Route::put('/admin/vendor/{vendor}/status', [VendorController::class, 'updateStatus']);
//     // Route untuk edit [user, vendor] status > end

//     // Route untuk tambah collaborator/editor untuk projek > start
//     Route::get('/admin/projek/{projek}/editor', [ProjectEditorController::class, 'index']);
//     Route::get('/admin/projek/{projek}/editor/store', [ProjectEditorController::class, 'store']);
//     Route::get('/admin/projek/{projek}/editor/read', [ProjectEditorController::class, 'read']);
//     Route::get('/admin/projek/{projek}/editor/search', [ProjectEditorController::class, 'search']);
//     Route::get('/admin/projek/{projek}/editor/{user_projek}/update-status', [ProjectEditorController::class, 'updateStatus']);
//     Route::get('/admin/projek/{projek}/editor/{user_projek}/delete', [ProjectEditorController::class, 'destroy']);
//     // Route untuk tambah collaborator/editor untuk projek > start
// });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__.'/auth.php';

//------------------------------------------------------------
