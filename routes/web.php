<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//fontend
Route::get('/', [Controller::class, 'welcome'])->name('welcome');
Route::get('/welcome/problem', [Controller::class, 'problem'])->name('problem');
Route::get('/Login', [Controller::class, 'Login'])->name('Login');

//backend
Route::post('/checklogin', [Controller::class, 'checklogin'])->name('checklogin');
Route::get('/backend', [Controller::class, 'Index'])->name('index');
Route::get('/Computer', [Controller::class, 'Computer'])->name('computer');
Route::get('/ITSupport', [Controller::class, 'ITSupport'])->name('itsupport');
Route::get('/Report', [Controller::class, 'Report'])->name('report');
Route::get('/show/machine', [Controller::class, 'showmachine'])->name('showmac');
Route::get('/show/data_list', [Controller::class,'datalist'])->name('datalist');
Route::post('/show/equip', [Controller::class, 'showequip'])->name('showequip');
Route::post('/select/data', [Controller::class, 'equipment'])->name('equipment');
Route::post('/select/section', [Controller::class, 'showsectionlist'])->name('showsectionlist');
Route::post('/select/brand', [Controller::class,'listbrand'])->name('listbrand');
Route::get('/list/PQ', [Controller::class, 'listPQ'])->name('listPQ');
Route::get('/list/caseitsupport', [Controller::class, 'caseitsupport'])->name('caseitsupport');
Route::get('/report/categorry/list', [Controller::class, 'reportlistcate'])->name('reportlistcate');
Route::post('/report/equipment/list', [Controller::class, 'reportlistequip'])->name('reportlistequip');
Route::get('/TableEdit', [Controller::class, 'showedit'])->name('showedit');
Route::post('/report/Show/listReport', [Controller::class, 'ShowReport'])->name('ShowReport');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');

//search
Route::post('/searchcate', [PostController::class, 'searchcate'])->name('searchcate');
Route::post('/searchequip', [PostController::class, 'searchequip'])->name('searchequip');
Route::post('/find/depart', [PostController::class, 'finddepart'])->name('finddepart');
Route::post('/search/depart', [PostController::class, 'seadepart'])->name('seadepart');
Route::post('/search/mebercode', [Controller::class, 'membercode'])->name('membercode');
Route::post('/search/datait', [Controller::class, 'searchdatait'])->name('searchdatait');
Route::post('/searchData/Edit', [Controller::class, 'searchdataedit'])->name('SearchDataEdit');
Route::post('/searchEdit/Category', [Controller::class, 'SearchEditCategory'])->name('SearchEditCategory');
Route::post('/searchEdit/Equipment', [Controller::class, 'SearchEquipment'])->name('SearchEquipment');

//insert
Route::post('/insert/machine', [PostController::class, 'insertmachine'])->name('insertmac');
Route::post('/insert/cate', [PostController::class, 'insertcate'])->name('insertcate');
Route::post('/insert/equip', [PostController::class, 'insertequip'])->name('insertequip');
Route::post('/insert/depart', [PostController::class, 'insertdepart'])->name('insertdepart');
Route::post('/insert/section', [PostController::class, 'insertsection'])->name('insertsection');
Route::post('/insert/brand', [PostController::class, 'addbrand'])->name('addbrand');
Route::post('/insert/CaseIT', [PostController::class, 'recordCaseIT'])->name('recordCaseIT');
Route::post('/insert/problem', [PostController::class, 'recordproblem'])->name('recordproblem');

//edit
Route::post('/show/tranfer', [EditController::class, 'edittranfer'])->name('edittranfer');
Route::post('/update/tranfer', [EditController::class, 'updatetranfer'])->name('updatetranfer');
Route::post('/update/ComHW', [EditController::class, 'editrecord'])->name('editrecord');
Route::post('/update/record/ComHW', [EditController::class, 'recordEdit'])->name('recordEdit');
Route::post('/update/record/ITsupport', [EditController::class, 'editrecordIT'])->name('editrecordIT');
Route::post('/updateEdit/Brand', [EditController::class, 'updateBrand'])->name('updateBrand');
Route::post('/updateEdit/Category', [EditController::class, 'UpdateCategory'])->name('UpdateCategory');
Route::post('/updateEdit/Equipment', [EditController::class, 'updateEquipment'])->name('updateEquipment');

//delete
Route::post('/Delete/machine', [DeleteController::class, 'Deletemachine'])->name('Deletemachine');
Route::post('/Delete/listit', [DeleteController::class, 'deletelistIT'])->name('deletelistIT');
Route::post('/Delete/brand', [DeleteController::class, 'DeleteBrand'])->name('DeleteBrand');
Route::post('/Delete/category', [DeleteController::class, 'DeleteCategory'])->name('DeleteCategory');
Route::post('/Delete/Equipment', [DeleteController::class, 'DeleteEquipment'])->name('DeleteEquipment');