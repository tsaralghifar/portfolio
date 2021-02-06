<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Http\Requests\PortfolioRequest;

class PortfolioPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $portfolio =  Portfolio::all();
        return view('pages.portfolio.list', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        // $data = new Portfolio;
        // $data->nama_app = $request->nama_app;
        // $data->desc = $request->desc;
        // $data->github = $request->github;

        // $nama_app = $request->file('nama_app');
        // Storage::putFile('public/img/', $nama_app);
        // $data->nama_app = "assets/img/portfolio/".$nama_app->hashName();

        // $data->save();
        // return redirect()->route('admin.portfolio.create');

        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store(
            'storage/img', 'public'
        );

         Portfolio::create($data);
        return redirect()->route('admin.portfolio.create');
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
        return view('pages.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, $id)
    {
        $data = About::find($id);
        $data->judul = $request->judul;
        $data->picture = $request->picture;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('admin.portfolio.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Portfolio::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.portfolio.list');
    }
}
