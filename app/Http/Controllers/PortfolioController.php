<?php

namespace App\Http\Controllers;

use App\Parcours;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Parcours::where('type', 'like','experience')->get();
        $educations = Parcours::where('type', 'like','education')->get();

        return view('back.portfolio.index',['experiences'=>$experiences , 'educations'=>$educations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'type' => 'required',
        ]);

        $parcours = Parcours::create($request->all());

        return redirect()->route('portfolio.index')->with('message', 'parcour ajpouté avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parcour = Parcours::find($id);

        return view('back.portfolio.editparcour',  ['parcour'=>$parcour]);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string'
        ]);

        $parcour = Parcours::find($id);
        $parcour->update($request->all());
        return redirect()->route('portfolio.index')->with('message', 'parcour modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parcour = Parcours::find($id);
        $parcour->delete();

        return redirect()->route('portfolio.index')->with('message', 'parcour supprimé avec succée');
    }
}
