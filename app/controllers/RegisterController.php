<?php

class RegisterController extends BaseController
{
    /**
     * Login related functions
     *
     * @return Response
     */
    public function index()
    {
        return View::make('register');
    }
    public function register()
    {
        $id = Input::get('email');
        $pw = Input::get('password');
        $name = Input::get('name');
        $photo="none: to add";        
        //$photo = Input::get('photo');
        // hash salted with lowecast email
        $salted_hash = md5(strtolower($id).$pw);
        $count = DB::select('Select * FROM users where email=:id',['id'=>$id]);
        // check nonempty
        if ($id==''||$pw==''||$name==''){
            Session::flash('message',"All inputs except photo are required.");
            return Redirect::to('/register');
        }
        
        if (!(count($count)==0)){
            Session::flash('message',"User created. Please log in.");
            return Redirect::to('/login');
            // if exists, log in.
        }
        $newuser = new User;
        $newuser->email = $id;
        $newuser->password = $salted_hash;
        $newuser->name= $name;
        $newuser->photo_path = $photo;
        $newuser->save();
        return Redirect::to('/login');
    }
}
