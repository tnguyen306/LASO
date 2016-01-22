<?php
class BillController extends BaseController {
    public function bill($id)
    {
     $details = DB::select('Select ext_id,title,author_id,doc_path,(select first_name || " " || last_name from legislators where legislators.id = author_id) as author, coauthor_id, (select first_name || " " || last_name from legislators where legislators.id = coauthor_id) as coauthor,status,introduced_date,passed_date,amount,text  FROM bills WHERE id=:id',['id' => $id]);
foreach ($details as $detail) {
}
     return View::make('detail')->with(array('eid'=>$detail->ext_id,'title'=>$detail->title,'author'=>$detail->author,'coauthor'=>$detail->coauthor,'status'=>$detail->status,'idate'=>$detail->introduced_date,'pdate'=>$detail->passed_date,'amount'=>$detail->amount,'text'=>$detail->text,'id'=>$id, 'author_id'=>$detail->author_id,'coauthor_id'=>$detail->coauthor_id,'doc_path'=>$detail->doc_path ));
    }
    public function favrm($id,$bid)
    {
     $deleted = DB::delete('delete from favorites where (user_id=? AND bill_id=?)',[$id,$bid]);
     return BillController::bill($bid);
    }

    public function favadd($id,$bid)
    {
     $added = DB::insert('insert into favorites values (NULL,?,?)',[$id,$bid]);
     return BillController::bill($bid);
    }
}
