<?php
include '/home/lasoadmin/laso/app/external/simplediff.php';
class DiffController extends BaseController {
    public function diff($i1,$i2)
    {
     $bill1 = DB::select('Select * from fullbill WHERE id=:id',['id' => $i1]);
     $bill2 = DB::select('Select * FROM fullbill WHERE id=:id',['id' => $i2]);
foreach ($bill1 as $d1) {
}
foreach ($bill2 as $d2) {
}
         $diff =  htmlDiff($d1->text,$d2->text);

         return View::make('compare')->with(array('diff'=>$diff,'d1'=>$d1,'d2'=>$d2));
    }
}
