<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

// Category Routes
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');          
    Route::post('/', 'createCategory');         
    Route::get('/{categoryId}', 'getCategory');   
    Route::patch('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory'); 
});

// Product Routes
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'getProducts');           
    Route::post('/', 'createProduct');           
    Route::get('/{productId}', 'getProduct');    
    Route::patch('/{productId}', 'updateProduct'); 
    Route::delete('/{productId}', 'deleteProduct');
});


Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($request->only('email','password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();

    $tokenResult = $user->createToken('mobile');

    return response()->json([
        'token' => $tokenResult->plainTextToken ?? $tokenResult->accessToken,
        'user' => $user->load('roles')
    ]);
});



Route::middleware('auth:api')->group(function () {
    Route::get('/me', fn(Request $r) => $r->user()->load('roles'));

    Route::post('/products', function (Request $request) {
        abort_unless($request->user()->can('products.create'), 403);

        return response()->json(['message' => 'Product created']);
    });

  
    Route::patch('/categories/{category}/status', function (\App\Models\Category $category, Request $request) {
        $this->authorize('updateStatus', $category);
        $category->status = $request->status;
        $category->save();
        return response()->json(['message' => 'Category status updated']);
    });
});
