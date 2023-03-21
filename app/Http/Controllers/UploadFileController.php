<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File as FileRemove;

class UploadFileController extends Controller
{
    public function uploadForm()
    {
        return view('uploadform');
    }
    public function uploadSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string : 20',
            'photos' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $item  = Item::create($request->only('name'));
        $images = [];
        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            foreach ($request->photos as $photo) {
                $extension = $photo->getClientOriginalExtension();
                $check     = in_array($extension, $allowedfileExtension);
                if (!$check) {
                    return redirect()->back()->with('message', 'false');
                }
                $imgname = $photo->getClientOriginalName();
                $path = $photo->storeAs('techies', $imgname, ['disk' => 'public']);
                // Storage::disk('public')->put('techies',$photo);
                $images[] = [
                    'item_id'  => $item->id,
                    'filename' => $imgname
                ];
            }
        }
        $item->itemdetails()->createMany($images);
        return redirect()->back()->with('message', 'true');
    }
    public function showAll()
    {
        $files = Item::with('itemdetails')->get();
        return view('home')->with('files', $files->toArray());
    }
    public function delete($id)
    {
        $image = ItemDetails::findOrFail($id);
        $image->delete();
        unlink(storage_path('app/public/techies/' . $image->filename));
        return redirect()->back()->with('message', 'true');
    }
}
