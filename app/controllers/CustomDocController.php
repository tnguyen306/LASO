<?php
//user uploaded documents
class CustomDocController extends BaseController {
    public function landing()
    {
        $uid = Session::get('uid', '0');
        $docs = DB::table('docs')->where('user_id', $uid)->get();
        $shared = DB::table('docs')->where('sharing','like', '%*'.$uid.'*%')->get();
        $public = DB::table('docs')->where('sharing', 'public')->get(); 
        return View::make('docland')->with(array('docs'=>$docs,'shared'=>$shared,'public'=>$public));
    }
    public function show($id)
    {
        $doc = DB::table('docs')->where('id', $id)->first();
        $uid = Session::get('uid', '0');
        if (($doc->user_id==$uid)or((strpos($doc->sharing, '*'.$uid.'*') !== false))or($doc->sharing=='public')){ // can view if owned or shared
            return View::make('doctext')->with(array('doc'=>$doc));
        }else{
            Session::flash('message','Insufficent permission for document '.$id);
            return Redirect::to('/docs/');
        }
    }
    public function select_compare($id)
    {
        $uid = Session::get('uid', '0');
        $docs = DB::table('docs')->where('user_id', $uid)->get();
        $shared = DB::table('docs')->where('sharing','like', '%*'.$uid.'*%')->get();
        $public = DB::table('docs')->where('sharing', 'public')->get(); 
        return View::make('scdoc')->with(array('id'=>$id,'docs'=>$docs,'shared'=>$shared,'public'=>$public));
    }
    public function create()
    {
        return View::make('createdoc');
    }
    public function edit($id)
    {
        // add security
        $doc = DB::table('docs')->where('id', $id)->first();
        $uid = Session::get('uid', '0');
        if ($doc->user_id == $uid){ // can edit if owned
            return View::make('editdoc')->with(array('doc'=>$doc));
        }else{ 
            Session::flash('message','Insufficent permission for document '.$id);
            return Redirect::to('/docs/');
        }
    }
    public function delete($id)
    {
        // add security
        $doc = DB::table('docs')->where('id', $id)->first();
        $uid = Session::get('uid', '0');
        if ($doc->user_id == $uid){ // can edit if owned
            return View::make('docdel')->with(array('doc'=>$doc));
        }else{ 
            Session::flash('message','Insufficent permission for document '.$id);
            return Redirect::to('/docs/');
        }
    }
    public function create_post()
    {
        $uid = Session::get('uid', '0');
        $newdoc = new Document;
        $newdoc->user_id =$uid;
        $newdoc->title=Input::get('title');
        $newdoc->text=Input::get('text');
        $newdoc->description=Input::get('description');
        $newdoc->sharing=Input::get('sharing');
        $newdoc->save();
        Session::flash('message','Your document, '.Input::get('title').' has been created');
        return Redirect::to('/docs/');
    }
    public function delete_post($id)
    {
        // add this function
        // add security
        $uid = Session::get('uid', '0');
        $doc = DB::table('docs')->where('id', $id)->first();
        if ($doc->user_id == $uid){
            DB::delete('delete from docs where id = ?', array($id));
            Session::flash('message','the document has been deleted');
        }else{
            Session::flash('message','Insufficent permission for delete');
        }
        return Redirect::to('/docs/');
    }
    public function edit_post($id)
    {
        // add this function
        // add security
        $uid = Session::get('uid', '0');
        $doc = DB::table('docs')->where('id', $id)->first();
        if ($doc->user_id == $uid){
            $newdoc = Document::where('id', $id)->first();
            $newdoc->user_id =$doc->user_id;
            $newdoc->title=Input::get('title');
            $newdoc->text=Input::get('text');
            $newdoc->description=Input::get('description');
            $newdoc->sharing=Input::get('sharing');
            $newdoc->save();
            Session::flash('message',Input::get('title').' has been edited');
        }else{
            Session::flash('message','Insufficent permission for edit');
        }
        return Redirect::to('/docs/');
    }
    public function compare($id1,$id2)
    {
        $uid = Session::get('uid', '0');
        $doc1 = DB::table('docs')->where('id', $id1)->first();
        $doc2 = DB::table('docs')->where('id', $id2)->first();
        if ((($doc1->user_id==$uid)or(strpos($doc1->sharing, '*'.$uid.'*') !== false)or($doc1->sharing=='public'))and(($doc2->user_id==$uid)or(strpos($doc2->sharing, '*'.$uid.'*') !== false)or($doc2->sharing=='public'))){ // can view if both owned or shared
            return View::make('docdiff')->with(array('doc1'=>$doc1,'doc2'=>$doc2));
        }else{
            Session::flash('message','Insufficent permission');
        }
    }
}
