    <?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// for frontend users
Route::any('/',"HomeController@index");

// for aboutus
Route::group(array('prefix' => 'aboutus'), function() {
    Route::get('vision','AboutschoolController@getDataVision');
    Route::get('the-team','AboutschoolController@getDataTheTeam');
    Route::get('school-tieups','AboutschoolController@getDataSchoolTieups');
    Route::get('our-centers','AboutschoolController@getDataOurSchool');
    Route::get('montessori','AboutschoolController@getDataMontessori');
});

// for photos
Route::get('photos','PhotosController@getPhotos');

//for User side

    Route::group(array('prefix' => 'program'),function(){
        Route::get('toddler-montessori','ProgramsController@toddler_montessori');
        Route::get('primary-montessori','ProgramsController@primary_montessori');
        Route::get('postschoolcare-activitycenter','ProgramsController@postschoolcare_activitycenter');
    });

    //contact us 

    Route::group(array('prefix' => 'contactus'),function(){
        Route::get('enquiry','ProgramsController@enquiry');
        Route::get('career','ProgramsController@career');
        Route::get('location','ProgramsController@location');
    });


        
    Route::group(array('prefix' => 'parentscorner'),function(){
            Route::get('feedback','ParentsController@feedback');
            Route::get('events','ParentsController@events');
            //return View::make('pages.users.parentscorner.'.$subpageName);
        });
        

// for admission
Route::get('admissions',function(){
    return View::make('pages.users.admissions');
});


Route::get('/viewphotos.php',function(){
    return View::make('pages.users.viewphotos');
});

Route::get('calendar',function(){
    $allEventsForCalendar = SchoolEvent::getSchoolEventsForFrontend();
    $EventsWithDesc = SchoolEvent::getSchoolEvents();
    foreach ($allEventsForCalendar as $arr)
    {
        $arr['start'] = $arr['eventstart'];
        $arr['end'] = $arr['eventend'];
        unset($arr['eventstart']);
        unset($arr['eventend']);
        
    }
    //return $allEventsForCalendar;
    $data = compact('allEventsForCalendar', 'EventsWithDesc');
    return View::make('pages.users.calendar', $data);
});
    
    

//for adminpanel
//for authentication

Route::group(array('prefix' => 'vault'), function() {
	Route::any('login', "VaultController@login");
	Route::get('logout', "VaultController@logout");
	
});
Tracker::hit();
Route::any('media', "DashboardController@media");
//for dashboard
Route::group(array('prefix' => 'dashboard'), function() {
	Route::any('/', "DashboardController@index");
	Route::get('logout', "VaultController@logout");
        Route::get('banner',  function(){
                        $admin_name=Session::get('firstName').Session::get('lastName');
                    $data=compact('admin_name');
            return View::make('pages.admin.banner',$data);

        });
        Route::get('birthday',  function(){
                        $admin_name=Session::get('firstName').Session::get('lastName');
                    $data=compact('admin_name');
            return View::make('pages.admin.birthday',$data);
        });
        Route::get('announcements',  function(){
                        $admin_name=Session::get('firstName').Session::get('lastName');
                    $data=compact('admin_name');
            return View::make('pages.admin.announcements',$data);

        });
        Route::get('parentsspeak',  function(){
            $admin_name=Session::get('firstName').Session::get('lastName');
            $data=compact('admin_name');
            return View::make('pages.admin.parentspeak',$data);
        });        
        Route::any('events',  function(){
            $admin_name=Session::get('firstName').Session::get('lastName');
                    $data=compact('admin_name');
            return View::make('pages.admin.events',$data);

        });


        //Route::any('announcements','AdminController@getFlashNews');

});

Route::post('dashboard/banner', 'AdminController@UploadBannerImages');
Route::post('dashboard/birthday', 'AdminController@UploadBirthdayImages');
Route::post('media', 'AdminController@UploadMedia');
Route::post('UploadMediaFromCareer', 'AdminController@UploadMediaFromCareer');
Route::post('UploadMediaFromToddler', 'AdminController@UploadMediaFromToddler');
Route::post('UploadMediaFromSchoolCare', 'AdminController@UploadMediaFromSchoolCare');
Route::post('UploadMediaFromPrimary', 'AdminController@UploadMediaFromPrimary');
Route::post('UploadMediaFromHome', 'AdminController@UploadMediaFromHome');
Route::post('UploadMediaFromMontessori', 'AdminController@UploadMediaFromMontessori');
Route::post('UploadMediaFromVision', 'AdminController@UploadMediaFromVision');
Route::post('UploadMediaFromTieups', 'AdminController@UploadMediaFromTieups');
Route::post('UploadMediaFromTheTeam', 'AdminController@UploadMediaFromTheTeam');

