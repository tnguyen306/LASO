<?php
require_once('pdf_to_text.php');
class BillTableSeeder extends Seeder {

    public function run_state($state,$session)
    {
        $json = file_get_contents('http://openstates.org/api/v1//bills/?state='.$state.'&last_action_since=2015-10-10&apikey=e2f56937c8c74a67a0f6133152f0c2f2');
        $js = json_decode($json);

        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($json, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

        $ids=array();
        foreach ($jsonIterator as $key => $val) {
	        if(strcmp($key,"bill_id")==0){
		        array_push($ids,$val);
	        }
        }
        echo count($ids). " bills to import from ".$state. "\n";


        for ($x = 0; $x < count($ids); $x++) {
            $urladd = str_replace(' ','%20',$ids[$x]);
            echo $urladd . "\n";
	        try{$json2 = file_get_contents('http://openstates.org/api/v1//bills/'.$state.'/'.$session.'/'.$urladd.'/?apikey=e2f56937c8c74a67a0f6133152f0c2f2');
            $js2 = json_decode($json2);
            $jsonIterator2 = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($json2, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);
            foreach ($jsonIterator2 as $k2 => $v2) {
	            if(strcmp($k2,"title")==0){
		            $ititle=$v2;
	        }elseif(strcmp($k2,"description")==0){
		            $idesc=$v2;
	        }elseif(strcmp($k2,"state")==0){
		            $istate=$v2;
	        }elseif(strcmp($k2,"sponsors")==0){
			        $iauthor=$v2[0]['leg_id'];
                    try{
                        $icoauthor=$v2[1]['leg_id'];
                    }catch(Exception $e){
                        $pass_var=1;
                    }
	        }elseif(strcmp($k2,"updated_at")==0){
		            $iupdated=$v2;
	        }elseif(strcmp($k2,"created_at")==0){
		            $icreated=$v2;
	        }elseif(strcmp($k2,"versions")==0){
                    $r=0; // revision number                   
                    foreach ($v2 as $w2) {
                        
                        // set unset variables
                        if(isset($idesc)){
                        $idesc=$idesc;
                        }else{
                        $idesc="No Description Found";
                        }
                        if(isset($icoauthor)){
                        $icoauthor=$icoauthor;
                        }else{
                        $icoauthor="1";
                        }
                        // manage revisions
                        $r=$r+1;            
                        $iurl = $w2['url']; // url
                        //different states have different methods for full text
                        $itxt="Error in Fetch; try path for now";
                        if($istate=='ga'){
                            //pdf
                            $itxt=pdf2text($w2['url']); // pdf text
                        }else{
                            //html
                            $doc = new DOMDocument;
                            $doc->load("http://mysite.com");
                            $xpath = new DOMXpath($doc);
                            $elements = $xpath->query("*/div[@id='pre']");
                        }
                        // push this revision to the database
                        $new_derived_key = $istate.$ids[$x].'r'.strval($r);
                        $newbill = new Bill;
                        $newbill->id =$new_derived_key;
                        $newbill->state=$istate;
                        $newbill->ext_id =$istate.$ids[$x].' rev'.strval($r);
                        $newbill->title=$ititle;
                        $newbill->text =$itxt;
                        $newbill->amount="coming";
                        $newbill->status ="status";
                        $newbill->introduced_date=$icreated;
                        $newbill->passed_date =$iupdated;
                        $newbill->revision_id=strval($r);
                        $newbill->doc_path =$iurl;
                        $newbill->author_id=$iauthor;
                        $newbill->coauthor_id =$icoauthor;
                        $newbill->save();
                    }
	        }

        }
    }catch(Exception $e){
        print $e;
            }
        }
    }
    public function run()
    {
        self::run_state('ga','2015_16');
        self::run_state('fl','2016');
    }
}
