@extends('layouts.admin_layout')
    @section('content')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Create</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Portfolio</li>
                </ol>
                    <form action="{{route('admin.portfolio.store')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 mt-3">
                                <h3>Image</h3>
                                <img style="height: 30vh" src="{{asset('assets/img/portfolio/cabin.png')}}" class="img-thumbnail">
                                <input class="mt-3 @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar">
                                @error('gambar') <div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-md-4 mt-3">
                                <div class="mb-5">
                                    <label for="nama_app"><h4>Title</h4></label>
                                    <input type="text" class="form-control @error('nama_app') is-invalid @enderror" id="nama_app" name="nama_app" value="{{ old('nama_app')}}"/>
                                    @error('nama_app') <div class="text-muted">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="desc"><h4>Description</h4></label>
                                    <textarea name="desc"
                                          class="ckeditor form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                                    @error('desc') <div class="text-muted">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="github"><h4>Github</h4></label>
                                    <input type="text" class="form-control @error('github') is-invalid @enderror" id="github" name="github" value="{{ old('github')}}"/>
                                    @error('github') <div class="text-muted">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary my-5">
                    </div>
                    </form>
        </main>
    @endsection