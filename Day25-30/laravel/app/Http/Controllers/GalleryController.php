<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function upload(Request $request)
    {
        // try {
        //     $request->validate([
        //         'file' => 'required|mimes:jpg,png|max:50000',
        //     ]);
        // } catch (\Exception $e) {
        //     return $e;
        // }

        $file = $request->file('file');

        $destination = "storage";
        if ($file->move($destination, $file->getClientOriginalName())) {

            $images = File::allFiles(public_path('storage'));

            $cookie = cookie('name-'.$file->getClientOriginalName(), $file->getClientOriginalName(), 60);

            return redirect('/gallery')->cookie($cookie);

        } else {
            echo "fail";
        }
    }

    public function index()
    {
        $images = File::allFiles(public_path('storage'));
        return view('gallery', ['files' => $images,'email'=>Session::get('email')]);
    }

    public function download(Request $request)
    {
        $filepath = public_path('/storage/'.$request->file);

        return Response::download($filepath);

        return redirect('/gallery');
    }

    public function delete(Request $request)
    {
        File::delete(public_path('/storage/'.$request->file));

        return redirect('/gallery')->withCookie(Cookie::forget('name-'.$request->file));

    }
}
