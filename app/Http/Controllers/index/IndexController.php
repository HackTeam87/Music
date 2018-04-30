<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Music;

class IndexController extends Controller
{
  public function index(){

      $music = Music::paginate(3);

      return view('site.index',compact('music'));
  }

//    public function music(Request  $id){
//
////        $music = Music::all();
//
//        $music = Music::orderBy('id','DESC')->Limit(1)->get();
//
//        return view('player',compact('music'));
//    }

    public function music(Request  $request,  $id){

        $music = Music::where('id', $id)->get();
//        $music = Music::all();


        return view('site.player',compact('music'));
    }
}
