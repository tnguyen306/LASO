<?php
class FavController extends BaseController {
    public function fav($id)
    {
         
         $favorites = DB::select('Select id, ext_id ,title,(first_name ||" " ||last_name) as author,status,introduced_date FROM (select * from bills join legislators on bills.author_id = legislators.id) where id IN (select bill_id from favorites where user_id = ?)',[$id]);

         return View::make('favorites')->with('favorites',$favorites);
    }
}
