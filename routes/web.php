<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioImageController;
use App\Http\Controllers\Admin\PersonalInformationController;


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


Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/', function () {
    return view('layouts.admin');
})->name('admin.home');

Route::get('personal-information', [PersonalInformationController::class, 'create'])->name('personal-information.create');
Route::post('personal-information', [PersonalInformationController::class, 'store']);

Route::get('/education/list', [EducationController::class, 'index'])->name('education-list');
Route::get('/education/create', [EducationController::class, 'create'])->name('education-create');
Route::post('/education/create', [EducationController::class, 'store']);
Route::get('/education/edit/{id}', [EducationController::class, 'edit'])->name('education-edit')->whereNumber('id');
Route::post('/education/edit/{id}', [EducationController::class, 'update'])->whereNumber('id');
Route::delete('/education/delete', [EducationController::class, 'delete'])->name('education-delete');
Route::patch('/education/change-status', [EducationController::class, 'changeStatus'])->name('education.change-status');

Route::get('experiences', [ExperienceController::class, 'index'])->name('experience.index');
Route::get('experiences/create', [ExperienceController::class, 'create'])->name('experience-create');
Route::post('experiences/create', [ExperienceController::class, 'store']);
Route::get('experiences/edit/{id}', [ExperienceController::class, 'edit'])->name('experience.edit')->whereNumber('id');
Route::post('experiences/edit/{id}', [ExperienceController::class, 'update'])->whereNumber('id');
Route::delete('experiences/delete', [ExperienceController::class, 'delete'])->name('experience.delete');
Route::patch('experiences/change-status', [ExperienceController::class, 'changeStatus'])->name('experiences.change-status');

Route::get('services', [ServiceController::class, 'index'])->name('service.index');
Route::get('services/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('services/create', [ServiceController::class, 'store']);
Route::get('services/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit')->whereNumber('id');
Route::post('services/edit/{id}', [ServiceController::class, 'update'])->whereNumber('id');
Route::delete('services/delete', [ServiceController::class, 'delete'])->name('service.delete');
Route::patch('services/change-status', [ServiceController::class, 'changeStatus'])->name('service.change-status');

Route::get('social-media', [SocialMediaController::class, 'index'])->name('social-media.index');
Route::get('social-media/create', [SocialMediaController::class, 'create'])->name('social-media.create');
Route::post('social-media/create', [SocialMediaController::class, 'store']);
Route::get('social-media/edit/{id}', [SocialMediaController::class, 'edit'])->name('social-media.edit')->whereNumber('id');
Route::post('social-media/edit/{id}', [SocialMediaController::class, 'update'])->whereNumber('id');
Route::delete('social-media/delete', [SocialMediaController::class, 'delete'])->name('social-media.delete');
Route::patch('social-media/change-status', [SocialMediaController::class, 'changeStatus'])->name('social-media.change-status');

Route::get('portfolios', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('portfolios/create', [PortfolioController::class, 'create'])->name('portfolio.create');
Route::post('portfolios/create', [PortfolioController::class, 'store']);
Route::get('portfolios/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit')->whereNumber('id');
Route::post('portfolios/edit/{id}', [PortfolioController::class, 'update'])->whereNumber('id');
Route::delete('portfolios/delete', [PortfolioController::class, 'delete'])->name('portfolio.delete');
Route::patch('portfolios/change-status', [PortfolioController::class, 'changeStatus'])->name('portfolio.change-status');

Route::get('portfolio-images', [PortfolioImageController::class, 'index'])->name('portfolio-image.index');
Route::get('portfolio-images/create', [PortfolioImageController::class, 'create'])->name('portfolio-image.create');
Route::post('portfolio-images/create', [PortfolioImageController::class, 'store']);
Route::get('portfolio-images/edit/{id}', [PortfolioImageController::class, 'edit'])->name('portfolio-image.edit')->whereNumber('id');
Route::post('portfolio-images/edit/{id}', [PortfolioImageController::class, 'update'])->whereNumber('id');
Route::delete('portfolio-images/delete', [PortfolioImageController::class, 'delete'])->name('portfolio-image.delete');
Route::patch('portfolio-images/change-status', [PortfolioImageController::class, 'changeStatus'])->name('portfolio-image.change-status');
Route::patch('portfolio-images/change-feature-status', [PortfolioImageController::class, 'changeFeatureStatus'])->name('portfolio-image.change-feature-status');

