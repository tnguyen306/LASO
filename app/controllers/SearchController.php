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
         $results = DB::select('Select * from fullbill');

         return View::make('search')->with('results',$results);

        return View::make('search');
    }
}
