<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Image;
Use App\User;
use Intervention\Image\Facades\Image as ImageInt;
use DB;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //home page
    public function index()
    {
        $images = Image::all();
        return view('home',['images' => $images]);
    }

    // add images
    public function create()
    {
        if(Auth::user()->name=='admin')
        {
            return view('create');
        }
        else
        {
            return redirect('home');
        }
    }

    //add images to home page
    public function store(Request $request)
    {
        $path_little = 'little images/';
        $path_original='original images/';
        $path_water='water images/';
        $file = $request->file('file');

        // save image, create little image, drawing watermark
        foreach ($file as $f) {
            $filename = str_random(20) .'.' . $f->getClientOriginalExtension() ?: 'png';
            $img = ImageInt::make($f);
            $img->save($path_original . $filename);
            $imgwater = ImageInt::make($f)->insert('watermark.png','center')->save($path_water . $filename);
            $img->resize(200,200)->save($path_little . $filename);
            Image::create(['title' => $request->title, 'img' => $filename]);
        }

        return redirect('home');
    }

    public function show ($id)
    {
        $image=Image::find($id);
        return view ('show',compact('image'));
    }

    public function predelete()
    {
        if(Auth::user()->name=='admin')
        {
            $images=Image::all();
            return view('delete',['images' => $images]);
        }
        else
        {
            return redirect('home');
        }
    }

    public function delete(Request $request)
    {
        $path_little = 'little images/';
        $path_original='original images/';
        $path_water='water images/';

        //delete files
        $id=$request->del;
        $image=Image::find($id);
        unlink($path_original.''.$image->img);
        unlink($path_little.''.$image->img);
        unlink($path_water.''.$image->img);

        //delete info from base
        $deleteimgs=DB::delete('delete from images where id=?',[$request->del]);
        $images=Image::all();
        return view('delete',['images' => $images]);
    }
}
