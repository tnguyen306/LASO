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
         $results = DB::select('Select id, ext_id ,title,(first_name ||" " ||last_name) as author,status,introduced_date FROM (select * from bills join legislators on bills.author_id = legislators.id)');

         return View::make('selectcompare')->with(array('results'=>$results,'parent'=>$id));
    }
}
