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
        $search = '%'.Input::get('search').'%';
        $state = Input::get('state');
        //testing
        $results = DB::select('SELECT * FROM fullbill WHERE ((id like :search1) or (description like :search2) or (title like :search3)) AND (state = (:state)) limit 50',['search1'=>$search,'search2'=>$search,'search3'=>$search,'state'=>$state]);
        //real
        //$results = DB::select('SELECT * FROM fullbill WHERE ((match(title,id,description,text) against (:search)) AND (state = (:state)))',['search'=>$search,'state'=>$state]);
        return View::make('search')->with('results',$results);
    }
}
