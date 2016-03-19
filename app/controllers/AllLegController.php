<?php

class AllLegController extends BaseController
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
         $results = DB::select('Select * from legislators');

         return View::make('legislators')->with('results',$results);

        return View::make('legislators');
    }
}
