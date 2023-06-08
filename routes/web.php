<?php

use App\Http\Controllers\ActivitysController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryDonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\FormalertController;
use App\Http\Controllers\AgendaformationController;
use App\Http\Controllers\RecrutementController;
use App\Http\Controllers\WebiteController;
use App\Http\Controllers\BibliothequepayantController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\CategoryActualiteController;
use App\Http\Controllers\DescriptionactiviteController;
use App\Http\Controllers\OffredemploiController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CourCategoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

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

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::get('bibliotheque/gratuit',[WebiteController::class, 'livregratuit'])->name('bibliotheque');
Route::get('download/{bibliotheque:slug}',[WebiteController::class, 'downloadBook'])->name('download');
Route::get('search',[WebiteController::class,'searchDocument'])->name('searchDocument');
Route::get('search/docpayant',[WebiteController::class,'searchDocumentPayant'])->name('searchDocumentPayant');
Route::get('bibliotheque/payant',[WebiteController::class,'livrepayant'])->name('categoriebiblio');
Route::post('contact',[ContactController::class, 'store'])->name('contact');
Route::post('newslatter', [NewsletterController::class,'store'])->name('newslatter');
Route::post('don/store',[DonController::class, 'store'])->name('don.store');
Route::get('search/activity',[ActiviteController::class,'searchActivity'])->name('searchActivity');
Route::get('search/actulite',[ActualiteController::class,'searchActualite'])->name('searchActualite');
Route::get('agenda/search', [AgendaformationController::class, 'agendaSearch'])->name('agendaSearch');
Route::group(['middleware' => ['auth','unlock','isadmin']], function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('categorydon',CategoryDonController::class);
    Route::resource('book',BookController::class);
    Route::resource('activity',ActivitysController::class);
    Route::resource('formation', FormationController::class);
    Route::post('formation/inscription/{formation}',[FormationController::class,'agendaInscrit'])->name('formation.inscription');
    Route::get('participant/{formation:slug}',[FormationController::class,'participant'])->name('participant');
    Route::get('pass/{participant}',[FormationController::class,'pass'])->name('pass');
    Route::resource('new',NewsController::class);
    Route::resource('user',UserController::class);
    Route::get('message',[ContactController::class,'index'])->name('message');
    Route::get('message/show/{message}',[ContactController::class,'show'])->name('message.show');
    Route::delete('message/delete/{message}',[ContactController::class,'destroy'])->name('message.destroy');
    Route::get('newslatter/email',[NewsletterController::class, 'index'])->name('email');
    Route::get('alert/index',[FormalertController::class,'index'])->name('alert.index');
    Route::get('alert/show/{alerte}',[FormalertController::class,'show'])->name('alert.show');
    Route::get('don/recus',[DonController::class, 'index'])->name('don.index');
    //Route::get('don/recu',[DonController::class, 'create'])->name('don.recu');
    Route::get('don/update/{don}',[DonController::class, 'update'])->name('don.update');
    Route::resource('recrutement',RecrutementController::class);
    Route::put('recrutement/close/{recrutement}',[RecrutementController::class, 'close'])->name('recrutement.close');
    Route::get('benevolat',[RecrutementController::class, 'benevolat'])->name('benevolat');
    Route::resource('categoriactualite',CategoryActualiteController::class);
    Route::resource('courscategory',CourCategoryController::class);
    Route::get('achat/{book:slug}',[BookController::class,'achat'])->name('achat');
});

Route::post('emploie/{recrutement}', [CandidatureController::class, 'postuler'])->name('candidature');
Route::post('volontaire/{recrutement}', [CandidatureController::class, 'volontariat'])->name('volontaire');

Route::get('/', function () {
    return view('home.index');
});

Route::get('/bibliothèque-gratuite', function () {
    return view('home.bibliothèque.gratuite');
});


Route::get('/activite', [ActiviteController::class, 'activite'])->name('activite');
Route::get('/descriptionactivite/{activite:slug}', [ActiviteController::class, 'descriptionactivite'])->name('descriptionactivite');
Route::get('/actualite', [ActualiteController::class, 'actualite'])->name('actualite');
Route::get('/descriptionactualite/{actualite:slug}', [ActualiteController::class, 'descriptionactualite'])->name('descriptionactualite');
Route::get('/alert', [FormalertController::class, 'alert'])->name('alert');
Route::post('/alert/store', [FormalertController::class, 'store'])->name('alert.store');

Route::get('/agenda', [AgendaformationController::class, 'agenda'])->name('agenda');
Route::get('/descriptionagenda/{agenda:slug}', [AgendaformationController::class, 'descriptionagenda'])->name('descriptionagenda');
//Route::get('/bibliothequepayant', [BibliothequepayantController::class, 'bibliothequepayant']);

Route::get('/offredemploi', [OffredemploiController::class, 'offredemploi'])->name('offredemploi');
Route::get('/formdemploi/{emploie:slug}', [OffredemploiController::class, 'formdemploi'])->name('formdemploi');
Route::get('/formvolontaire/{emploie:slug}', [OffredemploiController::class, 'formvolontaire'])->name('formvolontaire');
Route::get('/volontariat', [OffredemploiController::class, 'volontariat'])->name('volontariat');
Route::get('/offre', [OffredemploiController::class, 'offre'])->name('offre');
Route::get('/formagenda/{formation:slug}', [AgendaformationController::class, 'formagenda'])->name('formagenda');
Route::get('/partenairelocaux', [PartenaireController::class, 'partenairelocaux'])->name('partenairelocaux');
Route::get('/partenaireinternationaux', [PartenaireController::class, 'partenaireinternationaux'])->name('partenaireinternationaux');
Route::get('/descriptionoffre/{recrutement:slug}', [OffredemploiController::class, 'descriptionoffre'])->name('descriptionoffre');
//Route::get('/descriptionactivite', [DescriptionactiviteController::class, 'descriptionactivite']);
Route::get('/offre', [OffredemploiController::class, 'offre'])->name('offre');
Route::get('/partenairelocaux', [PartenaireController::class, 'partenairelocaux'])->name('partenairelocaux');
Route::get('/partenaireinternationaux', [PartenaireController::class, 'partenaireinternationaux'])->name('partenaireinternationaux');

Route::group(['middleware'=>['auth']],function(){
    Route::get('book_transaction/{book:slug}',[WebiteController::class, 'bookTransaction'])->name('bookTransaction');
    Route::post('courtransaction/{cour:slug}', [CourseController::class,'courTransaction'])->name('courtransaction');

});
require __DIR__.'/auth.php';
require __DIR__.'/cours.php';