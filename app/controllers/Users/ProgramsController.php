<?php

class ProgramsController extends \BaseController {


		public function toddler_montessori(){

        	$page_id = Page::where('page_name', '=', "toddler")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.programs.toddler-montessori', $data1);
        }


        public function primary_montessori(){

        	$page_id = Page::where('page_name', '=', "primary")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.programs.primary-montessori', $data1);
        }


        public function postschoolcare_activitycenter(){

        	$page_id = Page::where('page_name', '=', "post_school_care_ctivity")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.programs.postschoolcare-activitycenter', $data1);
        }



//----------------------------------------------------- For Admin pages ------------------------------>


        //-------------------------for Program Pages ------------------------------------>
        public function admintoddlerMontessori(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "toddler")->first();
                 $page = PageContent::where('page_id', '=', $page_id->id)->get();
                 $page = $page[0];
                 $bkp_content = PageContentBackup::getAllContents($page_id->id);
                 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.Programs.toddlerMontessori',$data, $data1);
            }    
        }


        public function adminprimaryMontessori(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "primary")->first();
                 $page = PageContent::where('page_id', '=', $page_id->id)->get();
                 $page = $page[0];
                 $bkp_content = PageContentBackup::getAllContents($page_id->id);
                 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.Programs.primaryMontessori',$data, $data1);
            }    
        }


        public function adminschoolCare_Activity(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "post_school_care_ctivity")->first();
                 $page = PageContent::where('page_id', '=', $page_id->id)->get();
                 $page = $page[0];
                 $bkp_content = PageContentBackup::getAllContents($page_id->id);
                 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.Programs.schoolCare_Activity', $data, $data1);
            }    
        }



//-----------------------------------------------  for Admin Contact Us pages -------------------------


        public function adminEnquiry(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $getAllEnquiries = Enquiry::getAllEnquiries();
                 //return $getAllEnquiries;
                 $data=compact('admin_name', 'getAllEnquiries');
                 return View::make('pages.admin.contact_us.enquiry',$data);
            }    
        }


        public function admincareer(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');

                 $page_id = Page::where('page_name', '=', "career")->first();
                 $page = PageContent::where('page_id', '=', $page_id->id)->get();
                 $page = $page[0];
                 $bkp_content = PageContentBackup::getAllContents($page_id->id);
                 $data1 = compact('page', 'bkp_content');

                 return View::make('pages.admin.contact_us.career',$data, $data1);
            }    
        }


        //-------------------  for User Contact Us pages ---------------

        public function enquiry(){

        	
            return View::make('pages.users.contactus.enquiry');
        }


        public function career(){

        	$page_id = Page::where('page_name', '=', "career")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.contactus.career', $data1);
        }

        public function location(){

        	/*$page_id = Page::where('page_name', '=', "toddler")->first();
        	$page = PageContent::where('page_id', '=', $page_id->id)->get();
        	$page = $page[0];
        	$data1 = compact('page');*/
            return View::make('pages.users.contactus.location');
        }




	/**
	 * Display a listing of the resource.
	 * GET /programs
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /programs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /programs
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /programs/{id}
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
	 * GET /programs/{id}/edit
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
	 * PUT /programs/{id}
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
	 * DELETE /programs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}