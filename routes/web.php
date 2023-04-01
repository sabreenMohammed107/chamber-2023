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





// Route::get('/home', 'HomeController@index')->name('home');

use App\Http\Controllers\Customer\IndexController;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'IndexController@index');
Route::get('/', [IndexController::class, 'index']);
  Route::get('/search', 'App\Http\Controllers\Customer\IndexController@search')->name('search');
  Route::post('/sendNewsLetter', 'App\Http\Controllers\Customer\IndexController@sendNewsLetter');
  /*----------------------News---------------------------*/
   Route::get('/news', 'App\Http\Controllers\Customer\NewsController@index');
   Route::get('/newsDetails/{id}', 'App\Http\Controllers\Customer\NewsController@newsDetails')->name('newsDetails');
   Route::get('fetch_data', 'App\Http\Controllers\Customer\NewsController@fetch_data');
   Route::get('fetch_news', 'App\Http\Controllers\Customer\NewsController@fetch_news');
    /*----------------------Announce---------------------------*/
    Route::get('/announce', 'App\Http\Controllers\Customer\AnnounceController@index');
    Route::get('/announceDetails/{id}', 'App\Http\Controllers\Customer\AnnounceController@announceDetails')->name('announceDetails');
    Route::get('fetch_announce', 'App\Http\Controllers\Customer\AnnounceController@fetch_announce');
    Route::get('fetch_announceDetails', 'App\Http\Controllers\Customer\AnnounceController@fetch_announceDetails');
    /*-----------------------------Conferance---------------------------------------*/
    Route::get('/conference', 'App\Http\Controllers\Customer\ConferenceController@index');
    Route::get('fetch_conference', 'App\Http\Controllers\Customer\ConferenceController@fetch_conference');
    Route::get('/searchForm', 'App\Http\Controllers\Customer\ConferenceController@searchForm')->name('searchForm');
    Route::get('/conferenceDetails/{id}', 'App\Http\Controllers\Customer\ConferenceController@conferenceDetails')->name('conferenceDetails');
    Route::get('fetch_conferenceDetails', 'App\Http\Controllers\Customer\ConferenceController@fetch_conferenceDetails');
    /*--------------------------Contact-------------------------*/
    Route::get('/contact', 'App\Http\Controllers\Customer\ContactController@index');
    Route::post('/sendMessage', 'App\Http\Controllers\Customer\ContactController@sendMessage')->name('sendMessage');
     /*--------------------------Album-------------------------*/
     Route::get('/album', 'App\Http\Controllers\Customer\AlbumController@index');
     Route::get('fetch_album', 'App\Http\Controllers\Customer\AlbumController@fetch_album');
     /*----------------------------Board-------------------------------*/
     Route::get('/board', 'App\Http\Controllers\Customer\BoardController@index');
     Route::get('boardPeople/{id}', 'App\Http\Controllers\Customer\BoardController@boardPeople')->name('boardPeople');
      /*----------------------------socialres-------------------------------*/
      Route::get('/socialres', 'App\Http\Controllers\Customer\SocialresController@index');
      Route::get('fetch_socialres', 'App\Http\Controllers\Customer\SocialresController@fetch_socialres');
      Route::get('/socialresDetails/{id}', 'App\Http\Controllers\Customer\SocialresController@socialresDetails')->name('socialresDetails');
    /*----------------------------devision-------------------------------*/
    Route::get('/devision', 'App\Http\Controllers\Customer\DivisionController@index');
    Route::get('fetch_devision', 'App\Http\Controllers\Customer\DivisionController@fetch_devision');
    Route::get('/devisionDetails/{id}', 'App\Http\Controllers\Customer\DivisionController@devisionDetails')->name('devisionDetails');
    Route::post('/registerDevision', 'App\Http\Controllers\Customer\DivisionController@registerDevision')->name('registerDevision');
    Route::get('fetch_meetingdevision', 'App\Http\Controllers\Customer\DivisionController@fetch_meetingdevision');
    Route::get('/newsDivisionDetails/{id}', 'App\Http\Controllers\Customer\DivisionController@newsDivisionDetails')->name('newsDivisionDetails');
    Route::get('/meetingDivisionDetails/{id}', 'App\Http\Controllers\Customer\DivisionController@meetingDivisionDetails')->name('meetingDivisionDetails');
    Route::get('fetch_newsDetailsDeivsion', 'App\Http\Controllers\Customer\DivisionController@fetch_newsDetailsDeivsion');
    Route::get('people/{id}', 'App\Http\Controllers\Customer\DivisionController@people')->name('people');
     /*----------------------------schedule-------------------------------*/
     Route::get('/schedule', 'App\Http\Controllers\Customer\ScheduleController@index');
     Route::get('fetch_categorySchedule', 'App\Http\Controllers\Customer\ScheduleController@fetch_categorySchedule');
      /*----------------------------Aricale-------------------------------*/
         Route::get('/article/{id}', 'App\Http\Controllers\Customer\ArticlesController@article')->name('article');
         Route::get('/chance/{id}', 'App\Http\Controllers\Customer\ArticlesController@chance')->name('chance');


          /*----------------------Activity---------------------------*/
   Route::get('/activity', 'App\Http\Controllers\Customer\ActivityController@index');
   Route::get('/activityDetails/{id}', 'App\Http\Controllers\Customer\ActivityController@newsDetails')->name('activityDetails');
   Route::get('fetch_activitydata', 'App\Http\Controllers\Customer\ActivityController@fetch_data');
   Route::get('fetch_activitynews', 'App\Http\Controllers\Customer\ActivityController@fetch_news');

   /*--------------------------------------Academy--------------------------------------------*/
   Route::get('/academy/{id}', 'App\Http\Controllers\Customer\AcademyController@index')->name('academy');
   Route::get('/academytraining/{id}', 'App\Http\Controllers\Customer\AcademyController@training')->name('academytraining');
   Route::get('/course', 'App\Http\Controllers\Customer\AcademyController@course');
   Route::get('/courseRegisteration/{id}', 'App\Http\Controllers\Customer\AcademyController@courseDetails')->name('courseRegisteration');
   Route::post('/registerationForm', 'App\Http\Controllers\Customer\AcademyController@registerationForm')->name('registerationForm');

   /*-------------------------------------encyclo--------------------------------------------------*/
   Route::get('/encyclo', 'App\Http\Controllers\Customer\EncycloController@index');
   Route::get('/brother', 'App\Http\Controllers\Customer\EncycloController@brother');
   Route::get('/commerical', 'App\Http\Controllers\Customer\EncycloController@commerical');
   Route::get('/region', 'App\Http\Controllers\Customer\EncycloController@region');
   Route::get('/fetch_regions', 'App\Http\Controllers\Customer\EncycloController@regionDetails');
   Route::get('/organization', 'App\Http\Controllers\Customer\EncycloController@organization');
   Route::get('/fetch_organization', 'App\Http\Controllers\Customer\EncycloController@organizationDetails');
   Route::get('/laws', 'App\Http\Controllers\Customer\EncycloController@laws');
   Route::get('/fetch_laws', 'App\Http\Controllers\Customer\EncycloController@lawsDetails');
   Route::get('/embassy', 'App\Http\Controllers\Customer\EncycloController@embassy');
   Route::get('/fetch_embassy', 'App\Http\Controllers\Customer\EncycloController@embassyDetails');
   Route::get('/communication', 'App\Http\Controllers\Customer\EncycloController@communication');
   Route::get('/expencyclopedia', 'App\Http\Controllers\Customer\EncycloController@expencyclopedia');
   Route::get('/fetch_expencyclopedia', 'App\Http\Controllers\Customer\EncycloController@encyclopediaDetails');
   Route::get('/studies', 'App\Http\Controllers\Customer\EncycloController@studies');
   Route::get('/fetch_studies', 'App\Http\Controllers\Customer\EncycloController@studiesDetails');
   Route::get('/ministry', 'App\Http\Controllers\Customer\EncycloController@ministry');
   Route::get('/fetch_ministry', 'App\Http\Controllers\Customer\EncycloController@ministryDetails');
   Route::get('/topics', 'App\Http\Controllers\Customer\EncycloController@topics');
   Route::get('/fetch_topics', 'App\Http\Controllers\Customer\EncycloController@topicsDetails');
    /*--------------------------------------Sections--------------------------------------------*/
    Route::get('/section', 'App\Http\Controllers\Customer\SectionController@index')->name('section');
    Route::get('/sectionDetails/{id}', 'App\Http\Controllers\Customer\SectionController@details')->name('sectionDetails');
    /*-------------------------------------Static Pages--------------------------------------------------*/
    Route::get('/aboutDirector','App\Http\Controllers\Customer\AboutStaticController@aboutDirector')->name('aboutDirector');
    Route::get('/history','App\Http\Controllers\Customer\AboutStaticController@history')->name('history');
    Route::get('/messageVision','App\Http\Controllers\Customer\AboutStaticController@messageVision')->name('messageVision');
    Route::get('/online-payment','App\Http\Controllers\Customer\AboutStaticController@onlinePayment')->name('online-payment');
    Route::get('/qr-code','App\Http\Controllers\Customer\AboutStaticController@qrCode')->name('qr-code');
    Route::get('/blockchain','App\Http\Controllers\Customer\AboutStaticController@blockchain')->name('blockchain');
    Route::get('/chahbander','App\Http\Controllers\Customer\AboutStaticController@chahbander')->name('chahbander');

    //  Change Lang..
