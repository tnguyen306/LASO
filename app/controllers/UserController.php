<?php

class UserController extends BaseController
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        if(Session::get('admin', 'false')=='true'){
            $users = DB::select('Select * FROM users');

            return View::make('users')->with('users',$users);
        }else{
            return Redirect::to('/adminlogin');
        }
    }
}
