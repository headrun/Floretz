<?php
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class AdminController extends \BaseController {

        
        public function getAllSchoolEvents(){
            if (Auth::check ()) {
                $allEventdata=SchoolEvent::getSchoolEvents();
               if($allEventdata){
                    return Response::json(array("status"=>"success","data"=>$allEventdata));
                }else{
                     return Response::json(array("status"=>"failure"));
                }
            }
        }
        public function addadminuser(){
            if(Auth::check()){
                 $admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');
                return View::make('pages.admin.adminusers.addadminuser',$data);
            }
        }


        public function addNewUser(){
        	if (Auth::check ()) {
                $inputs=  Input::all();  
                $user_data=User::addUser($inputs);
                if($user_data){
                    return Response::json(array("status"=>"success"));
                }else{
                     return Response::json(array("status"=>"failure"));
                }
                
            }

        }
         //this is ur view page
        // so this what it is displaying in ur page.
        // got it ?
        // so now i need to cretate proper routs to my static pages ?
        // s understand properly
        /*     when page is requested first it is checking in route.php then coming to controller 
             then ur sending response back through controller and it is displaying in page
        what u need to do is
            make ur ajax call and static routes seperately //imp else u will get confused with ajax cal and normal routes
            that is wat i made in routes /quick for ajax*/


            // bro this is for static route rite ? yes i am busy got call from aruna talk to u ltr.

        public function viewingusers(){
        	if(Auth::check()){
        		$admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');
                return View::make('pages.admin.adminusers.viewusers',$data);// for staticpage understood ? yes bro k byecatch u ltr.
            }           

        }

        // this is for Ajax call rite ?
        public function getAllAdminUsers(){
        	if(Auth::check()){
        		$allUserInfo = User::getAllUsersInfo();
                 if($allUserInfo){
                    return Response::json(array("status"=>"success","data"=>$allUserInfo,));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
        	}
        }
        

        public function youprofile(){
        	if(Auth::check()){
        		$admin_name=Session::get('firstName').Session::get('lastName');
                 $data=compact('admin_name');
                return View::make('pages.admin.adminusers.youprofile',$data);// for staticpage understood ? yes bro k byecatch u ltr.
            }           

        }


         public function updateProfile(){
            if(Auth::check()){
                $id = Input::get('id');
                $firstname = Input::get('firstname');
                $lastname = Input::get('lastname');
                $email = Input::get('email');
                $password = Hash::make(Input::get('password'));
                $mobileNo = Input::get('mobileNo');
                $u = new User;

                $update = $u->where('id', $id)->update(array(

                        'first_name' => $firstname,
                        'last_name'  => $lastname,
                        'email'      => $email,
                        'password'   => $password,
                        'mobile_no'  => $mobileNo,
                    ));
                if ($update){
                    return Response::json(array("status"=>"success",));
                }
                else{
                    return Response::json(array("status"=>"fail",));
                }
            }
        }

        public function updatecredintials(){
            //return Response::json(array("status"=>"success",));
            if(Auth::check()){
                $id = Input::get('id');
                $password = Hash::make(Input::get('newpassword'));
                $u = new User;

                $update = $u->where('id', $id)->update(array(
                        'password'   => $password,
                    ));
                if ($update){
                    return Response::json(array("status"=>"success",));
                }
                else{
                    return Response::json(array("status"=>"fail",));
                }
            }
        }





        public function addMultipleEvents(){
            if (Auth::check ()) {
                $inputs=  Input::all();
                //$x=count($inputs['event_title']);
               
                for($i=0;$i<count($inputs['event_title']);$i++){
                         $inputevent['event_title']=$inputs['event_title'][$i];
                         $inputevent['event_type']=$inputs['event_type'][$i];
                         $inputevent['event_startdate']=$inputs['event_startdate'][$i];
                         $inputevent['event_enddate']=$inputs['event_enddate'][$i];
                         $inputevent['event_description']=$inputs['description'][$i];
                         $lastInsertedEvent=SchoolEvent::addEvent($inputevent);
                }
                if($lastInsertedEvent){
                    return Response::json(array("status"=>'success'));     
                }else{
                    return Response::json(array("status"=>'failure'));
                }    
            }

        }


        public function getAllNews(){
            if(Auth::check()){
                $newsInfo = FlashNews::getAllFlashNews();
                 if($newsInfo){
                    return Response::json(array("status"=>"success", "data"=> $newsInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }


        public function deleteNews() {
            if(Auth::check()){
                $inputs= Input::all();
                $newsInfo = FlashNews::DeletingNews($inputs['Nid']);

                //return Response::json(array("status"=>$newsInfo,));
                 if($newsInfo){
                    return Response::json(array("status"=>"success", $newsInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }
            
        }


        public function insertFlashNews(){
            if(Auth::check()){
                $vals = Input::all();
                $inputs = array("content"=> $vals['data']);
                $values = FlashNews::insertNews($inputs);
                if($values){
                    return Response::json(array("status"=> "success",));
                }
                else{
                    return Response::json(array("status"=> "success"));
                }
                //return Response::json(array('status' => "success", $inputs));
            }
        }


        public function getNewsToEdit(){
            if(Auth::check()){
                $vals = Input::all();
                $values = FlashNews::getNewsToEdit($vals['Nid']);
                if($values){
                    return Response::json(array("status"=> "success", "content"=> $values));
                }
                else{
                    return Response::json(array("status"=> "success"));
                }
                //return Response::json(array('status' => "success", $inputs));
            }
        }    


        public function updateFlashNews(){
            if(Auth::check()){
                $vals = Input::all();
                $newsInfo = FlashNews::updateFlashNews($vals);
                 if($newsInfo){
                    return Response::json(array("status"=>"success",));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }



        public function moveToUp(){
            if(Auth::check()){
                $vals = Input::all();
                $moveInfo = FlashNews::movingUp($vals);
                //return Response::json(array("status"=>"success", $moveInfo));
                 if($moveInfo){
                    return Response::json(array("status"=>"success","data" => $moveInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }


        public function moveToDown(){
            if(Auth::check()){
                $vals = Input::all();
                $moveInfo = FlashNews::movingDown($vals);
                //return Response::json(array("status"=>"success",));
                 if($moveInfo){
                    return Response::json(array("status"=>"success", $moveInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }

        public function getBannerImages(){
            if(Auth::check()){
               $newsInfo = Banner::getBannerImages();
                 if($newsInfo){
                    return Response::json(array("status"=>"success", "data"=> $newsInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }

            }
        }


        public function deleteThisBanner() {
            if(Auth::check()){
                $inputs= Input::all();
                $BannerInfo = Banner::DeletingBanner($inputs['Bid']);

                //return Response::json(array("status"=>$newsInfo,));
                 if($BannerInfo){
                    return Response::json(array("status"=>"success", $BannerInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }
            
        }


        public function moveBannerImageDown(){
            if(Auth::check()){
                $vals = Input::all();
                $moveInfo = Banner::movingDown($vals);
                //return Response::json(array("status"=>"success",));
                 if($moveInfo){
                    return Response::json(array("status"=>"success", $moveInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }


        public function moveBannerImageUp(){
            if(Auth::check()){
                $vals = Input::all();
                $moveInfo = Banner::movingUp($vals);
                //return Response::json(array("status"=>"success", $moveInfo));
                 if($moveInfo){
                    return Response::json(array("status"=>"success","data" => $moveInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }


        public function UploadBannerImages(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/banner_images';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/banner_images/%s', $image->getClientOriginalName()))->resize(770, 577)->save();

                        $completePath = $destinationPath."/".$filename;
                        $store = Banner::insertBannerData($completePath);

                        if($store){
                            return Redirect::to('dashboard/banner');
                        }else{
                            return Redirect::to('dashboard/banner');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('dashboard/banner');
                }
                 
            }
        }


        public function UploadMedia(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );
		
                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);
			
                        if($store){
                            return Redirect::to('media');
                        }else{
                            return Redirect::to('media');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('media');
                }
                 
            }
        }



        public function UploadMediaFromCareer(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('contact_us/career');
                        }else{
                            return Redirect::to('contact_us/career');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('contact_us/career');
                }
                 
            }
        }


        public function UploadMediaFromToddler(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('programs/toddlerMontessori');
                        }else{
                            return Redirect::to('programs/toddlerMontessori');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('programs/toddlerMontessori');
                }
                 
            }
        }


        public function UploadMediaFromSchoolCare(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('programs/schoolCare_Activity');
                        }else{
                            return Redirect::to('programs/schoolCare_Activity');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('programs/schoolCare_Activity');
                }
                 
            }
        }


        public function UploadMediaFromPrimary(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('/programs/primaryMontessori');
                        }else{
                            return Redirect::to('/programs/primaryMontessori');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('/programs/primaryMontessori');
                }
                 
            }
        }


        public function UploadMediaFromHome(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('pages/homePage');
                        }else{
                            return Redirect::to('pages/homePage');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('pages/homePage');
                }
                 
            }
        }


        public function UploadMediaFromMontessori(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('pages/Montessori');
                        }else{
                            return Redirect::to('pages/Montessori');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('pages/Montessori');
                }
                 
            }
        }

        public function UploadMediaFromVision(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('pages/our_vision');
                        }else{
                            return Redirect::to('pages/our_vision');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('pages/our_vision');
                }
                 
            }
        }


        public function UploadMediaFromTieups(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('pages/school_tieups');
                        }else{
                            return Redirect::to('pages/school_tieups');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('pages/school_tieups');
                }
                 
            }
        }


        public function UploadMediaFromTheTeam(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/media_gallery';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/media_gallery/%s', $image->getClientOriginalName()));

                        $completePath = $destinationPath."/".$filename;
                        $store = MediaGallery::InsertImage($completePath);

                        if($store){
                            return Redirect::to('pages/the_team');
                        }else{
                            return Redirect::to('pages/the_team');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('pages/the_team');
                }
                 
            }
        }



        

        public function UploadBirthdayImages(){
            if(Auth::check()){
                $image = Input::file('image');
                $extension = Input::file('image')->getMimeType();
                $final =  explode('/', $extension );

                if ($final[1] == "png" || $final[1] == "jpg" || $final[1] == "jpeg") {
                        $destinationPath = 'assets/images/birthday_images';
                        $filename = $image->getClientOriginalName();

                        Input::file('image')->move($destinationPath, $filename);

                        $image1 = Image::make(sprintf('assets/images/birthday_images/%s', $image->getClientOriginalName()))->resize(260, 233)->save();

                        $completePath = $destinationPath."/".$filename;
                        $store = Birthday::insertBirthdayData($completePath);

                        if($store){
                            return Redirect::to('dashboard/birthday');
                        }else{
                            return Redirect::to('dashboard/birthday');
                        }
                }
                else{
                    Session::put('errorMsg', "Please upload valid file.");
                    return Redirect::to('dashboard/birthday');
                }
                 
            }
        }


        public function getBirthdayImages(){
            if(Auth::check()){
               $newsInfo = Birthday::getBirtdayImages();
                 if($newsInfo){
                    return Response::json(array("status"=>"success", "data"=> $newsInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }

            }
        }



        public function deleteThisBirthday() {
            if(Auth::check()){
                $inputs= Input::all();
                $BirthdayInfo = Birthday::DeletingBirthday($inputs['Bid']);

                //return Response::json(array("status"=>$newsInfo,));
                 if($BirthdayInfo){
                    return Response::json(array("status"=>"success", $BirthdayInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }
        }



        public function moveBirthdayImageDown(){
            if(Auth::check()){
                $vals = Input::all();
                $moveInfo = Birthday::movingDown($vals);
                //return Response::json(array("status"=>"success",));
                 if($moveInfo){
                    return Response::json(array("status"=>"success", $moveInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }



        public function moveBirthdayImageUp(){
            if(Auth::check()){
                $vals = Input::all();
                $moveInfo = Birthday::movingUp($vals);
                //return Response::json(array("status"=>"success", $moveInfo));
                 if($moveInfo){
                    return Response::json(array("status"=>"success","data" => $moveInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }


        public function getAllParentSpeaks(){
            if(Auth::check()){
                $parentInfo = ParentSpeak::getAllParentDetails();
                 if($parentInfo){
                    return Response::json(array("status"=>"success", "data"=> $parentInfo));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
            }
        }


        public function deleteThisParentSpeak() {
            if(Auth::check()){
                $inputs= Input::all();
                $parenInfo = ParentSpeak::DeletingParentPost($inputs['Bid']);

                //return Response::json(array("status"=>$newsInfo,));
                 if($parenInfo){
                    return Response::json(array("status"=>"success", $parenInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }   
        }


        public function statusChange() {
            if(Auth::check()){
                $inputs= Input::all();
                $ststusInfo = ParentSpeak::changingStats($inputs);
                if($ststusInfo){
                    return Response::json(array("status"=>"success", $ststusInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }   
        }


        public function updateParentComment() {
            if(Auth::check()){
                $inputs= Input::all();
                $ststusInfo = ParentSpeak::EditingParentPost($inputs);
                if($ststusInfo){
                    return Response::json(array("status"=>"success", $ststusInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }   
        }

        public function approvingPost() {
            if(Auth::check()){
                $inputs= Input::all();
                $ststusInfo = ParentSpeak::approving($inputs);
                if($ststusInfo){
                    return Response::json(array("status"=>"success", $ststusInfo));
                 }else{
                     return Response::json(array("status"=>"failure",));
                 }
            }   
        }



        /**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
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
	 * GET /admin/{id}/edit
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
	 * PUT /admin/{id}
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
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}