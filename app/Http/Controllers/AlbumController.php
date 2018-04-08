<?php

namespace App\Http\Controllers;

use App\Albums;
use App\AlbumsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class AlbumController extends Controller
{
    protected $rules =
        [
            'name' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
            'description' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Albums::all();
        $categories = AlbumsCategories::all();
        return view('back.portfolio.galerie',['albums'=>$albums , 'categories'=>$categories]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required',
            'description' => 'required|string'
        ]);
        Albums::create($request->all());
        return redirect()->route('album.index')->with('message', 'album ajpouté avec succée');
    */
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => 'edsdsqdsq'));
        } else {
            $album = Albums::create($request->all());
            return response()->json($album);
        }



       /* $post = Albums::create($request->all());

        return response()->json($post);
       */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $album = Albums::findOrFail($id);
        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();

        return response()->json($album);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Albums::find($id);
        $album->delete();


        return response()->json($album);
    }
}
