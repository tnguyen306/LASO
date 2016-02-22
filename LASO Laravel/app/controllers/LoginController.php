<?php

class LoginController extends BaseController
{
    /**
     * Login related functions
     *
     * @return Response
     */
    public function index()
    {
        return View::make('login');
    }
    public function login()
    {
        $id = Input::get('email');
        $pw = Input::get('password');
        // hash salted with lowecast email
        $salted_hash = md5(strtolower($id).$pw);
        $count = DB::select('Select * FROM users where email=:id',['id'=>$id]);
        if (count($count)==0){
            return Redirect::to('/register');
        }
        else{
            //check pw
            $dbpwraw= DB::select('Select password FROM users where email=:id limit 1',['id'=>$id]);
            // I can't believe I have to do this crap
            $dbpwa = json_decode(json_encode($dbpwraw), true);
            $dbpw=$dbpwa[0]['password'];
            if($salted_hash==$dbpw){
                $uidraw= DB::select('Select id FROM users where email=:id limit 1',['id'=>$id]);
                // I can't believe I have to do this crap
                $uida = json_decode(json_encode($uidraw), true);
                $uid=$uida[0]['id'];
                Session::put('uid', $uid);
                return Redirect::to('/');
            }
            else{
                return Redirect::to('/login');
            }
        }
        return Redirect::to('/');
    }
    public function logout(){
        Session::pull('uid', 'nevermind');
        return Redirect::to('/');
    }
}