Route::get('changeLang/{lang}', function($lang){

	\Session::put('locale', $lang);

	return redirect()->back();

});


Route::get('/admin', 'App\Http\Controllers\Admin\MasterAdminController@index')->name('admin');
Route::resource('/admin/usersList', 'App\Http\Controllers\Admin\UserListController');
Route::get('/resetPassword/{id}', 'App\Http\Controllers\Admin\UserListController@resetPassword')->name('resetPassword');
/*--------------------Chamber-Gallery----------------------*/
Route::resource('/admin/album', 'App\Http\Controllers\Admin\ChamberGalleryController');
Route::post('/admin/add-AlbumGallery', 'App\Http\Controllers\Admin\ChamberGalleryController@addGallery')->name('addAlbum');
Route::post('/admin/Edit-AlbumGallery', 'App\Http\Controllers\Admin\ChamberGalleryController@updateGallery')->name('updateAlbum');
Route::post('/admin/delete-AlbumGallery/{id}', 'App\Http\Controllers\Admin\ChamberGalleryController@deleteGallery')->name('deleteAlbum');
/*--------------------Chamber-announce----------------------*/
Route::resource('/admin/announce', 'App\Http\Controllers\Admin\AnnounceController');
Route::post('/admin/add-AnnounceGallery', 'App\Http\Controllers\Admin\AnnounceController@addGallery')->name('addAnnounce');
Route::post('/admin/Edit-AnnounceGallery', 'App\Http\Controllers\Admin\AnnounceController@updateGallery')->name('updateAnnounce');
Route::post('/admin/delete-AnnounceGallery/{id}', 'App\Http\Controllers\Admin\AnnounceController@deleteGallery')->name('deleteAnnounce');
Route::post('/admin/add-AnnounceFile', 'App\Http\Controllers\Admin\AnnounceController@addFile')->name('addAnnounceFile');
Route::post('/admin/Edit-AnnounceFile', 'App\Http\Controllers\Admin\AnnounceController@updateFile')->name('updateAnnounceFile');
Route::post('/admin/delete-AnnounceFile/{id}', 'App\Http\Controllers\Admin\AnnounceController@deleteFile')->name('deleteAnnounceFile');
Route::post('saveRelated', 'App\Http\Controllers\Admin\AnnounceController@saveRelated')->name('saveRelated');
Route::DELETE('deleteRelated/{id}', 'App\Http\Controllers\Admin\AnnounceController@deleteRelated')->name('deleteRelated');
/*--------------------Chamber-news----------------------*/
Route::resource('/admin/news', 'App\Http\Controllers\Admin\NewsController');
Route::post('/admin/add-NewsGallery', 'App\Http\Controllers\Admin\NewsController@addGallery')->name('addNews');
Route::post('/admin/Edit-NewsGallery', 'App\Http\Controllers\Admin\NewsController@updateGallery')->name('updateNews');
Route::post('/admin/delete-NewsGallery/{id}', 'App\Http\Controllers\Admin\NewsController@deleteGallery')->name('deleteNews');
Route::post('/admin/add-NewsFile', 'App\Http\Controllers\Admin\NewsController@addFile')->name('addNewsFile');
Route::post('/admin/Edit-NewsFile', 'App\Http\Controllers\Admin\NewsController@updateFile')->name('updateNewsFile');
Route::post('/admin/delete-NewsFile/{id}', 'App\Http\Controllers\Admin\NewsController@deleteFile')->name('deleteNewsFile');
Route::post('saveRelatedNews', 'App\Http\Controllers\Admin\NewsController@saveRelated')->name('saveRelatedNews');
Route::DELETE('deleteRelatedNews/{id}', 'App\Http\Controllers\Admin\NewsController@deleteRelated')->name('deleteRelatedNews');
/*-------------------------partener-------------------*/
Route::resource('/admin/partener', 'App\Http\Controllers\Admin\PartenerController');
/*-------------------------clients-------------------*/
Route::resource('/admin/client', 'App\Http\Controllers\Admin\ClientController');

