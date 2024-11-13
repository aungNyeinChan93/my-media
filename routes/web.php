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

    // lists
    Route::get("lists", [ListController::class, 'index'])->name('lists.index');

    // posts
    Route::get("posts", [PostController::class, "index"])->name("posts.index");

    // trend posts
    Route::get("trendPosts", [TrendPostController::class, 'index'])->name("trendPosts.index");

    // AdminList
    Route::get("adminList", [AdminListController::class, 'list'])->name("adminList.list");

});


