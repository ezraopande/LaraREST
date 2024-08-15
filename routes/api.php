<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\v1\InvoiceController;
use App\Http\Controllers\api\v1\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//test api
Route::get('/', function (Request $request) {
    return response()->json([
        'msg' => "بِسْمِ اللَّـهِ الرَّحْمَـٰنِ الرَّحِيمِ"
    ]);
});

//v1 routes

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);

    Route::post("invoices/bulk", [InvoiceController::class, 'bulkStore']);
});


Route::post('login', function (Request $request) {

    $email = $request->all('email')['email'];
    $password = $request->all('password')['password'];

    if (Auth::attempt(['email' => $email, 'password' => $password])) {

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $adminToken = $user->createToken('admin-token', ['*'], now()->addHour())->plainTextToken;
        $userToken = $user->createToken('user-token', ['create', 'update'], now()->addHour())->plainTextToken;
        $guestToken = $user->createToken('guest-token', [], now()->addHour())->plainTextToken;

        return response()->json([
            'adminToken' => $adminToken,
            'userToken' => $userToken,
            'guestToken' => $guestToken,
        ]);
    }
    return response()->json(['message' => 'Invalid credentials.'], Response::HTTP_UNAUTHORIZED);
});

Route::post('signup', function (Request $request) {


    $email = $request->all('email')['email'];
    $name = $request->all('name')['name'];
    $password = $request->all('password')['password'];


    // dd([
    //     'email' => $email,
    //     'name' => $name,
    //     'password' => $password
    // ]);

    $user = new App\Models\User();

    $user->name = $name;
    $user->email = $email;
    $user->password = Hash::make($password);

    $user->save();


    return $user;
});