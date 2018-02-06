<?php

class VaultController extends \BaseController {

       	public function login()
	{
		if(Session::get('email')){			
			return Redirect::to('/dashboard');
		}
		else{
			$inputs = Input::all();
			if($inputs){
				if (Auth::attempt(array('email' => $inputs['email'], 'password' => $inputs['password'])))
				{
					$authenticatedUser = Auth::user();
					$userObject=User::find(Auth::id());
                                        Session::put('userId', $userObject->id);
                                        Session::put('firstName', $userObject->first_name);
										Session::put('lastName', $userObject->last_name);
                                        Session::put('email', $userObject->email);
                                        
					return Redirect::to('/dashboard');
				}
			}
		}
		return View::make('pages.admin.auth.login');
	} 
        
    	public function logout() {
		Session::flush();
		Session::flash('message', 'You have successfully logged out of the system.');
		Session::flash('alert-class', 'alert-success');
		return Redirect::to('/');
	}
    
    
	/**
	 * Display a listing of the resource.
	 * GET /vault
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vault/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vault
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vault/{id}
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
	 * GET /vault/{id}/edit
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
	 * PUT /vault/{id}
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
	 * DELETE /vault/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}