<?php
require_once('pdf_to_text.php');
class BillTableSeeder extends Seeder {
    public function run_national($chamber)
    {
        $json = file_get_contents('congress.api.sunlightfoundation.com/bills?chamber='.$chamber.'&apikey=e2f56937c8c74a67a0f6133152f0c2f2');
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
        echo count($ids). " bills to import from ".$chamber. "\n\n\n\n";


        for ($x = 0; $x < count($ids); $x++) {
            $urladd = str_replace(' ','%20',$ids[$x]);
            $session = str_replace(' ','%20',$session);
            echo $state.$urladd . "\n";
	        try{$json2 = file_get_contents('http://openstates.org/api/v1//bills/'.$state.'/'.$session.'/'.$urladd.'/?apikey=e2f56937c8c74a67a0f6133152f0c2f2');
            //$js2 = json_decode($json2);
           // $jsonIterator2 = new RecursiveIteratorIterator(
                //new RecursiveArrayIterator(json_decode($json2, TRUE)),
                //RecursiveIteratorIterator::SELF_FIRST);
            $jsonIterator2=json_decode($json2,true);
            $ititle=$jsonIterator2['title'];
	        //$idesc=$jsonIterator2['description'];
	        $istate=$jsonIterator2['state'];
	        $v2=$jsonIterator2['sponsors'];
            $iauthor="0";
            $icoauthor="1";
            try{
                $iauthor=trim($v2[0]['leg_id'],' ');
                $icoauthor=trim($v2[1]['leg_id'],' ');
            }catch(Exception $e){
                $pass_var=1;
            }
		    $iupdated=$jsonIterator2['updated_at'];
		    $icreated=$jsonIterator2['created_at'];
	        $v2=$jsonIterator2['versions'];
            $r=0; // revision number                   
            foreach ($v2 as $w2) {
                
                // set unset variables
                if(isset($idesc)){
                    $idesc=$idesc;
                }else{
                    $idesc="No Description Found";
                }
                // manage revisions
                $r=$r+1;            
                $iurl = $w2['url']; // url
                $mimetype = $w2['mimetype'];
                //different states have different methods for full text
                $itxt="Error in Fetch; try path for now";
                try{
                    if((strcmp($mimetype,"application/pdf")==0) or (substr($w2['url'],-3,3)=='pdf') or (substr($w2['url'],-3,3)=='PDF')){
                            $itxt=pdf2text($w2['url']); // pdf text
                            echo $w2['url']. "\n";
                    }else{
                        //html rules
                        if(strcmp($istate,'fl')==0){
                            echo ("fl method: ");
                            echo $w2['url']. "\n";
                            $dom = new domDocument('1.0', 'utf-8');
                            $ihtml =file_get_contents($w2['url']);
                            $dom->loadHTML($ihtml);
                            $pre= $dom->getElementsByTagName('pre');
                            $itxt = $pre->item(0)->nodeValue;
                        }elseif(strcmp($istate,'ca')==0){
                            //ca messes EVERYTHING up, so we have to make our own terrible parser
                            echo ("ca method: ");
                            echo $w2['url']. "\n";
                            $dom = new domDocument('1.0', 'utf-8');
                            $ihtml =file_get_contents($w2['url']);
                            $itxt="<div><div><div><div>".explode('<div id="bill">',$ihtml)[1];
                            $itxt=str_replace("</body>"," ",$itxt);
                            $itxt=str_replace("</html>"," ",$itxt);
                        }else{
                            echo ("general method: ");
                            echo $w2['url']. "\n";
                            $dom = new domDocument('1.0', 'utf-8');
                            $ihtml =file_get_contents($w2['url']);
                            $dom->loadHTML($ihtml);
                            $pre= $dom->getElementsByTagName('body');
                            $itxt = $pre->item(0)->nodeValue;
                        }
                        }
                    }catch(Exception $e){
                $pass_var=1;
                 echo ("error in textget". "\n");
                 echo ($e);
                }try{
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
                }catch(Exception $e){
                $pass_var=1;
                 echo ("error in save". "\n");
                }
        }
    }catch(Exception $e){
        print $e;
            }
        }
    }
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
        echo count($ids). " bills to import from ".$state. "\n\n\n\n";


