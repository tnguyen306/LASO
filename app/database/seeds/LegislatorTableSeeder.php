<?php


class LegislatorTableSeeder extends Seeder {
    public function run()
    {
        $ljson = file_get_contents('http://openstates.org/api/v1/legislators/?state=ga&active=true&apikey=e2f56937c8c74a67a0f6133152f0c2f2');
        $jsonIterator3 = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($ljson, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);
            foreach ($jsonIterator3 as $k3 => $v3) {
	            if(strcmp($k3,"leg_id")==0){
		            $iid=substr($v3,3);     
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
	        }elseif(strcmp($k3,"suffixes")==0){ // the last field, so all is here
                $newleg = new Legislator;
                $newleg->id=$iid;
                $newleg->first_name=$ifname;
                $newleg->last_name=$ilname;
                $newleg->state=$istate;
                $newleg->branch="coming";
                $newleg->district=$idist;
                $newleg->photo_path=$iphoto;
                $newleg->bio=$iparty;
                $newleg->save();
            }
        }
    }
}