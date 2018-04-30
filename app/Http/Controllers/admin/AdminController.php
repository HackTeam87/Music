<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Image;

use App\Model\Music;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        return view('layouts.admin._index');
    }





    public function create(Music $music)
    {
        $music = Music::paginate(1);

        return view('admin.create', compact('music'));
    }




    public function store(Request $request)
    {
        $music = new Music();

        $music->title = $request->title;
        $music->text = $request->text;

        if( $request->hasFile('img') ) {

            $images = $request->file('img');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            Image::make($images)->save( public_path('blog/images/' . $filename ) );

            // Set page-images url
            $music->img = $filename;
        }

        if( $request->hasFile('songs') ) {

            $songs = $request->file('songs');
            $filename = time() . '.' . $songs->getClientOriginalExtension();
            $songs->move('blog/music/', $filename);


         $music->songs = $filename;

        }


        $music->save();

        return  redirect()->route('create',compact('music'));
    }




    public function show($id)
    {
        $music = Music::where('id', $id)->get();

        return view('admin.show' , compact('music'));
    }




    public function edit($id)
    {
        $music = Music::find($id);


        return view('admin.edit', compact('music'));
    }


    public function update(Request $request, $id)
    {
        //
    }





    public function destroy($id)
    {
        // delete

        $music = Music::find($id);

        $music->delete();



        return redirect()->route('create', $music->id);
    }






}
