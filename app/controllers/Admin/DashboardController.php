<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dashboard
	 *
	 * @return Response
	 */
	public function index()
	{
                if(Auth::check()){
                    $admin_name=Session::get('firstName').Session::get('lastName');
                    //events count for dashboard	
                    $event_count = SchoolEvent::getCountOfThisMonth();
                    //for visitors count
                    $visit_count = Tracker::getVisitorsCount();
                    //return $visit_count;
                    $data=compact('admin_name', 'event_count', 'visit_count');
                    return View::make('pages.admin.dashboard',$data);
                }else{
                    return Redirect::to('/');
                }
	}


	public function media()
	{
        if(Auth::check()){
        	$admin_name=Session::get('firstName').Session::get('lastName');
        	$getMediaGallery = MediaGallery::getMediaGallery();
        	$data=compact('admin_name', 'getMediaGallery');
        	return View::make('pages.admin.media',$data);
        }
	}



	public function getMediaGallery()
	{
        if(Auth::check()){
        	$getMediaGallery = MediaGallery::getMediaGallery();
        	if($getMediaGallery){
                return Response::json(array("status"=>"success", "data"=> $getMediaGallery));
            }else{
            	return Response::json(array("status"=>"failure"));
            }        	
        }
	}


	public function DeleteMultipleImages(){
        if(Auth::check()){
        	$inputs=  Input::all();
        	for($i=0;$i<count($inputs['ids']);$i++){
        		$inputsIds['id'] = $inputs['ids'][$i];
        		$send_data = MediaGallery::deleteImages($inputsIds);
        	}
        	if($send_data){
                return Response::json(array("status"=>"success",));
            }else{
            	return Response::json(array("status"=>"failure"));
            } 
        }
	}



	/**
	 * Show the form for creating a new resource.
	 * GET /dashboard/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dashboard
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dashboard/{id}
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
	 * GET /dashboard/{id}/edit
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
	 * PUT /dashboard/{id}
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
	 * DELETE /dashboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}