/*-------------------------btsNumber-------------------*/
Route::resource('/admin/number', 'App\Http\Controllers\Admin\AcademyNumbersController');
/*-------------------------Gallery-------------------*/
Route::resource('/admin/academyGallery', 'App\Http\Controllers\Admin\AcademyGalleryController');
/*-------------------------Academy Data-------------------*/
Route::resource('/admin/academyData', 'App\Http\Controllers\Admin\AcademyDataController');
Route::resource('/admin/academyCompany', 'App\Http\Controllers\Admin\AcademyCompanyController');
Route::resource('/admin/aboutAcademy', 'App\Http\Controllers\Admin\AcademyPageController');
Route::post('/admin/add-aboutGallery', 'App\Http\Controllers\Admin\AcademyPageController@addGallery')->name('addAbout');
Route::post('/admin/Edit-aboutGallery', 'App\Http\Controllers\Admin\AcademyPageController@updateGallery')->name('updateAbout');
Route::post('/admin/delete-aboutGallery/{id}', 'App\Http\Controllers\Admin\AcademyPageController@deleteGallery')->name('deleteAbout');
Route::post('/admin/add-aboutFile', 'App\Http\Controllers\Admin\AcademyPageController@addFile')->name('addaboutFile');
Route::post('/admin/Edit-aboutFile', 'App\Http\Controllers\Admin\AcademyPageController@updateFile')->name('updateaboutFile');
Route::post('/admin/delete-aboutFile/{id}', 'App\Http\Controllers\Admin\AcademyPageController@deleteFile')->name('deleteaboutFile');
Route::resource('/admin/academyCourses', 'App\Http\Controllers\Admin\AcademyCourseController');

