<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|
*/
Route::group(['namespace' => 'Admin'], function () {
  Route::get('/admin', 'MasterAdminController@index')->name('admin');
  Route::resource('/admin/usersList', 'UserListController');
  Route::get('/resetPassword/{id}', 'UserListController@resetPassword')->name('resetPassword');
  /*--------------------Chamber-Gallery----------------------*/
  Route::resource('/admin/album', 'ChamberGalleryController');
  Route::post('/admin/add-AlbumGallery', 'ChamberGalleryController@addGallery')->name('addAlbum');
  Route::post('/admin/Edit-AlbumGallery', 'ChamberGalleryController@updateGallery')->name('updateAlbum');
  Route::post('/admin/delete-AlbumGallery/{id}', 'ChamberGalleryController@deleteGallery')->name('deleteAlbum');
  /*--------------------Chamber-announce----------------------*/
  Route::resource('/admin/announce', 'AnnounceController');
  Route::post('/admin/add-AnnounceGallery', 'AnnounceController@addGallery')->name('addAnnounce');
  Route::post('/admin/Edit-AnnounceGallery', 'AnnounceController@updateGallery')->name('updateAnnounce');
  Route::post('/admin/delete-AnnounceGallery/{id}', 'AnnounceController@deleteGallery')->name('deleteAnnounce');
  Route::post('/admin/add-AnnounceFile', 'AnnounceController@addFile')->name('addAnnounceFile');
  Route::post('/admin/Edit-AnnounceFile', 'AnnounceController@updateFile')->name('updateAnnounceFile');
  Route::post('/admin/delete-AnnounceFile/{id}', 'AnnounceController@deleteFile')->name('deleteAnnounceFile');
  Route::post('saveRelated', 'AnnounceController@saveRelated')->name('saveRelated');
  Route::DELETE('deleteRelated/{id}', 'AnnounceController@deleteRelated')->name('deleteRelated');
  /*--------------------Chamber-news----------------------*/
  Route::resource('/admin/news', 'NewsController');
  Route::post('/admin/add-NewsGallery', 'NewsController@addGallery')->name('addNews');
  Route::post('/admin/Edit-NewsGallery', 'NewsController@updateGallery')->name('updateNews');
  Route::post('/admin/delete-NewsGallery/{id}', 'NewsController@deleteGallery')->name('deleteNews');
  Route::post('/admin/add-NewsFile', 'NewsController@addFile')->name('addNewsFile');
  Route::post('/admin/Edit-NewsFile', 'NewsController@updateFile')->name('updateNewsFile');
  Route::post('/admin/delete-NewsFile/{id}', 'NewsController@deleteFile')->name('deleteNewsFile');
  Route::post('saveRelatedNews', 'NewsController@saveRelated')->name('saveRelatedNews');
  Route::DELETE('deleteRelatedNews/{id}', 'NewsController@deleteRelated')->name('deleteRelatedNews');
  /*-------------------------partener-------------------*/
  Route::resource('/admin/partener', 'PartenerController');
  /*-------------------------clients-------------------*/
  Route::resource('/admin/client', 'ClientController');

  /*-------------------------btsNumber-------------------*/
  Route::resource('/admin/number', 'AcademyNumbersController');
  /*-------------------------Gallery-------------------*/
  Route::resource('/admin/academyGallery', 'AcademyGalleryController');
  /*-------------------------Academy Data-------------------*/
  Route::resource('/admin/academyData', 'AcademyDataController');
  Route::resource('/admin/academyCompany', 'AcademyCompanyController');
  Route::resource('/admin/aboutAcademy', 'AcademyPageController');
  Route::post('/admin/add-aboutGallery', 'AcademyPageController@addGallery')->name('addAbout');
  Route::post('/admin/Edit-aboutGallery', 'AcademyPageController@updateGallery')->name('updateAbout');
  Route::post('/admin/delete-aboutGallery/{id}', 'AcademyPageController@deleteGallery')->name('deleteAbout');
  Route::post('/admin/add-aboutFile', 'AcademyPageController@addFile')->name('addaboutFile');
  Route::post('/admin/Edit-aboutFile', 'AcademyPageController@updateFile')->name('updateaboutFile');
  Route::post('/admin/delete-aboutFile/{id}', 'AcademyPageController@deleteFile')->name('deleteaboutFile');
  Route::resource('/admin/academyCourses', 'AcademyCourseController');

  /*-------------------------slider-------------------*/
  Route::resource('/admin/slider', 'HomeSliderController');
  /*-------------------------adsImage-------------------*/
  Route::resource('/admin/adsImage', 'AdsImageController');
  /*-------------------------adsVedio-------------------*/
  Route::resource('/admin/adsVedio', 'AdsVedioController');
  /*-------------------------newsletter-------------------*/
  Route::resource('/admin/newsletter', 'NewsLetterController');
  /*-------------------------newsletter-------------------*/
  Route::resource('/admin/contactMsg', 'ContactMessageController');
  /*-------------------------social-------------------*/
  Route::resource('/admin/social', 'SocialMediaController');
  /*-------------------------sections-------------------*/
  Route::resource('/admin/section', 'SectionController');

  Route::post('/admin/add-SectionFile', 'SectionController@addFile')->name('addSectionFile');
  Route::post('/admin/Edit-SectionFile', 'SectionController@updateFile')->name('updateSectionFile');
  Route::post('/admin/delete-SectionFile/{id}', 'SectionController@deleteFile')->name('deleteSectionFile');
  /*-------------------------socialResponsibility-------------------*/
  Route::resource('/admin/socialResponsibility', 'SocialResponsibilityController');
  /*-------------------------Board-------------------*/
  Route::resource('/admin/board', 'BoardController');
  Route::post('/admin/add-BoardMember', 'BoardController@addBoardMember')->name('addBoardMember');
  Route::post('/admin/Edit-BoardMember', 'BoardController@updateBoardMember')->name('updateBoardMember');
  Route::post('/admin/delete-BoardMember/{id}', 'BoardController@deleteBoardMember')->name('deleteBoardMember');
  /*-------------------------articel-------------------*/
  Route::resource('/admin/articel', 'ArticelsController');
  Route::post('/admin/add-articelGallery', 'ArticelsController@addGallery')->name('addArticel');
  Route::post('/admin/Edit-ArticelGallery', 'ArticelsController@updateGallery')->name('updateArticel');
  Route::post('/admin/delete-ArticelGallery/{id}', 'ArticelsController@deleteGallery')->name('deleteArticel');
  Route::post('/admin/add-ArticelFile', 'ArticelsController@addFile')->name('addArticelFile');
  Route::post('/admin/Edit-ArticelFile', 'ArticelsController@updateFile')->name('updateArticelFile');
  Route::post('/admin/delete-ArticelFile/{id}', 'ArticelsController@deleteFile')->name('deleteArticelFile');


  /*-------------------------Devision-------------------*/
  Route::resource('/admin/devisions', 'DevisionsController');
  Route::resource('/admin/devMeeting', 'DevisionMeetingController');
  Route::get('/admin/editAdminMeeting/{id}', 'DevisionMeetingController@editAdminMeeting')->name('editAdminMeeting');
  Route::post('/admin/add-meetingGallery', 'DevisionMeetingController@addGallery')->name('addMeetingGallery');
  Route::post('/admin/Edit-meetingGallery', 'DevisionMeetingController@updateGallery')->name('updateMeetingGallery');
  Route::post('/admin/delete-meetingGallery/{id}', 'DevisionMeetingController@deleteGallery')->name('deleteMeetingGallery');
  Route::post('/admin/add-meetingFile', 'DevisionMeetingController@addFile')->name('addMeetingFile');
  Route::post('/admin/Edit-meetingFile', 'DevisionMeetingController@updateFile')->name('updateMeetingFile');
  Route::post('/admin/delete-meetingFile/{id}', 'DevisionMeetingController@deleteFile')->name('deleteMeetingFile');
  /**********************************Devision News********************************* */
  Route::resource('/admin/devNews', 'DevisionNewsController');
  Route::get('/admin/editAdminDevNews/{id}', 'DevisionNewsController@editAdminMeeting')->name('editAdminDevNews');
  Route::post('/admin/add-DevNewsGallery', 'DevisionNewsController@addGallery')->name('addDevNewsGallery');
  Route::post('/admin/Edit-DevNewsGallery', 'DevisionNewsController@updateGallery')->name('updateDevNewsGallery');
  Route::post('/admin/delete-DevNewsGallery/{id}', 'DevisionNewsController@deleteGallery')->name('deleteDevNewsGallery');
  Route::post('/admin/add-DevNewsFile', 'DevisionNewsController@addFile')->name('addDevNewsFile');
  Route::post('/admin/Edit-DevNewsFile', 'DevisionNewsController@updateFile')->name('updateDevNewsFile');
  Route::post('/admin/delete-DevNewsFile/{id}', 'DevisionNewsController@deleteFile')->name('deleteDevNewsFile');
  Route::post('saveRelatedNewsDev', 'DevisionNewsController@saveRelated')->name('saveRelatedNewsDev');
  Route::DELETE('deleteRelatedNewsDev/{id}', 'DevisionNewsController@deleteRelated')->name('deleteRelatedNewsDev');
  /*****************************************dev Board****************************************** */
  Route::resource('/admin/devBoard', 'DevisionBoardController');
  Route::get('/admin/editAdminDevBoard/{id}', 'DevisionBoardController@editAdminMeeting')->name('editAdminDevBoard');
  Route::post('/admin/add-BoardMemberDev', 'DevisionBoardController@addBoardMember')->name('addBoardMemberDev');
  Route::post('/admin/Edit-BoardMemberDev', 'DevisionBoardController@updateBoardMember')->name('updateBoardMemberDev');
  Route::post('/admin/delete-BoardMemberDev/{id}', 'DevisionBoardController@deleteBoardMember')->name('deleteBoardMemberDev');
  /*-------------------------newsletter-------------------*/
  Route::resource('/admin/registerDev', 'RegisterDevisionController');
  /*-------------------------chancses-------------------*/
  Route::resource('/admin/adminChance', 'AdminChancesController');

  /*************************conferance*********************** */
  Route::resource('/admin/conference', 'ConferanceController');
  Route::post('/admin/add-conferanceGallery', 'ConferanceController@addGallery')->name('addconferance');
  Route::post('/admin/Edit-conferanceGallery', 'ConferanceController@updateGallery')->name('updateconferance');
  Route::post('/admin/delete-conferanceGallery/{id}', 'ConferanceController@deleteGallery')->name('deleteconferance');
  Route::post('/admin/add-conferanceFile', 'ConferanceController@addFile')->name('addconferanceFile');
  Route::post('/admin/Edit-conferanceFile', 'ConferanceController@updateFile')->name('updateconferanceFile');
  Route::post('/admin/delete-conferanceFile/{id}', 'ConferanceController@deleteFile')->name('deleteconferanceFile');
  Route::post('saveRelatedconferance', 'ConferanceController@saveRelated')->name('saveRelatedconferance');
  Route::DELETE('deleteRelatedconferance/{id}', 'ConferanceController@deleteRelated')->name('deleteRelatedconferance');

  /***********************************Woman Activity*********************************** */
  Route::resource('/admin/activity', 'WomanActivityController');
  Route::post('/admin/add-activityGallery', 'WomanActivityController@addGallery')->name('addactivity');
  Route::post('/admin/Edit-activityGallery', 'WomanActivityController@updateGallery')->name('updateactivity');
  Route::post('/admin/delete-activityGallery/{id}', 'WomanActivityController@deleteGallery')->name('deleteactivity');
  Route::post('/admin/add-activityFile', 'WomanActivityController@addFile')->name('addactivityFile');
  Route::post('/admin/Edit-activityFile', 'WomanActivityController@updateFile')->name('updateactivityFile');
  Route::post('/admin/delete-activityFile/{id}', 'WomanActivityController@deleteFile')->name('deleteactivityFile');
  Route::post('saveRelatedactivity', 'WomanActivityController@saveRelated')->name('saveRelatedactivity');
  Route::DELETE('deleteRelatedactivity/{id}', 'WomanActivityController@deleteRelated')->name('deleteRelatedactivity');

  /*******************************Elnco************************************* */
  Route::resource('/admin/brother', 'BrotherController');
  Route::resource('/admin/commercialAgreement', 'CommercialAgreementController');
  Route::resource('/admin/business-organizations', 'BusinessOrganizationController');
  Route::resource('/admin/study-report', 'StudyReportController');
  Route::resource('/admin/embassies', 'EmbassiesController');
  Route::resource('/admin/decisions-laws', 'DecisionsLawsController');
  Route::resource('/admin/ministries', 'MinistriesController');
  Route::resource('/admin/communications-guide', 'CommunicationsGuideController');
  Route::resource('/admin/commmercial-topics', 'CommmercialTopicsController');
  Route::resource('/admin/exporters-encyclopedia', 'ExportersEncyclopediaController');
  Route::resource('/admin/countries-data', 'CountriesDataController');
  /*-------------------------chancses-------------------*/
  Route::resource('/admin/country-details', 'CountryDetailsController');
});
Route::get('/admin/login', 'Auth\LoginAdminController@showLoginAdminForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginAdminController@attemptLogin')->name('admin.login');
Route::get('/admin/register', 'Auth\RegisterAdminController@showRegisterForm')->name('admin.register');
Route::post('/admin/register', 'Auth\RegisterAdminController@create')->name('admin.register');
Route::post('admin-logout', 'Auth\LoginAdminController@logout')->name('admin-logout');
