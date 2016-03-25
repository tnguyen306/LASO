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
        $search = Input::get('email');
        $state = Input::get('state');
        $results = DB::select('SELECT * FROM bills WHERE (MATCH (title,description) AGAINST (:search)) AND (MATCH state AGAINST (:state))',['search'=>$search,'state'=>$state]);
        return View::make('search')->with('results',$results);

        return View::make('search');
    }
}