/*-------------------------slider-------------------*/
Route::resource('/admin/slider', 'App\Http\Controllers\Admin\HomeSliderController');
/*-------------------------adsImage-------------------*/
Route::resource('/admin/adsImage', 'App\Http\Controllers\Admin\AdsImageController');
/*-------------------------adsVedio-------------------*/
Route::resource('/admin/adsVedio', 'App\Http\Controllers\Admin\AdsVedioController');
/*-------------------------newsletter-------------------*/
Route::resource('/admin/newsletter', 'App\Http\Controllers\Admin\NewsLetterController');
/*-------------------------newsletter-------------------*/
Route::resource('/admin/contactMsg', 'App\Http\Controllers\Admin\ContactMessageController');
/*-------------------------social-------------------*/
Route::resource('/admin/social', 'App\Http\Controllers\Admin\SocialMediaController');
/*-------------------------sections-------------------*/
Route::resource('/admin/section', 'App\Http\Controllers\Admin\SectionController');

Route::post('/admin/add-SectionFile', 'App\Http\Controllers\Admin\SectionController@addFile')->name('addSectionFile');
Route::post('/admin/Edit-SectionFile', 'App\Http\Controllers\Admin\SectionController@updateFile')->name('updateSectionFile');
Route::post('/admin/delete-SectionFile/{id}', 'App\Http\Controllers\Admin\SectionController@deleteFile')->name('deleteSectionFile');
/*-------------------------socialResponsibility-------------------*/
Route::resource('/admin/socialResponsibility', 'App\Http\Controllers\Admin\SocialResponsibilityController');
/*-------------------------Board-------------------*/
Route::resource('/admin/board', 'App\Http\Controllers\Admin\BoardController');
Route::post('/admin/add-BoardMember', 'App\Http\Controllers\Admin\BoardController@addBoardMember')->name('addBoardMember');
Route::post('/admin/Edit-BoardMember', 'App\Http\Controllers\Admin\BoardController@updateBoardMember')->name('updateBoardMember');
Route::post('/admin/delete-BoardMember/{id}', 'App\Http\Controllers\Admin\BoardController@deleteBoardMember')->name('deleteBoardMember');
/*-------------------------articel-------------------*/
Route::resource('/admin/articel', 'App\Http\Controllers\Admin\ArticelsController');
Route::post('/admin/add-articelGallery', 'App\Http\Controllers\Admin\ArticelsController@addGallery')->name('addArticel');
Route::post('/admin/Edit-ArticelGallery', 'App\Http\Controllers\Admin\ArticelsController@updateGallery')->name('updateArticel');
Route::post('/admin/delete-ArticelGallery/{id}', 'App\Http\Controllers\Admin\ArticelsController@deleteGallery')->name('deleteArticel');
Route::post('/admin/add-ArticelFile', 'App\Http\Controllers\Admin\ArticelsController@addFile')->name('addArticelFile');
Route::post('/admin/Edit-ArticelFile', 'App\Http\Controllers\Admin\ArticelsController@updateFile')->name('updateArticelFile');
Route::post('/admin/delete-ArticelFile/{id}', 'App\Http\Controllers\Admin\ArticelsController@deleteFile')->name('deleteArticelFile');


