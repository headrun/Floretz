<?php

class HomeController extends \BaseController {

//----------------------------------  this is for Front end side ----------------------------->	
    
    public function index(){
        //home page content
        $page_id = Page::where('page_name', '=', "home")->first();
        $page = PageContent::where('page_id', '=', $page_id->id)->get();
        //for announcemts 
        $allAnnouncements = FlashNews::getAllFlashNews();
        // for Parent speaks
        $allAllParentSpeaks = ParentSpeak::getAllParentDetailsLimit();
        // for birthday images
        $BirtdayImagesForHomepage = Birthday::getBirtdayImages();
        //for Banner images
        $BannerImagesForHomepage = Banner::getBannerImages();
        //for Schoolevents to display in home page
        $allEventsForCalendar = SchoolEvent::getSchoolEventsForFrontend();
        //return $BannerImagesForHomepage;
        $page = $page[0];
        $data1 = compact('page', 'allAnnouncements', 'allAllParentSpeaks', 'BirtdayImagesForHomepage', 'BannerImagesForHomepage', 'allEventsForCalendar');
        return View::make('pages.users.index', $data1);
    }

//------------------------------------ below are for Admin ----------------------------------->

    public function HomePage(){
        if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "home")->first();
        		 $page = PageContent::where('page_id', '=', $page_id->id)->get();
        		 $bkp_content = PageContentBackup::getAllContents($page_id->id);
        		 $page = $page[0];
        		 $data1 = compact('page', 'bkp_content');
        		 ///return $data1;
        		 //$bkp_content = PageContentBackup::getAllContents();

                return View::make('pages.admin.pages.homePage',$data, $data1);
            }
    }
    

    public function InsertHomePageContent(){
            if(Auth::check()){
                $vals = Input::all();
                $newsInfo = PageContent::updateHomePageContent($vals);
                 if($newsInfo){
                    return Response::json(array("status"=>"success", ));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
    }  
    


    public function deleteThisPost() {
            if(Auth::check()){
                $inputs= Input::all();
                $postInfo = PageContentBackup::DeletingPost($inputs['Nid']);

                //return Response::json(array("status"=>$newsInfo,));
                 if($postInfo){
                    return Response::json(array("status"=>"success", $postInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }
            
        }


	/**
	 * Show the form for creating a new resource.
	 * GET /users/home/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users/home
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/home/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/home/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}