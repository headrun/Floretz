<?php

//-----------------------------  this is for Fron end pages ---------------------------------------->  	

class AboutschoolController extends \BaseController {
        public function getDataVision(){

        	$page_id = Page::where('page_name', '=', "vision")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.aboutus.vision', $data1);
        }

        public function getDataTheTeam(){

        	$page_id = Page::where('page_name', '=', "team")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.aboutus.the-team', $data1); 
        }

        public function getDataSchoolTieups(){

        	$page_id = Page::where('page_name', '=', "tieups")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.aboutus.school-tieups', $data1);    
        }

        public function getDataOurSchool(){
            return View::make('pages.users.aboutus.our-centers');    
        }

        public function getDataMontessori(){

        	$page_id = Page::where('page_name', '=', "montessori")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.aboutus.montessori', $data1);    
        }        
    
    
  //-----------------------------  this is for adminpages ---------------------------------------->  	

    	public function adminVision(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "vision")->first();
        		 $page = PageContent::where('page_id', '=', $page_id->id)->get();
        		 $page = $page[0];
        		 $bkp_content = PageContentBackup::getAllContents($page_id->id);
        		 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.pages.our_vision',$data, $data1);
            }    
        }  

        //-----------the team functions start------>
        public function adminTeam(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "team")->first();
        		 $page = PageContent::where('page_id', '=', $page_id->id)->get();
        		 $page = $page[0];
        		 $bkp_content = PageContentBackup::getAllContents($page_id->id);
        		 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.pages.the_team',$data, $data1);
            }    
        }


        public function InsertTeamPageContent(){
            if(Auth::check()){
                $vals = Input::all();
                $newsInfo = PageContent::updatePageContent($vals);
                 if($newsInfo){
                    return Response::json(array("status"=>"success", ));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
    	}
    	//-----------the team functions start end------>


        public function adminSchool_tieups(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "tieups")->first();
        		 $page = PageContent::where('page_id', '=', $page_id->id)->get();
        		 $page = $page[0];
        		 $bkp_content = PageContentBackup::getAllContents($page_id->id);
        		 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.pages.school_tieups',$data, $data1);
            }    
        }

        //-----------the Montessori functions start------>
        public function adminMontessori(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "montessori")->first();
        		 $page = PageContent::where('page_id', '=', $page_id->id)->get();
        		 $page = $page[0];
        		 $bkp_content = PageContentBackup::getAllContents($page_id->id);
        		 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.pages.Montessori',$data, $data1);
            }    
        }
    //-----------the Montessori functions start end------>
    
    
    
	/**
	 * Display a listing of the resource.
	 * GET /users/aboutus
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/aboutus/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users/aboutus
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/aboutus/{id}
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
	 * GET /users/aboutus/{id}/edit
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
	 * PUT /users/aboutus/{id}
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
	 * DELETE /users/aboutus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}