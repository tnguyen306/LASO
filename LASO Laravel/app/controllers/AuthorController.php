<?php

class AuthorController extends BaseController
{
    /**
     * Get all by author
     *
     * @return Response
     */
    public function index($id)
    {
         $results = DB::select('Select id, ext_id ,title,(first_name ||" " ||last_name) as author,status,introduced_date,coauthor_id FROM (select * from bills join legislators on bills.author_id = legislators.id) where author_id=:id or coauthor_id=:id2',['id'=>$id,'id2'=>$id]);

	$legislator = DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$id]);
foreach ($legislator as $leg) {
}
         return View::make('legislator')->with(array('results'=>$results,'leg'=>$leg));
    }
}
