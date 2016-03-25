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
        //soon, add a fulltext field to optimize this, 
        // step 1 (sql) ALTER TABLE bills ADD FULLTEXT ft_index_name(title, id,);
        $results = DB::select('SELECT * FROM bills WHERE ((title like (:search)) OR (id like (:search)) OR (description like (:search))) AND (state like (:state))',['search'=>$search,'state'=>$state]);
        return View::make('search')->with('results',$results);

        return View::make('search');
    }
}
