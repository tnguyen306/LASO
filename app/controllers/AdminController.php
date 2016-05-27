<?php

class AdminController extends BaseController
{
    // make admin menu
    public function index()
    {   
        if(Session::get('admin', 'false')=='true'){
            return View::make('adminmenu');
        }else{
            return Redirect::to('/adminlogin');
        }
    }
    public function adminloginpage()
    {   
        // Make login page to allow admin functions

        return View::make('adminlogin');
    }
    public function adminlogin()
    {   
        $pw = Input::get('password');
        if ($pw=="lasoadmin"){
            Session::flash('message',"Admin log in successful.");
            Session::put('admin', "true");
            return Redirect::to('/admin');
        }else{
            Session::flash('message',"Unsuccessful login.");
            return Redirect::to('/adminlogin');
        }
    }
    public function adminlogout()
    {   
        Session::put('admin', "false");
        Session::flash('message',"Logged out of any admin session.");
        return Redirect::to('/');
    }
    public function billmenu($id)
    {
     if(Session::get('admin', 'false')=='true'){
        $details = DB::select('Select * from fullbill where id=:id',['id' => $id]);
foreach ($details as $detail) {
}
        return View::make('billedit')->with(array('eid'=>$detail->ext_id,'title'=>$detail->title,'author'=>$detail->author,'coauthor'=>$detail->coauthor,'status'=>$detail->status,'idate'=>$detail->introduced_date,'pdate'=>$detail->passed_date,'amount'=>$detail->amount,'text'=>$detail->text,'id'=>$id, 'author_id'=>$detail->author_id,'coauthor_id'=>$detail->coauthor_id,'doc_path'=>$detail->doc_path,'description'=>$detail->description ));
     }else{
        Session::flash('message',"insufficient permission");
        return Redirect::to('/bill/'.$id);
    }
    }
    public function edittext($id)
    {
        if(Session::get('admin', 'false')=='true'){
                if (Input::get('billtext')==''||Input::get('title')==''||Input::get('status')==''||Input::get('idate')==''||Input::get('pdate')==''||Input::get('doc_path')==''){
                Session::flash('message',"All inputs are required.");
                return Redirect::to('/edit/'.$id);
            }
            $newbill= array('text'=>Input::get('billtext'),'title'=>Input::get('title'),'status'=>Input::get('status'),'introduced_date'=>Input::get('idate'),'passed_date'=>Input::get('pdate'),'doc_path'=>Input::get('doc_path'),'description'=>Input::get('description'));
            Bill::where('id',$id)
                ->update($newbill);
            Session::flash('message',"Bill ".$id." edited.");
            return Redirect::to('/');
        }else{
            Session::flash('message',"insufficient permission");
            return Redirect::to('/bill/'.$id);
        }
    }
}
