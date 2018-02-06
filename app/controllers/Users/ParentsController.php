<?php

class ParentsController extends \BaseController {




	public function feedback(){

        	$page = ParentSpeak::getParentsSpeaksForFrontend();
        	//$page = $page[0];
        	$data1 = compact('page');
            return View::make('pages.users.parentscorner.feedback', $data1);
        }


        public function ParentSpeakFromUserEnd(){
                $inputs =  Input::all(); 
                //return Response::json(array("status"=> $inputs));
                $user_data=ParentSpeak::InsertParentSpeak($inputs);
                if($user_data){
                    return Response::json(array("status"=>"success", ));
                }else{
                     return Response::json(array("status"=>"failure"));
                }
        }


        public function events(){

        	//$page = ParentSpeak::getParentsSpeaksForFrontend();
        	//$page = $page[0];
        	//$data1 = compact('page');
            return View::make('pages.users.parentscorner.events');
        }



	/**
	 * Display a listing of the resource.
	 * GET /users/parents
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/parents/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users/parents
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/parents/{id}
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
	 * GET /users/parents/{id}/edit
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
	 * PUT /users/parents/{id}
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
	 * DELETE /users/parents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}