<?php


class LegislatorTableSeeder extends Seeder {
    public function run_state($state,$stateid)
    {
        $ljson = file_get_contents('http://openstates.org/api/v1/legislators/?state='.$state.'&active=true&apikey=e2f56937c8c74a67a0f6133152f0c2f2');
        $jsonIterator3 = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($ljson, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);
            $ichamber="Not Found";
            $idist="Not Found";
            $iparty="Not Found";
            foreach ($jsonIterator3 as $k3 => $v3) {
                try{
                    //stuff otherwise undefined

	                if(strcmp($k3,"leg_id")==0){
		                $iid=$v3;     
	            }elseif(strcmp($k3,"first_name")==0){
		                $ifname=$v3;
	            }elseif(strcmp($k3,"last_name")==0){
		                $ilname=$v3;
	            }elseif(strcmp($k3,"state")==0){
		                $istate=$v3;
	            }elseif(strcmp($k3,"district")==0){
		                $idist=$v3;
	            }elseif(strcmp($k3,"photo_url")==0){
		                $iphoto=$v3;
	            }elseif(strcmp($k3,"party")==0){
		                $iparty=$v3;
	            }elseif(strcmp($k3,"chamber")==0){
		                $ichamber=$v3;
	            }elseif(strcmp($k3,"suffixes")==0){ // the last field, so all is here
                    $newleg = new Legislator;
                    $newleg->id=$iid;
                    $newleg->first_name=$ifname;
                    $newleg->last_name=$ilname;
                    $newleg->state=$istate;
                    $newleg->branch=$ichamber;
                    $newleg->district=$idist;
                    $newleg->photo_path=$iphoto;
                    $newleg->bio=$iparty;
                    $newleg->save();
                }
            }catch(Exception $e){
                        $pass_var=1;
            }
        }
    }
public function run_national($chamber)
    {
        $ljson = file_get_contents('http://congress.api.sunlightfoundation.com/legislators?chamber='.$chamber.'&in_office=true&apikey=e2f56937c8c74a67a0f6133152f0c2f2');
        $jsonIterator3 = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($ljson, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);
            $ichamber=$chamber;
            $idist="Not Found";
            $iparty="Not Found";
            $iphoto="Not Found"; //TODO replace with null image
            $istate="US";
            foreach ($jsonIterator3 as $k3 => $v3) {
                try{
                    //stuff otherwise undefined

	                if(strcmp($k3,"leg_id")==0){
		                $iid=$v3;     
	            }elseif(strcmp($k3,"first_name")==0){
		                $ifname=$v3;
	            }elseif(strcmp($k3,"last_name")==0){
		                $ilname=$v3;
	            }elseif(strcmp($k3,"state_name")==0){
		                $idist=$v3;
	            }elseif(strcmp($k3,"party")==0){
		                $iparty=$v3;
	            }elseif(strcmp($k3,"chamber")==0){
		                $ichamber=$v3;
	            }elseif(strcmp($k3,"website")==0){ // the last field, so all is here
                    $newleg = new Legislator;
                    $newleg->id=$iid;
                    $newleg->first_name=$ifname;
                    $newleg->last_name=$ilname;
                    $newleg->state=$istate;
                    $newleg->branch=$ichamber;
                    $newleg->district=$idist;
                    $newleg->photo_path=$iphoto;
                    $newleg->bio=$iparty;
                    $newleg->save();
                }
            }catch(Exception $e){
                        $pass_var=1;
            }
        }
    }
    public function run()
    {
        DB::statement("delete from legislators where true");
        //DB::statement("delete from legislators where id=1");
        //DB::statement("delete from legislators where id=0");
        DB::statement("insert into legislators (id,first_name,last_name,state,branch,district) values('1','No','Coauthor','00','none','none')");
        DB::statement("insert into legislators (id,first_name,last_name,state,branch,district) values('0','No','Author','00','none','none')");
        self::run_state('ga','1001'); 
        self::run_state('fl','1002');
        self::run_state('nh','1003');
        self::run_state('tx','1004');
        self::run_state('tn','1005');
        self::run_state('ma','1006');
        self::run_state('me','1007');
        self::run_state('ca','1008');
        self::run_state('or','1009');
        self::run_state('wa','1010');
        self::run_national("senate");
        self::run_national("house");
    }
}
