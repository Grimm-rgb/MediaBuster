<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use App\Livewire\Pages\AboutUs;
use App\Livewire\Pages\Gallery;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\MessageList;
use App\Livewire\Pages\ShowMessage;
use App\Livewire\Pages\ThreadList;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

 //routes pages

Route::get('threads', ThreadList::class)->name('threads');
Route::get('thread/{threadId}', MessageList::class)->name('thread.messagelist');
Route::get('message/{messageId}', ShowMessage::class)->name('show.message');
Route::get('/', Home::class)->name('home');
Route::get('about', AboutUs::class)->name('about');
Route::get('gallery', Gallery::class)->name('gallery');


 //routes admin
Route::middleware(['auth', 'admin'])->prefix('back')->name('back.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name("dashboard");

    Route::get('users', [UserController::class, 'list'])->name("user.list");
    Route::get('user/form/{id?}', [UserController::class, 'form'])->name('user.form')->where('id', '[0-9]+');
    Route::post('user/form/{id?}', [UserController::class, 'save'])->name('user.save')->where('id', '[0-9]+');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('threads', [ThreadController::class, 'list'])->name("thread.list");
    Route::get('thread/form/{id?}', [ThreadController::class, 'form'])->name('thread.form')->where('id', '[0-9]+');
    Route::post('thread/form/{id?}', [ThreadController::class, 'save'])->name('thread.save')->where('id', '[0-9]+');
    Route::delete('thread/{id}', [ThreadController::class, 'destroy'])->name('thread.destroy');

    Route::get('messages', [MessageController::class, 'list'])->name("message.list");
    Route::get('message/form/{id?}', [MessageController::class, 'form'])->name('message.form')->where('id', '[0-9]+');
    Route::post('message/form/{id?}', [MessageController::class, 'save'])->name('message.save')->where('id', '[0-9]+');
    Route::delete('message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');

    Route::get('comments', [CommentController::class, 'list'])->name("comment.list");
    Route::get('comment/form/{id?}', [CommentController::class, 'form'])->name('comment.form')->where('id', '[0-9]+');
    Route::post('comment/form/{id?}', [CommentController::class, 'save'])->name('comment.save')->where('id', '[0-9]+');
    Route::delete('comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('answers', [AnswerController::class, 'list'])->name("answer.list");
    Route::get('answer/form/{id?}', [AnswerController::class, 'form'])->name('answer.form')->where('id', '[0-9]+');
    Route::post('answer/form/{id?}', [AnswerController::class, 'save'])->name('answer.save')->where('id', '[0-9]+');
    Route::delete('answer/{id}', [AnswerController::class, 'destroy'])->name('answer.destroy');
});



Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
