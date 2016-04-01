<?php
class FavController extends BaseController {
    public function fav($id)
    {
        $results = array(); 
        $favorites = DB::select('Select * from favorites where user_id=?',[$id]);
        foreach ($favorites as $favorite){
            //parse
            $t_type="%".$favorite->type."%";
            $t_item=$favorite->item;
            $t_id=$favorite->id;
            //search accordingly
            if ($t_type=="bill"){
                $t_res=DB::select('select * from fullbill where id like :search order by updated_at DESC limit 5',['search'=>$t_item]);
            } elseif ($t_type=="legislator"){
                $t_res=DB::select('select * from fullbill where (a_id like ? or b_id like ?) order by updated_at DESC limit 5',[$t_item,$t_item]);
            } else { //keyword or similar
                $t_res=DB::select('SELECT * FROM fullbill WHERE ((id like :search1) or (description like :search2) or (title like :search3)) order by updated_at DESC limit 10',['search1'=>$t_item,'search2'=>$t_item,'search3'=>$t_item]);
            }
            //new array for this iteration
            $t_arr=array("id"=>$t_id,"type"=>$t_type,"item"=>$t_item,"result"=>$t_res);
            //now update the master array
            array_push($results,$t_arr);
        }
        return View::make('favorites')->with('results',$results);
    }
}
