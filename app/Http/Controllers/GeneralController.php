<?php

namespace App\Http\Controllers;

use App\Albums;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function addCategorie($request){

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function imagesUploadAlbum(Request $request)

    {

        request()->validate([

            'uploadFile' => 'required',

        ]);

        $id_album = $request->input('id_album');;
        $album = Albums::find($id_album);

        $im = $request->file('uploadFile');
     echo '<pre>';
        print_r($album);
        echo '</pre>';

        if (!empty($im)){


            foreach ($im as $key => $value) {

                $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                /*echo $value.'<br>';
                echo $key.'<br>';
                echo $imageName;
                */

                //$value->move(public_path('images'), $imageName);

                $link = $value->store('images');
                $album->images()->create([
                    'name' => $imageName,
                    'link' => $link
                ]);

            }
        }
        return redirect('admin/imagesalbum/'.$id_album );
       //return response()->json(['success'=>'Images Uploaded Successfully.']);

    }
}
