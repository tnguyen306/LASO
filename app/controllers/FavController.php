<?php
class FavController extends BaseController {
    public function fav($id)
    {
        $results = array();
        $uid = Session::get('uid', '0'); // make this switch before long
        $favorites = DB::select('Select * from favorites where (user_id=?)',[$id]);
        foreach ($favorites as $favorite){
            //parse
            $t_type=$favorite->type;
            $t_item=trim($favorite->item,' ');
            $t_disp=$t_item;
            $t_items="%".trim($favorite->item,' ')."%";
            $t_id=$favorite->id;
            //search accordingly
            if ($t_type=="bill"){
                $t_res=DB::select('select * from bills where id like :search order by introduced_date DESC limit 5',['search'=>$t_item]);
            }elseif ($t_type=="legislator"){
                $t_res=DB::select('select * from bills where (author_id like ? or coauthor_id like ?) order by introduced_date DESC limit 5',[$t_items,$t_items]);
                $legislator = DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$t_item]);
                foreach ($legislator as $leg) {
                }
                $t_disp=$leg->first_name." ".$leg->last_name;
            } else { //keyword or similar
                $ti=explode("~~",$t_items);
                $t_res=DB::select('SELECT * FROM bills WHERE ((id like :search1) or (description like :search2) or (title like :search3)) and state like :state order by introduced_date DESC limit 10',['search1'=>$ti[0],'search2'=>$ti[0],'search3'=>$ti[0],'state'=>$ti[1]]);
                $t_item=$ti;
            }
            //new array for this iteration
            $t_arr=array("id"=>$t_id,"type"=>$t_type,"item"=>$t_item,"result"=>$t_res,"display"=>$t_disp);
            //now update the master array
            array_push($results,$t_arr);
        }
        return View::make('favorites')->with('results',$results);
    }
    public function rmfav($id)
    {
        $uid = Session::get('uid', '0');
        DB::select('delete from favorites where (id=:did and user_id=:uid)',['did'=>$id,'uid'=>$uid]);
        return Redirect::to('/fav/'.$uid); 
    }
}
