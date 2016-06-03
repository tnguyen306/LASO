<?php

class AllLegController extends BaseController
{
    /**
     * Show legislators in table, by state or not
     *
     * @return Response
     */
    public function index()
    {
         $results = DB::select('Select * from legislators');

         return View::make('legislators')->with(array('results'=>$results,'state'=>'All'));
    }
    public function bystate($state)
    {
         $results = DB::select('Select * from legislators where state like ?',[$state]);

         return View::make('legislators')->with(array('results'=>$results,'state'=>strtoupper($state)));

        return View::make('legislators');
    }
}
