<?php
include 'app\external\simplediff.php';
class DiffController extends BaseController {
    public function diff($i1,$i2)
    {
     $bill1 = DB::select('Select ext_id,title,author_id,(select first_name || " " || last_name from legislators where legislators.id = author_id) as author, coauthor_id, (select first_name || " " || last_name from legislators where legislators.id = coauthor_id) as coauthor,status,introduced_date,passed_date,amount,text,doc_path  FROM bills WHERE id=:id',['id' => $i1]);
     $bill2 = DB::select('Select ext_id,title,author_id,(select first_name || " " || last_name from legislators where legislators.id = author_id) as author, coauthor_id, (select first_name || " " || last_name from legislators where legislators.id = coauthor_id) as coauthor,status,introduced_date,passed_date,amount,text,doc_path  FROM bills WHERE id=:id',['id' => $i2]);
foreach ($bill1 as $d1) {
}
foreach ($bill2 as $d2) {
}
         $diff =  htmlDiff($d1->text,$d2->text);

         return View::make('compare')->with(array('diff'=>$diff,'d1'=>$d1,'d2'=>$d2));
    }
}
