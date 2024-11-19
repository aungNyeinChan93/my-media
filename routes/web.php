<?php

use App\Http\Controllers\AdminListController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;


Route::get('/', function () {
    return view('welcome');
});


// test routes
Route::any("test/{test}", function (string $test) {
    dump("$test");
})->whereAlpha("test");
Route::match(["get", 'post'], "test/{number}", function ($number) {
    dump($number);
})->whereNumber("number");
Route::get("number/{number}", function ($number) {
    dump($number);
})->whereIn('number', ["10", 20, 30]);


// Dashboard
Route::get('dashboard', function (Request $request) {
    $users = User::query()
        ->when($request->id, function ($query) use ($request) {
            $query->where("id", "=", $request->id);
        })
        ->get();
    return view('admin.profile.dashboard', compact('users'));
})->name('dashboard');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->prefix('admin')->group(function () {

    // profile
    Route::get("/profile", [ProfileController::class, "profilePage"])->name('profile');
    Route::put("/profile/update", [ProfileController::class, "profileUpdate"])->name('profile.update');
    Route::get('profile/view', [ProfileController::class, "profileView"])->name('profile.view');

    // Password Change
    Route::get("profile/passwordChange", [ProfileController::class, 'passwordChange'])->name('profile.passwordChange');
    Route::post("profile/passwordChange", [ProfileController::class, 'passwordChangeAction'])->name('profile.passwordChangeAction');

    // categories
    Route::get("categories", [CategoryController::class, 'index'])->name("categories.index");
    Route::post("categories", [CategoryController::class, 'create'])->name("categories.create");
    Route::delete("categories/{category}", [CategoryController::class, 'delete'])->name("categories.delete");
    Route::get("categories/{category}", [CategoryController::class, 'edit'])->name("categories.edit");
    Route::put("categories/{category}", [CategoryController::class, 'update'])->name("categories.update");
    Route::post("categories/search", [CategoryController::class, 'search'])->name("categories.search");

    // lists
    Route::get("lists", [ListController::class, 'index'])->name('lists.index');

    // trend posts
    Route::get("trendPosts", [TrendPostController::class, 'index'])->name("trendPosts.index");

    // AdminList
    Route::get("adminList", [AdminListController::class, 'list'])->name("adminList.list");
    Route::post("adminList", [AdminListController::class, 'genderFilter'])->name("adminList.genderFilter");
    Route::delete("adminList/delete/{user}", [AdminListController::class, 'delete'])->name("adminList.delete");

    // posts
    Route::get("posts", [PostController::class, "index"])->name("posts.index");
    Route::get("posts/create", [PostController::class, "create"])->name("posts.create");
    Route::post("posts/create", [PostController::class, "createAction"])->name("posts.createAction");
    Route::delete('posts/delete/{post}', [PostController::class, 'delete'])->name('post.delete');

});


