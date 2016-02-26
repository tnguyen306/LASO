<?php

class CompareController extends BaseController
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index($id)
    {
         $results = DB::select('select * from fullbill');

         return View::make('selectcompare')->with(array('results'=>$results,'parent'=>$id));
    }
}
