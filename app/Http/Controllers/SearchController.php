<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
class SearchController extends Controller
{
    function search(){

       
        // if( isset($_GET['query']) && strlen($_GET['query']) > 1){

        //     $search_text = $_GET['query'];
        //     $countries = DB::table('country')->where('Name','LIKE','%'.$search_text.'%')->paginate(2);
        //     // $countries->appends($request->all());
        //     return view('search',['countries'=>$countries]);
            
        // }else{
        //      return view('search');
        // }
        return view('search');
       
    }

    function find(Request $request){
            $request->validate([
              'query'=>'required|min:2'
           ]);
  
           $search_text = $request->input('query');
           $countries = DB::table('posts')
                      ->where('nom','LIKE','%'.$search_text.'%')
                      
                      ->orWhere('cif','LIKE','%'.$search_text.'%')
                      ->orWhere('nutelephone','LIKE','%'.$search_text.'%')
                      ->orWhere('adhesion','LIKE','%'.$search_text.'%')
                      
                      ->latest()->paginate(7);
            return view('search',['countries'=>$countries]);

    }
}
