<?php

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

Route::prefix('admin/dashboard')->group(function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    // Password reset routes
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});
Route::redirect('/home', '/manage/dashboard');
Route::redirect('/manage', '/manage/dashboard');
Route::prefix('manage')->middleware('role:superadministrator|administrator|user')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    //carousel
    Route::resource('carousel', 'CarouselController');
    Route::get('carousel/{id}/publish', 'CarouselController@publish')->name('carousel.publish');
    Route::get('carousel/{id}/unpublish', 'CarouselController@unpublish')->name('carousel.unpublish');

    //Page category
    Route::resource('page-category', 'PageCategoryController');
    //Pages
    Route::resource('pages', 'PagesController');
    Route::get('page/{id}/publish','PagesController@publish')->name('page.publish');
    Route::get('page/{id}/unpublish','PagesController@unpublish')->name('page.unpublish');

    //Tour
    Route::resource('tour', 'TourController');
    Route::get('featured/tour','TourController@featuredTours')->name('featureds');
    Route::get('tour/{id}/publish','TourController@publish')->name('tour.publish');
    Route::get('tour/{id}/unpublish','TourController@unpublish')->name('tour.unpublish');
    Route::get('{id}/featured',  'TourController@setAsfeatured')->name('feature.tour');
    Route::get('{id}/removefeatured', 'TourController@removeAsfeatured')->name('remove.feature');
    Route::resource('tour-category', 'TourCategoryController');
    Route::resource('meals', 'MealController');
    Route::resource('group', 'GroupController');
    Route::resource('difficulty', 'DifficultyController');
    Route::resource('accommodation', 'AccommodationController');
    Route::resource('locations', 'LocationController');
    Route::resource('country', 'CountryController');
    Route::resource('regions', 'RegionController');
    Route::resource('includes', 'IncludedController');
    Route::resource('excludes', 'ExcludedController');
    Route::get('tour/{id}/itineraries', 'ItineraryController@create')->name('itinerary-create');
    Route::post('tour/create/itinerary-store', 'ItineraryController@save')->name('itinerary-store');
    Route::post('itinerary/itinerary-destroy/{itinerary}', 'ItineraryController@destroy')->name('itinerary-destroy');
    Route::post('itinerary-edit', 'ItineraryController@update')->name('itinerary-edit');

    Route::resource('reviews','ReviewController',['except'=>['create','show']]);
    Route::get('review/{id}/approve','ReviewController@approve')
    ->name('approve');
    Route::get('reviews/unapproved','ReviewController@unapproved')
    ->name('unapproved');

    //Media
    Route::resource('media', 'MediaController');
    Route::resource('partner', 'PartnerController');
    Route::resource('offers', 'OfferController');
    //Contact Setting
    Route::resource('setting','ContactDetailController');
    //Section Controller
    Route::resource('section-control','SectionControlController');
    Route::get('section-control/{id}/publish','PagesController@publish')->name('section-control.publish');
    Route::get('section-control/{id}/unpublish','PagesController@unpublish')->name('section-control.unpublish');
    Route::resource('team','TeamController');
//    Route::get('team/{id}/publish','TeamController@publish')->name('team.publish');
//    Route::get('team/{id}/unpublish','TeamController@unpublish')->name('team.unpublish');

    //Departure
    Route::resource('departure','DepartureController');
    Route::resource('trip-of-the-month','MonthTripController')->only(['index', 'store' ,'destroy' ]);

});
Route::name('frontend-')->group(function () {
    Route::pattern('category', '[A-Za-z\d\-\_]+');
    Route::pattern('slug','[A-Za-z\d\-\_]+');
    Route::get('/','GetFrontendController@getIndex');
    Route::get('/package/{slug}', 'GetFrontendController@tourDetail')->name('tourDetail');
    Route::get('fetch-departures','GetFrontendController@ajaxsearchdeparture')->name('departure');
    Route::resource('reviews','ReviewController',['only'=>['store']]);
    Route::get('/contact-us','GetFrontendController@getContact')->name('contact');
    Route::post('/contact-us','PostFrontendController@postContact')->name('postContact');
    Route::post('/inquiry','PostFrontendController@postInquiry')->name('postInquiry');
    Route::get('/{pcatslug}/{pslug}','GetFrontendController@getPage')->name('page');
    Route::get('/book/package/step-1/{slug}','GetFrontendController@bookStep1')->name('bookStep1');
    Route::post('/book/package/step-2/{slug}','GetFrontendController@bookStep2')->name('bookStep2');
    Route::post('/book/package/step-3/{slug}','PostFrontendController@postBooking')->name('bookStep3');
    
    Route::get('/join-group/{slug}/step-1','GetFrontendController@joinStep1')->name('joinStep1');
    Route::post('/join-group/{slug}/step-2','GetFrontendController@joinStep2')->name('joinStep2');   
    Route::post('/join-group/{slug}/step-3','PostFrontendController@postJoin')->name('joinStep3');
    Route::get('/our-team', 'GetFrontendController@team');
    Route::get('/about', 'GetFrontendController@templateAbout');
    Route::get('/fetch-insta', 'GetFrontendController@Instagram');
});
