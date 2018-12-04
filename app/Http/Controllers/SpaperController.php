<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Spaper;
use Illuminate\Http\Request;

class SpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spapers = Spaper::all();
        return view('spapers.list', compact('spapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spapers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spaper = new Spaper();
        $spaper->title = $request->input('title');
        $spaper->content = $request->input('content');
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->image;
                $clientName = $image->getClientOriginalName();
                $path = $image->move(public_path('upload/images'), $clientName);
                $spaper->image = $clientName;
            }
        }
        $spaper->save();
        return redirect()->route('spapers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spaper = Spaper::findOrFail($id);
        return view('spapers.edit', compact('spaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $spaper = Spaper::findOrFail($id);
        $spaper->title = $request->input('title');
        $spaper->content = $request->input('content');
        if ($request->hasFile('image')) {
            $currentImg = $spaper->image;
            if ($currentImg) {
                Storage::delete('upload/images', $currentImg);
            }
            $image = $request->image;
            $clientName = $image->getClientOriginalName();
            $path = $image->move(public_path('upload/images'), $clientName);
            $spaper->image = $clientName;

        }
        $spaper->save();
        return redirect()->route('spapers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spaper = Spaper::findOrFail($id);
        $spaper->delete();
        return redirect()->route('spapers.index');
    }
}
