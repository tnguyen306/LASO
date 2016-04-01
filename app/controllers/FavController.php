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
            $t_items="%".trim($favorite->item,' ')."%";
            $t_id=$favorite->id;
            //search accordingly
            if ($t_type=="bill"){
                $t_res=DB::select('select * from fullbill where id like :search order by updated_at DESC limit 5',['search'=>$t_items]);
            }elseif ($t_type=="legislator"){
                $t_res=DB::select('select * from fullbill where (a_id like ? or b_id like ?) order by updated_at DESC limit 5',[$t_items,$t_items]);
                $legislator = DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$t_item]);
                foreach ($legislator as $leg) {
                }
                $t_item=$leg->first_name." ".$leg->last_name;
            } else { //keyword or similar
                $t_res=DB::select('SELECT * FROM fullbill WHERE ((id like :search1) or (description like :search2) or (title like :search3)) order by updated_at DESC limit 10',['search1'=>$t_items,'search2'=>$t_items,'search3'=>$t_items]);
            }
            //new array for this iteration
            $t_arr=array("id"=>$t_id,"type"=>$t_type,"item"=>$t_items,"result"=>$t_res,"display"=>$t_item);
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
