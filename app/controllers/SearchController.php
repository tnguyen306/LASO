<?php

class SearchController extends BaseController
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('find');
    }
    public function find()
    {
        $search = Input::get('search');
        $state = Input::get('state');
        //$results = DB::select('SELECT * FROM fullbill WHERE ((match (title,id,description,text) against (:search)) AND (state like (:state)))',['search'=>$search,'state'=>$state]);
        $results = DB::select('SELECT * FROM fullbill WHERE title like :search',['search'=>$search]);
        return View::make('search')->with('results',$results);
    }
}
