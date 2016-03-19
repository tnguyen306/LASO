<?php
class BillController extends BaseController {
    public function bill($id)
    {
     $details = DB::select('Select * from fullbill where id=:id',['id' => $id]);
foreach ($details as $detail) {
}
     return View::make('detail')->with(array('eid'=>$detail->ext_id,'title'=>$detail->title,'author'=>$detail->author,'coauthor'=>$detail->coauthor,'status'=>$detail->status,'idate'=>$detail->introduced_date,'pdate'=>$detail->passed_date,'amount'=>$detail->amount,'text'=>$detail->text,'id'=>$id, 'author_id'=>$detail->author_id,'coauthor_id'=>$detail->coauthor_id,'doc_path'=>$detail->doc_path,'description'=>$detail->description ));
    }
    public function favrm($id,$bid)
    {
     $deleted = DB::delete('delete from favorites where (user_id=? AND bill_id=?)',[$id,$bid]);
     Session::flash('message',$bid." removed from favorites");
     return BillController::bill($bid);
    }

    public function favadd($id,$bid)
    {
        //$added = DB::insert('insert into favorites values (NULL,?,?)',[$id,$bid]);
        $newfav = new Favorite;
        $newfav->user_id =$id;
        $newfav->bill_id=$bid;
        $newfav->save();
        Session::flash('message',$bid." added to favorites");
        return BillController::bill($bid);
    }
}
