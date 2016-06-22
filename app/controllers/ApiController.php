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

    public function bills($hi,$low)
    {
        $results = DB::select('Select * from bills limit ($hi-$low) offset $low ?', [$hi,$low]);
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
}
