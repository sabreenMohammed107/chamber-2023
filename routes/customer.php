
<?php

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| 
|   \Customer
*/
Auth::routes();
Route::namespace('Customer')->group(function () {
  /*-----------------------index-------------------*/
  Route::get('/', 'IndexController@index');
  Route::get('/search', 'IndexController@search')->name('search');
  Route::post('/sendNewsLetter', 'IndexController@sendNewsLetter');
  /*----------------------News---------------------------*/
   Route::get('/news', 'NewsController@index');
   Route::get('/newsDetails/{id}', 'NewsController@newsDetails')->name('newsDetails');
   Route::get('fetch_data', 'NewsController@fetch_data');
   Route::get('fetch_news', 'NewsController@fetch_news');
    /*----------------------Announce---------------------------*/
    Route::get('/announce', 'AnnounceController@index');
    Route::get('/announceDetails/{id}', 'AnnounceController@announceDetails')->name('announceDetails');
    Route::get('fetch_announce', 'AnnounceController@fetch_announce');
    Route::get('fetch_announceDetails', 'AnnounceController@fetch_announceDetails');
    /*-----------------------------Conferance---------------------------------------*/
    Route::get('/conference', 'ConferenceController@index');
    Route::get('fetch_conference', 'ConferenceController@fetch_conference');
    Route::get('/searchForm', 'ConferenceController@searchForm')->name('searchForm');
    Route::get('/conferenceDetails/{id}', 'ConferenceController@conferenceDetails')->name('conferenceDetails');
    Route::get('fetch_conferenceDetails', 'ConferenceController@fetch_conferenceDetails');
    /*--------------------------Contact-------------------------*/
    Route::get('/contact', 'ContactController@index');
    Route::post('/sendMessage', 'ContactController@sendMessage')->name('sendMessage');
     /*--------------------------Album-------------------------*/
     Route::get('/album', 'AlbumController@index');
     Route::get('fetch_album', 'AlbumController@fetch_album');
     /*----------------------------Board-------------------------------*/
     Route::get('/board', 'BoardController@index');
     Route::get('boardPeople/{id}', 'BoardController@boardPeople')->name('boardPeople');
      /*----------------------------socialres-------------------------------*/
      Route::get('/socialres', 'SocialresController@index');
      Route::get('fetch_socialres', 'SocialresController@fetch_socialres');
      Route::get('/socialresDetails/{id}', 'SocialresController@socialresDetails')->name('socialresDetails');
    /*----------------------------devision-------------------------------*/
    Route::get('/devision', 'DivisionController@index');
    Route::get('fetch_devision', 'DivisionController@fetch_devision');
    Route::get('/devisionDetails/{id}', 'DivisionController@devisionDetails')->name('devisionDetails');
    Route::post('/registerDevision', 'DivisionController@registerDevision')->name('registerDevision');
    Route::get('fetch_meetingdevision', 'DivisionController@fetch_meetingdevision');
    Route::get('/newsDivisionDetails/{id}', 'DivisionController@newsDivisionDetails')->name('newsDivisionDetails');
    Route::get('/meetingDivisionDetails/{id}', 'DivisionController@meetingDivisionDetails')->name('meetingDivisionDetails');
    Route::get('fetch_newsDetailsDeivsion', 'DivisionController@fetch_newsDetailsDeivsion');
    Route::get('people/{id}', 'DivisionController@people')->name('people');
     /*----------------------------schedule-------------------------------*/
     Route::get('/schedule', 'ScheduleController@index');
     Route::get('fetch_categorySchedule', 'ScheduleController@fetch_categorySchedule');
      /*----------------------------Aricale-------------------------------*/
         Route::get('/article/{id}', 'ArticlesController@article')->name('article');
         Route::get('/chance/{id}', 'ArticlesController@chance')->name('chance');


          /*----------------------Activity---------------------------*/
   Route::get('/activity', 'ActivityController@index');
   Route::get('/activityDetails/{id}', 'ActivityController@newsDetails')->name('activityDetails');
   Route::get('fetch_activitydata', 'ActivityController@fetch_data');
   Route::get('fetch_activitynews', 'ActivityController@fetch_news');

   /*--------------------------------------Academy--------------------------------------------*/
   Route::get('/academy/{id}', 'AcademyController@index')->name('academy');
   Route::get('/academytraining/{id}', 'AcademyController@training')->name('academytraining');
   Route::get('/course', 'AcademyController@course');
   Route::get('/courseRegisteration/{id}', 'AcademyController@courseDetails')->name('courseRegisteration');
   Route::post('/registerationForm', 'AcademyController@registerationForm')->name('registerationForm');

   /*-------------------------------------encyclo--------------------------------------------------*/
   Route::get('/encyclo', 'EncycloController@index');
   Route::get('/brother', 'EncycloController@brother');
   Route::get('/commerical', 'EncycloController@commerical');
   Route::get('/region', 'EncycloController@region');
   Route::get('/fetch_regions', 'EncycloController@regionDetails');
   Route::get('/organization', 'EncycloController@organization');
   Route::get('/fetch_organization', 'EncycloController@organizationDetails');
   Route::get('/laws', 'EncycloController@laws');
   Route::get('/fetch_laws', 'EncycloController@lawsDetails');
   Route::get('/embassy', 'EncycloController@embassy');
   Route::get('/fetch_embassy', 'EncycloController@embassyDetails');
   Route::get('/communication', 'EncycloController@communication');
   Route::get('/expencyclopedia', 'EncycloController@expencyclopedia');
   Route::get('/fetch_expencyclopedia', 'EncycloController@encyclopediaDetails');
   Route::get('/studies', 'EncycloController@studies');
   Route::get('/fetch_studies', 'EncycloController@studiesDetails');
   Route::get('/ministry', 'EncycloController@ministry');
   Route::get('/fetch_ministry', 'EncycloController@ministryDetails');
   Route::get('/topics', 'EncycloController@topics');
   Route::get('/fetch_topics', 'EncycloController@topicsDetails');
    /*--------------------------------------Sections--------------------------------------------*/
    Route::get('/section', 'SectionController@index')->name('section');
    Route::get('/sectionDetails/{id}', 'SectionController@details')->name('sectionDetails');
    /*-------------------------------------Static Pages--------------------------------------------------*/
    Route::get('/aboutDirector','AboutStaticController@aboutDirector')->name('aboutDirector');
    Route::get('/history','AboutStaticController@history')->name('history');
    Route::get('/messageVision','AboutStaticController@messageVision')->name('messageVision');
    Route::get('/online-payment','AboutStaticController@onlinePayment')->name('online-payment');
    Route::get('/qr-code','AboutStaticController@qrCode')->name('qr-code');
    Route::get('/blockchain','AboutStaticController@blockchain')->name('blockchain');
    Route::get('/chahbander','AboutStaticController@chahbander')->name('chahbander');
 
    //  Change Lang..
Route::get('changeLang/{lang}', function($lang){

	\Session::put('locale', $lang);

	return redirect()->back();

});

});

