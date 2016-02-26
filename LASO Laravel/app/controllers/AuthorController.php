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
         $results = DB::select('Select * from fullbill where author_id=:id or coauthor_id=:id2',['id'=>$id,'id2'=>$id]);

	$legislator = DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$id]);
foreach ($legislator as $leg) {
}
         return View::make('legislator')->with(array('results'=>$results,'leg'=>$leg));
    }
}
