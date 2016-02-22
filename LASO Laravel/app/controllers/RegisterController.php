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
        $photo = Input::get('photo');
        // hash salted with lowecast email
        $salted_hash = md5(strtolower($id).$pw);
        $count = DB::select('Select * FROM users where email=:id',['id'=>$id]);
        // check nonempty
        if ($id==''||$pw==''||$name==''||$photo==''){
            return Redirect::to('/register');
        }
        
        if (!(count($count)==0)){
            return Redirect::to('/login');
            // if exists, log in. Should add notificaitions for user later
        }
        $uidraw= DB::select('Select id FROM users where email=:id limit 1',['id'=>$id]);
        // I can't believe I have to do this crap
        $uida = json_decode(json_encode($uidraw), true);
        $uid=$uida[0]['id'];
        Session::put('uid', $uid);
        $count = DB::insert('insert into users values (NULL,?,?,?,?) ',[$id,$name,$photo,$salted_hash]);
        Session::put('uid', $uid);
        return Redirect::to('/');
    }
}
