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
    public function landing()
    {
        return View::make('landing');
    }
    public function find()
    {
        $search = '%'.trim(Input::get('search')).'%';
        $state = Input::get('state');
        $results = DB::select('SELECT * FROM fullbill WHERE ((id like :search1) or (description like :search2) or (title like :search3)) AND (state like (:state)) limit 50',['search1'=>$search,'search2'=>$search,'search3'=>$search,'state'=>$state]);
        return View::make('search')->with(array('results'=>$results,'query'=>Input::get('search')));
    }
    public function favadd($query)
    {
        $uid = Session::get('uid', '0');
        if ($uid=='0'){
            Session::flash('message','Log in to favorite');
        }else{
            $newfav = new Favorite;
            $newfav->user_id =$uid;
            $newfav->type="search";
            $newfav->item=$query;
            $newfav->save();
            Session::flash('message','new query added to favorites');
            return Redirect::to('/fav/'.$uid);
        }
    }
}
