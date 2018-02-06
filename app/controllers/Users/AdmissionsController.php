<?php

class AdmissionsController extends \BaseController {


		public function enquiryPost(){
                $inputs=  Input::all();  
                $result = Enquiry::insertPost($inputs);
                if($result){
                    return Response::json(array("status"=>"success", $result));
                 }else{
                     return Response::json(array("status"=>"failure", $result));
                 }
        }



        public function deleteEnquiry(){
        	if(Auth::check()){
        		$inputs = Input::all();
        		$data = Enquiry::deleteEnquiry($inputs);
        		if($data){
                    return Response::json(array("status"=>"success", $data));
                 }else{
                     return Response::json(array("status"=>"failure"));
                 }
        	}
        }


	/**
	 * Display a listing of the resource.
	 * GET /users/admissions
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/admissions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users/admissions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/admissions/{id}
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
	 * GET /users/admissions/{id}/edit
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
	 * PUT /users/admissions/{id}
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
	 * DELETE /users/admissions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}