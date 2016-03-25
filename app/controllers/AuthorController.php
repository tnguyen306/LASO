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
         $results1 = DB::select('Select * from fullbill where author_id=:id',['id'=>$id]);
         $results2 = DB::select('Select * from fullbill where coauthor_id=:id2',['id2'=>$id]);

	$legislator = DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$id]);
foreach ($legislator as $leg) {
}
         return View::make('legislator')->with(array('results1'=>$results1,'results2'=>$results2,'leg'=>$leg));
    }
}