/*-------------------------Devision-------------------*/
Route::resource('/admin/devisions', 'App\Http\Controllers\Admin\DevisionsController');
Route::resource('/admin/devMeeting', 'App\Http\Controllers\Admin\DevisionMeetingController');
Route::get('/admin/editAdminMeeting/{id}', 'App\Http\Controllers\Admin\DevisionMeetingController@editAdminMeeting')->name('editAdminMeeting');
Route::post('/admin/add-meetingGallery', 'App\Http\Controllers\Admin\DevisionMeetingController@addGallery')->name('addMeetingGallery');
Route::post('/admin/Edit-meetingGallery', 'App\Http\Controllers\Admin\DevisionMeetingController@updateGallery')->name('updateMeetingGallery');
Route::post('/admin/delete-meetingGallery/{id}', 'App\Http\Controllers\Admin\DevisionMeetingController@deleteGallery')->name('deleteMeetingGallery');
Route::post('/admin/add-meetingFile', 'App\Http\Controllers\Admin\DevisionMeetingController@addFile')->name('addMeetingFile');
Route::post('/admin/Edit-meetingFile', 'App\Http\Controllers\Admin\DevisionMeetingController@updateFile')->name('updateMeetingFile');
Route::post('/admin/delete-meetingFile/{id}', 'App\Http\Controllers\Admin\DevisionMeetingController@deleteFile')->name('deleteMeetingFile');
/**********************************Devision News********************************* */
Route::resource('/admin/devNews', 'App\Http\Controllers\Admin\DevisionNewsController');
Route::get('/admin/editAdminDevNews/{id}', 'App\Http\Controllers\Admin\DevisionNewsController@editAdminMeeting')->name('editAdminDevNews');
Route::post('/admin/add-DevNewsGallery', 'App\Http\Controllers\Admin\DevisionNewsController@addGallery')->name('addDevNewsGallery');
Route::post('/admin/Edit-DevNewsGallery', 'App\Http\Controllers\Admin\DevisionNewsController@updateGallery')->name('updateDevNewsGallery');
Route::post('/admin/delete-DevNewsGallery/{id}', 'App\Http\Controllers\Admin\DevisionNewsController@deleteGallery')->name('deleteDevNewsGallery');
Route::post('/admin/add-DevNewsFile', 'App\Http\Controllers\Admin\DevisionNewsController@addFile')->name('addDevNewsFile');
Route::post('/admin/Edit-DevNewsFile', 'DevisionNewsController@updateFile')->name('updateDevNewsFile');
Route::post('/admin/delete-DevNewsFile/{id}', 'App\Http\Controllers\Admin\DevisionNewsController@deleteFile')->name('deleteDevNewsFile');
Route::post('saveRelatedNewsDev', 'App\Http\Controllers\Admin\DevisionNewsController@saveRelated')->name('saveRelatedNewsDev');
Route::DELETE('deleteRelatedNewsDev/{id}', 'App\Http\Controllers\Admin\DevisionNewsController@deleteRelated')->name('deleteRelatedNewsDev');
/*****************************************dev Board****************************************** */
Route::resource('/admin/devBoard', 'App\Http\Controllers\Admin\DevisionBoardController');
Route::get('/admin/editAdminDevBoard/{id}', 'App\Http\Controllers\Admin\DevisionBoardController@editAdminMeeting')->name('editAdminDevBoard');
Route::post('/admin/add-BoardMemberDev', 'App\Http\Controllers\Admin\DevisionBoardController@addBoardMember')->name('addBoardMemberDev');
Route::post('/admin/Edit-BoardMemberDev', 'App\Http\Controllers\Admin\DevisionBoardController@updateBoardMember')->name('updateBoardMemberDev');
Route::post('/admin/delete-BoardMemberDev/{id}', 'App\Http\Controllers\Admin\DevisionBoardController@deleteBoardMember')->name('deleteBoardMemberDev');
/*-------------------------newsletter-------------------*/
Route::resource('/admin/registerDev', 'App\Http\Controllers\Admin\RegisterDevisionController');
/*-------------------------chancses-------------------*/
Route::resource('/admin/adminChance', 'App\Http\Controllers\Admin\AdminChancesController');

