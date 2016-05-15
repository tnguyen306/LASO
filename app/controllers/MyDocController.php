<?php
//THIS ISN'T USED
class BillController extends BaseController {
    public function doc($id)
    {
     $details = DB::select('Select * from documents where id=:id limit 1',['id' => $id])[0];
     return View::make('docview')->with(array('eid'=>$detail->ext_id,'title'=>$detail->title,'author'=>$authname,'coauthor'=>$cauthname,'status'=>$detail->status,'idate'=>$detail->introduced_date,'pdate'=>$detail->passed_date,'amount'=>$detail->amount,'text'=>$detail->text,'id'=>$id, 'author_id'=>$detail->author_id,'coauthor_id'=>$detail->coauthor_id,'doc_path'=>$detail->doc_path,'description'=>$detail->description ));
    }
    public function create()
    {
        $uid = Session::get('uid', '0');
        //$added = DB::insert('insert into favorites values (NULL,?,?)',[$id,$bid]);
        $newfav = new Favorite;
        $newfav->user_id =$id;
        $newfav->type="bill";
        $item = explode('rev',$bid);
        $newfav->item=$item[0];
        $newfav->save();
        Session::flash('message','bill'.$item[0]." added to favorites");
        return Redirect::to('/fav/'.$uid);
    }
    public function edit($id)
    {
        $uid = Session::get('uid', '0');
        $newbill= array('text'=>Input::get('billtext'),'title'=>Input::get('title'),'status'=>Input::get('status'),'introduced_date'=>Input::get('idate'),'passed_date'=>Input::get('pdate'),'doc_path'=>Input::get('doc_path'),'description'=>Input::get('description'));
            Bill::where('id',$id)
                ->update($newbill);
        $newfav = new Favorite;
        $newfav->user_id =$id;
        $newfav->type="bill";
        $item = explode('rev',$bid);
        $newfav->item=$item[0];
        $newfav->save();
        Session::flash('message','bill'.$item[0]." added to favorites");
        return Redirect::to('/fav/'.$uid);
    }
}
