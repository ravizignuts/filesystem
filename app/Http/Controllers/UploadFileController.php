<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadFileController extends Controller
{
    public function uploadForm()
    {
        return view('uploadform');
    }
    public function uploadSubmit(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string : 20',
            'photos' => 'required'
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        // dd($validate);
        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->all('photos');
            // dd($files);
            foreach ($files as $file) {
                // dd($file[0]);
                $filename  = $file[0]->getClientOriginalName();
                $extension = $file[0]->getClientOriginalExtension();
                // dd($extension);
                $check     = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $item  = Item::create($request->only('name'));
                    foreach ($request->photos as $photo) {
                        $filename      = $photo->store('photos');
                        ItemDetails::create([
                            'item_id'  => $item->id,
                            'filename' => $filename
                        ]);
                    }
                    return redirect()->back()->with('message','true');
                } else {
                    return redirect()->back()->with('message','false');
                }
            }
        }
    }
    public function showAll(){
        $files = ItemDetails::with('items')->get();

        return view('home')->with('files',$files);
    }
}