        for ($x = 0; $x < count($ids); $x++) {
            $urladd = str_replace(' ','%20',$ids[$x]);
            $session = str_replace(' ','%20',$session);
            echo $state.$urladd . "\n";
	        try{$json2 = file_get_contents('http://openstates.org/api/v1//bills/'.$state.'/'.$session.'/'.$urladd.'/?apikey=e2f56937c8c74a67a0f6133152f0c2f2');
            //$js2 = json_decode($json2);
           // $jsonIterator2 = new RecursiveIteratorIterator(
                //new RecursiveArrayIterator(json_decode($json2, TRUE)),
                //RecursiveIteratorIterator::SELF_FIRST);
            $jsonIterator2=json_decode($json2,true);
            $ititle=$jsonIterator2['title'];
	        //$idesc=$jsonIterator2['description'];
	        $istate=$jsonIterator2['state'];
	        $v2=$jsonIterator2['sponsors'];
            $iauthor="0";
            $icoauthor="1";
            try{
                $iauthor=trim($v2[0]['leg_id'],' ');
                $icoauthor=trim($v2[1]['leg_id'],' ');
            }catch(Exception $e){
                $pass_var=1;
            }
		    $iupdated=$jsonIterator2['updated_at'];
		    $icreated=$jsonIterator2['created_at'];
	        $v2=$jsonIterator2['versions'];
            $r=0; // revision number                   
            foreach ($v2 as $w2) {
                
                // set unset variables
                if(isset($idesc)){
                    $idesc=$idesc;
                }else{
                    $idesc="No Description Found";
                }
                // manage revisions
                $r=$r+1;            
                $iurl = $w2['url']; // url
                $mimetype = $w2['mimetype'];
                //different states have different methods for full text
                $itxt="Error in Fetch; try path for now";
                try{
                    if((strcmp($mimetype,"application/pdf")==0) or (substr($w2['url'],-3,3)=='pdf') or (substr($w2['url'],-3,3)=='PDF')){
                            $itxt=pdf2text($w2['url']); // pdf text
                            echo $w2['url']. "\n";
                    }else{
                        //html rules
                        if(strcmp($istate,'fl')==0){
                            echo ("fl method: ");
                            echo $w2['url']. "\n";
                            $dom = new domDocument('1.0', 'utf-8');
                            $ihtml =file_get_contents($w2['url']);
                            $dom->loadHTML($ihtml);
                            $pre= $dom->getElementsByTagName('pre');
                            $itxt = $pre->item(0)->nodeValue;
                        }elseif(strcmp($istate,'ca')==0){
                            //ca messes EVERYTHING up, so we have to make our own terrible parser
                            echo ("ca method: ");
                            echo $w2['url']. "\n";
                            $dom = new domDocument('1.0', 'utf-8');
                            $ihtml =file_get_contents($w2['url']);
                            $itxt="<div><div><div><div>".explode('<div id="bill">',$ihtml)[1];
                            $itxt=str_replace("</body>"," ",$itxt);
                            $itxt=str_replace("</html>"," ",$itxt);
                        }else{
                            echo ("general method: ");
                            echo $w2['url']. "\n";
                            $dom = new domDocument('1.0', 'utf-8');
                            $ihtml =file_get_contents($w2['url']);
                            $dom->loadHTML($ihtml);
                            $pre= $dom->getElementsByTagName('body');
                            $itxt = $pre->item(0)->nodeValue;
                        }
                        }
                    }catch(Exception $e){
                $pass_var=1;
                 echo ("error in textget". "\n");
                 echo ($e);
                }try{
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
                }catch(Exception $e){
                $pass_var=1;
                 echo ("error in save". "\n");
                }
        }
    }catch(Exception $e){
        print $e;
            }
        }
    }
    public function run()
    {
        //DB::statement("delete from bills where true");
        self::run_state('ga','2015_16'); //pdf
        //self::run_state('fl','2016'); // pdf AND html
        //self::run_state('nh','2016'); // html
        //self::run_state('tx','84'); // no bills, somehow
        //self::run_state('tn','109');
        //self::run_state('ma','189th'); 
        //self::run_state('me','127'); //sometimes rtf? no good support yet
        //self::run_state('ca','20152016');
        //self::run_state('or','2016 Regular Session'); // pdf, override encode?
        //self::run_state('wa','2015-2016'); // pdf AND html
        

    }
}