//for Add new Admin and get info for all users
Route::group(array('prefix' => 'adminusers'), function() {
      Route::any('addadminuser','AdminController@addadminuser');
      Route::any('viewusers','AdminController@viewingusers'); //after reaching to controller 
      Route::any('youprofile','AdminController@youprofile');                                                               //it should go to view page
});

//for admin
Route::group(array('prefix' => 'pages'), function() {
      Route::any('homePage','HomeController@HomePage');
      Route::any('our_vision','AboutschoolController@adminVision');
      Route::any('the_team','AboutschoolController@adminTeam');  
      Route::any('school_tieups','AboutschoolController@adminSchool_tieups'); 
      Route::any('Montessori','AboutschoolController@adminMontessori');                                                         //it should go to view page
});

//for admin
Route::group(array('prefix' => 'programs'), function() {
      Route::any('toddlerMontessori','ProgramsController@admintoddlerMontessori');
      Route::any('primaryMontessori','ProgramsController@adminprimaryMontessori');
      Route::any('schoolCare_Activity','ProgramsController@adminschoolCare_Activity');  
});

Route::group(array('prefix' => 'contact_us'), function() {
      Route::any('enquiry','ProgramsController@adminEnquiry');
      Route::any('career','ProgramsController@admincareer');
});



// for Ajax calls
Route::group(array('prefix' => 'quick'), function() {
    // for Admin ajax calls
	//Route::any('addEvent','AdminController@addSchoolEvent');
    Route::any('getAllEvents','AdminController@getAllSchoolEvents');
    Route::any('addUser','AdminController@addNewUser');
    Route::any('getAllAdminUsers','AdminController@getAllAdminUsers');
    Route::any('updateProfile','AdminController@updateProfile');
    Route::any('updatecredintials','AdminController@updatecredintials');
    Route::any('addMultipleEvents','AdminController@addMultipleEvents');
    Route::any('getAllNews','AdminController@getAllNews');
    Route::any('insertFlashNews','AdminController@insertFlashNews');
    Route::any('deleteThisNews','AdminController@deleteNews');
    Route::any('getNewsToEdit','AdminController@getNewsToEdit');
    Route::any('updateFlashNews','AdminController@updateFlashNews');
    Route::any('moveToUp','AdminController@moveToUp');
    Route::any('moveToDown','AdminController@moveToDown');
    Route::any('getBannerImages','AdminController@getBannerImages');
    Route::any('deleteThisBanner','AdminController@deleteThisBanner');
    Route::any('moveBannerImageDown','AdminController@moveBannerImageDown');
    Route::any('moveBannerImageUp','AdminController@moveBannerImageUp');
    Route::any('getBirthdayImages','AdminController@getBirthdayImages');
    Route::any('deleteThisBirthday','AdminController@deleteThisBirthday');
    Route::any('moveBirthdayImageDown','AdminController@moveBirthdayImageDown');
    Route::any('moveBirthdayImageUp','AdminController@moveBirthdayImageUp');
    Route::any('getAllParentSpeaks','AdminController@getAllParentSpeaks');
    Route::any('deleteThisParentSpeak','AdminController@deleteThisParentSpeak');
    Route::any('statusChange','AdminController@statusChange');
    Route::any('updateParentComment','AdminController@updateParentComment');
    Route::any('approvingPost','AdminController@approvingPost');
    // for User ajaxcalls 

    Route::any('InsertHomePageContent','HomeController@InsertHomePageContent');
    Route::any('deleteThisPost','HomeController@deleteThisPost');
    Route::any('InsertTeamPageContent','AboutschoolController@InsertTeamPageContent');
    Route::any('InsertmontessoriPageContent','AboutschoolController@InsertTeamPageContent');
    Route::any('InsertVisionPageContent','AboutschoolController@InsertTeamPageContent');
    Route::any('InsertTieupsPageContent','AboutschoolController@InsertTeamPageContent');

    Route::any('enquiryPost','AdmissionsController@enquiryPost');
    Route::any('ParentSpeakFromUserEnd','ParentsController@ParentSpeakFromUserEnd');
    Route::any('deleteEnquiry','AdmissionsController@deleteEnquiry');
    Route::any('getMediaGallery','DashboardController@getMediaGallery');
    Route::any('DeleteMultipleImages','DashboardController@DeleteMultipleImages');


});



//for testing
Route::group(array('prefix' => 'test'), function() {
        Route::any('/',function(){
            return View::make('layout.frontend.main');
        });
	
});



//postmaster@localhost