/*************************conferance*********************** */
Route::resource('/admin/conference', 'App\Http\Controllers\Admin\ConferanceController');
Route::post('/admin/add-conferanceGallery', 'App\Http\Controllers\Admin\ConferanceController@addGallery')->name('addconferance');
Route::post('/admin/Edit-conferanceGallery', 'App\Http\Controllers\Admin\ConferanceController@updateGallery')->name('updateconferance');
Route::post('/admin/delete-conferanceGallery/{id}', 'App\Http\Controllers\Admin\ConferanceController@deleteGallery')->name('deleteconferance');
Route::post('/admin/add-conferanceFile', 'App\Http\Controllers\Admin\ConferanceController@addFile')->name('addconferanceFile');
Route::post('/admin/Edit-conferanceFile', 'App\Http\Controllers\Admin\ConferanceController@updateFile')->name('updateconferanceFile');
Route::post('/admin/delete-conferanceFile/{id}', 'App\Http\Controllers\Admin\ConferanceController@deleteFile')->name('deleteconferanceFile');
Route::post('saveRelatedconferance', 'App\Http\Controllers\Admin\ConferanceController@saveRelated')->name('saveRelatedconferance');
Route::DELETE('deleteRelatedconferance/{id}', 'App\Http\Controllers\Admin\ConferanceController@deleteRelated')->name('deleteRelatedconferance');

