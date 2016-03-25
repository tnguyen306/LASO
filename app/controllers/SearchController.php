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
        $search = '*'.Input::get('search').'*';
        $state = Input::get('state');
        //testing
        //$results = DB::select('SELECT * FROM fullbill WHERE (match(title,id,description,text) against (:search))',['search'=>$search]);
        $results = DB::select('SELECT * FROM fullbill WHERE ((state = (:state)))',['state'=>$state]);
//hi
        //real
        //$results = DB::select('SELECT * FROM fullbill WHERE ((match(title,id,description,text) against (:search)) AND (state = (:state)))',['search'=>$search,'state'=>$state]);
        return View::make('search')->with('results',$results);
    }
}
