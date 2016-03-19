<?php
class FavController extends BaseController {
    public function fav($id)
    {
         
         $favorites = DB::select('Select * from fullfav where user_id=?',[$id]);

         return View::make('favorites')->with('favorites',$favorites);
    }
}