/***********************************Woman Activity*********************************** */
Route::resource('/admin/activity', 'App\Http\Controllers\Admin\WomanActivityController');
Route::post('/admin/add-activityGallery', 'App\Http\Controllers\Admin\WomanActivityController@addGallery')->name('addactivity');
Route::post('/admin/Edit-activityGallery', 'App\Http\Controllers\Admin\WomanActivityController@updateGallery')->name('updateactivity');
Route::post('/admin/delete-activityGallery/{id}', 'App\Http\Controllers\Admin\WomanActivityController@deleteGallery')->name('deleteactivity');
Route::post('/admin/add-activityFile', 'App\Http\Controllers\Admin\WomanActivityController@addFile')->name('addactivityFile');
Route::post('/admin/Edit-activityFile', 'App\Http\Controllers\Admin\WomanActivityController@updateFile')->name('updateactivityFile');
Route::post('/admin/delete-activityFile/{id}', 'App\Http\Controllers\Admin\WomanActivityController@deleteFile')->name('deleteactivityFile');
Route::post('saveRelatedactivity', 'App\Http\Controllers\Admin\WomanActivityController@saveRelated')->name('saveRelatedactivity');
Route::DELETE('deleteRelatedactivity/{id}', 'App\Http\Controllers\Admin\WomanActivityController@deleteRelated')->name('deleteRelatedactivity');

/*******************************Elnco************************************* */
Route::resource('/admin/brother', 'App\Http\Controllers\Admin\BrotherController');
Route::resource('/admin/commercialAgreement', 'App\Http\Controllers\Admin\CommercialAgreementController');
Route::resource('/admin/business-organizations', 'App\Http\Controllers\Admin\BusinessOrganizationController');
Route::resource('/admin/study-report', 'App\Http\Controllers\Admin\StudyReportController');
Route::resource('/admin/embassies', 'App\Http\Controllers\Admin\EmbassiesController');
Route::resource('/admin/decisions-laws', 'App\Http\Controllers\Admin\DecisionsLawsController');
Route::resource('/admin/ministries', 'App\Http\Controllers\Admin\MinistriesController');
Route::resource('/admin/communications-guide', 'App\Http\Controllers\Admin\CommunicationsGuideController');
Route::resource('/admin/commmercial-topics', 'App\Http\Controllers\Admin\CommmercialTopicsController');
Route::resource('/admin/exporters-encyclopedia', 'App\Http\Controllers\Admin\ExportersEncyclopediaController');
Route::resource('/admin/countries-data', 'App\Http\Controllers\Admin\CountriesDataController');
/*-------------------------chancses-------------------*/
Route::resource('/admin/country-details', 'App\Http\Controllers\Admin\CountryDetailsController');

Route::get('/admin/login', 'App\Http\Controllers\Auth\LoginAdminController@showLoginAdminForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Auth\LoginAdminController@attemptLogin')->name('admin.login');
Route::get('/admin/register', 'App\Http\Controllers\Auth\RegisterAdminController@showRegisterForm')->name('admin.register');
Route::post('/admin/register', 'App\Http\Controllers\Auth\RegisterAdminController@create')->name('admin.register');
Route::post('admin-logout', 'App\Http\Controllers\Auth\LoginAdminController@logout')->name('admin-logout');
