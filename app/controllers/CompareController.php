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
         return View::make('findCompare')->with(array('parent'=>$id));
    }
    public function find($id)
    {
        $search = '%'.Input::get('search').'%';
        $state = Input::get('state');
        $results = DB::select('SELECT * FROM fullbill WHERE ((id like :search1) or (description like :search2) or (title like :search3)) AND (state = (:state)) limit 50',['search1'=>$search,'search2'=>$search,'search3'=>$search,'state'=>$state]);
        return View::make('selectcompare')->with(array('results'=>$results,'parent'=>$id));
    }
}
