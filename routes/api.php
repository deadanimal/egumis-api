<?php

use App\Http\Controllers\AppAnnouncementController;
use App\Http\Controllers\AppClaimDocumentController;
use App\Http\Controllers\AppEmailTemplateController;
use App\Http\Controllers\AppFaqDetailController;
use App\Http\Controllers\AppFaqHeaderController;
use App\Http\Controllers\AppRfdBoController;
use App\Http\Controllers\AppRfdDocController;
use App\Http\Controllers\AppRfdInfoController;
use App\Http\Controllers\AppRfdJointController;
use App\Http\Controllers\AppRfdPayeeController;
use App\Http\Controllers\AppRfdSearchTrxController;
use App\Http\Controllers\AppRfdStatusController;
use App\Http\Controllers\AppSystemConfigController;
use App\Http\Controllers\AppWtdTypeClaimDocumentController;
use App\Http\Controllers\AuditLogMaController;
use App\Http\Controllers\MaLangController;
use App\Http\Controllers\RefBoJointController;
use App\Http\Controllers\RefBoMasterController;
use App\Http\Controllers\RefExpressClaimAmountController;
use App\Http\Controllers\RefExpressWtdTypeController;
use App\Http\Controllers\RefFilenameSeqController;
use App\Http\Controllers\RefIddFilenameSeqController;
use App\Http\Controllers\RefPostcodeRuleController;
use App\Http\Controllers\RefRegionController;
use App\Http\Controllers\RefUserCodeDetailController;
use App\Http\Controllers\RefUsercodeHeaderController;
use App\Http\Controllers\SecAuditLogController;
use App\Http\Controllers\SecAuditTrailController;
use App\Http\Controllers\SecAuditTrxController;
use App\Http\Controllers\SecRoleController;
use App\Http\Controllers\SecUserController;
use App\Http\Controllers\SecUserRoleController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/demoEmail', [SecUserController::class, 'sendEmail']);
Route::get('/test', [SecUserController::class, 'test']);
Route::get('/adminResetPassword/{username}', [SecUserController::class, 'adminResetPass']);

Route::apiResources([
    // Maklumat pengguna sistem
    '/sec-user' => SecUserController::class,

    // Maklumat permohonan tuntutan WTD
    '/app-rfd-info' => AppRfdInfoController::class,

    // Maklumat jejak audit
    '/sec-audit-log' => SecAuditLogController::class,

    // Maklumat jejak audit
    '/sec-audit-trail' => SecAuditTrailController::class,

    // Maklumat penerima WTD
    '/app-rfd-payee' => AppRfdPayeeController::class,

    // Maklumat dokumen dimuat naik
    '/app-rfd-doc' => AppRfdDocController::class,

    // Maklumat transaksi bayaran balik tuntutan
    '/app-rfd-search-trx' => AppRfdSearchTrxController::class,

    //Claim application BO joint information./Maklumat WTD akaun bersama yang dipilih disalin daripada table REF_BO_JOINT
    '/app-rfd-join' => AppRfdJointController::class,

    // Maklumat status permohonan tuntutan
    '/app-rfd-status' => AppRfdStatusController::class,

    //Single Table (didnt have any links to any other tables)

    //Maklumat Pengumuman
    '/app-announcement' => AppAnnouncementController::class,

    // Maklumat tajuk soalan lazim
    '/app-faq-header' => AppFaqHeaderController::class,

    // Maklumat kandungan soalan lazim
    '/app-faq-detail' => AppFaqDetailController::class,

    // System user code details reference data.
    '/ref-user-code-detail' => RefUserCodeDetailController::class,

    // Region reference data
    '/ref-region' => RefRegionController::class,

    // Maklumat nombor turutan bagi file locking mechanism
    '/ref-filename-sec' => RefFilenameSeqController::class,

    // IDD Filename sequence number.
    '/ref-idd-filename-seq' => RefIddFilenameSeqController::class,

    // Maklumat data rujukan peraturan poskod
    '/ref-postcode-rule' => RefPostcodeRuleController::class,

    // Maklumat dokumen dimuat naik kategori  WTD
    '/app-wtd-type-claim-document' => AppWtdTypeClaimDocumentController::class,

    // Maklumat semua dokumen yang dimuat naik
    '/app-claim-document' => AppClaimDocumentController::class,

    '/app-rfd-bo' => AppRfdboController::class,

    '/sec-role' => SecRoleController::class,

    '/sec-audit-trx' => SecAuditTrxController::class,

    '/sec-user-role' => SecUserRoleController::class,

    '/ref-usercode-header' => RefUsercodeHeaderController::class,

    '/audit-log-ma' => AuditLogMaController::class, //local

    '/ma-lang' => MaLangController::class, //local

    '/app-system-config' => AppSystemConfigController::class,

    '/app-email-template' => AppEmailTemplateController::class,

    '/ref-bo-joint' => RefBoJointController::class, //prob all

    '/ref-bo-master' => RefBoMasterController::class, // prob all

    '/ref-express-wtd-type' => RefExpressWtdTypeController::class,

    '/ref-express-claim-amount' => RefExpressClaimAmountController::class,

]);

//login user
Route::post('/login', [SecUserController::class, 'login']);

//forgot password user
Route::post('/forgot-pass', [SecUserController::class, 'ForgotPass']);

//forgot password user
Route::post('/change-pass/{user}', [SecUserController::class, 'ChangePassword']);

// Carian Permohonan
Route::post('/search-permohonan', [AppRfdInfoController::class, 'search']);

//Carian Wang Tak Dituntut
Route::post('/search-wtd', [RefBoMasterController::class, 'searchByIc']);

Route::post('/search-rfdInfo-by-userId', [AppRfdInfoController::class, 'searchByUserId']);

Route::post('/search-rfdBo-by-refundInfoId', [AppRfdBoController::class, 'searchByRefundInfoId']);

Route::post('/post-list-rfdInfo-rfdPayee', [AppRfdInfoController::class, 'listRfdinfoRfdPayee']);

Route::post('/update-4-table', [AppRfdPayeeController::class, 'updateTable']);

Route::post('/search-rfd-bo', [AppRfdBoController::class, 'searchByBo']);

Route::post('/create-many-info', [AppRfdInfoController::class, 'createManyInfo']);

Route::post('/create-many-payee', [AppRfdPayeeController::class, 'createManyPayee']);

Route::post('/create-many-bo', [AppRfdBoController::class, 'createManyBo']);

Route::post('/craete-many-doc', [AppRfdDocController::class, 'craeteManyDoc']);

Route::post('/semakan-wtd', [RefBoMasterController::class, 'semakanWtd']);

Route::get('/status-by-info-id/{id}', [AppRfdInfoController::class, 'statusByInfoId']);
