<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Http\Requests\AboutRequest;

class AboutPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $about =  About::all();
        return view('pages.about.list', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        // $about = new About;
        // $about->judul = $request->judul;
        // $about->picture = $request->picture;
        // $about->description = $request->description;

        // $about->save();
        // return redirect()->route('admin.about.create');

        $data = $request->all();

        About::create($data);
        return redirect()->route('admin.about.create');
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
        $about = About::find($id);
        return view('pages.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {
        $data = About::find($id);
        $data->judul = $request->judul;
        $data->picture = $request->picture;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('admin.about.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('admin.about.list');
    }
}
