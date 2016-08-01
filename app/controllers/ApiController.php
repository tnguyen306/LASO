<?php

class ApiController extends BaseController
{
    // no security at all, need to work on api keys or user ids
    public function docs()
    {
        $results = DB::select('Select * from docs');
        return Response::json($results)->setCallback(Input::get('callback'));
    }

    public function doc($id)
    {
        $results = DB::table('docs')->where('id', $id)->get();
        return Response::json($results)->setCallback(Input::get('callback'));
    }

    public function bills($size,$low)
    {
        $results = DB::select('Select * from bills limit ? offset ?', [$size,$low]);
        return Response::json($results)->setCallback(Input::get('callback'));
    }

    public function bill($id)
    {
        $results = DB::table('bills')->where('id', $id)->get();
        return Response::json($results)->setCallback(Input::get('callback'));
    }

    public function legislators()
    {
        $results = DB::select('Select * from legislators');
        return Response::json($results)->setCallback(Input::get('callback'));
    }

    public function legislator($id)
    {
        $results = DB::table('legislators')->where('id', $id)->get();
        return Response::json($results)->setCallback(Input::get('callback'));
    }
    public function keyget($user,$pw) # get a user's key from hashed credentials
    {
        $results = DB::table('users')->where('email', $user)->first();
        $resp_key = array( "key" => "");
        if ($results->password==$pw){
            $resp_key["key"] = $results->authkey;
            return Response::json($resp_key)->setCallback(Input::get('callback'));
        } else {
            $resp_key["key"]="failure";
            return Response::json($resp_key)->setCallback(Input::get('callback'));
        }

    }
}
