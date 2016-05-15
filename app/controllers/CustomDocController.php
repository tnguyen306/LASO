<?php
//user uploaded documents
class CustomDocController extends BaseController {
    public function landing()
    {
        $docs = DB::table('docs')->get();
        return View::make('docland')->with(array('docs'=>$docs));
    }
    public function show($id)
    {
        $doc = DB::table('docs')->where('id', $id)->first();
        return View::make('doctext')->with(array('doc'=>$doc));
    }
    public function select_compare($id)
    {
        $docs = DB::table('docs')->get();
        return View::make('scdoc')->with(array('orig_id'=>$id));
    }
    public function create()
    {
        return View::make('createdoc');
    }
    public function edit($id)
    {
        // add this function
        // add security
        $doc = DB::table('docs')->where('id', $id)->first();
        return View::make('editdoc')->with(array('doc'=>$doc));
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
    public function edit_post()
    {
        // add this function
        // add security
        $uid = Session::get('uid', '0');
        $newdoc = DB::table('docs')->where('id', $id)->first();
        $newdoc->user_id =$uid;
        $newdoc->title=Input::get('title');
        $newdoc->text=Input::get('text');
        $newdoc->description=Input::get('description');
        $newdoc->sharing=Input::get('sharing');
        $newdoc->save();
        Session::flash('message',Input::get('title').' has been edited');
        return Redirect::to('/docs/');
    }
    public function compare($id1,$id2)
    {
        $doc1 = DB::table('docs')->where('id', $id1)->first();
        $doc2 = DB::table('docs')->where('id', $id2)->first();
        return View::make('docdiff')->with(array('doc1'=>$doc1,'doc2'=>$doc2));
    }
}
