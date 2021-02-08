<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Http\Requests\PortfolioRequest;
use Illuminate\Support\Facades\Storage;

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
        $portfolios =  Portfolio::all();
        return view('pages.portfolios.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolios.create');
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

        // $gambar = $request->file('gambar');
        // Storage::putFile('public/img/', $gambar);
        // $data->gambar = "assets/img/".$gambar->hashName();

        // // return $data;

        // $data->save();
        // return redirect()->route('admin.portfolio.list');

        $portfolio = $request->all();
        $portfolio['gambar'] = $request->file('gambar')->store(
            'assets/img/', 'public'
        );

         Portfolio::create($portfolio);
        return redirect()->route('admin.portfolios.list');
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
        $portfolio = Portfolio::find($id);
        return view('pages.portfolios.edit', compact('portfolio'));
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
        // $data = About::find($id);
        // $data->judul = $request->judul;
        // $data->picture = $request->picture;
        // $data->description = $request->description;
        // $data->save();
        // return redirect()->route('admin.portfolio.list');

        
        // $portfolio = Portfolio::find($id);
        // $portfolio['gambar'] = $request->file('gambar')->store(
        //     'assets/img/', 'public'
        // );

        // Portfolio::update($portfolio);
        // return redirect()->route('admin.portfolios.list');

        $data = Portfolio::find($id);
        $data->nama_app = $request->nama_app;
        $data->desc = $request->desc;
        $data->github = $request->github;

        $data['gambar'] = $request->file('gambar')->store(
            'assets/img/', 'public'
        );

        // return $data;

        $data->save();
        return redirect()->route('admin.portfolios.list');
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
        @unlink(public_path($data->gambar));
        $data->delete();

        return redirect()->route('admin.portfolios.list');
    }
}
