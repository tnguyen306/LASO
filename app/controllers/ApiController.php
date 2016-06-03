<?php

class ApiController extends BaseController
{
    // no security at all, need to work on api keys or user ids
    public function docs()
    {
        $docs = DB::table('docs')->get();
        return json_encode($results)
    }
    
    public function doc($id)
    {
        $docs = DB::table('docs')->where('id', $id)->get();
        return json_encode($results)
    }

    public function bills()
    {
        $results = DB::select('Select * from bills');
        return json_encode($results)
    }

    public function bill($id)
    {
        $docs = DB::table('bills')->where('id', $id)->get();
        return json_encode($results)
    }

    public function legislators()
    {
        $results = DB::select('Select * from legislators');
        return json_encode($results)
    }

    public function legislator($id)
    {
        $docs = DB::table('legislators')->where('id', $id)->get();
        return json_encode($results)
    }
}
