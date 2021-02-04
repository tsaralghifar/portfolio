@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Main</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Static Navigation</li>
            </ol>
        <form action="{{route('admin.about.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-5">
                        <label for="judul"><h4>Judul</h4></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}"/>
                        @error('judul') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-5">
                        <label for="picture"><h4>Picture</h4></label>
                        <input type="text" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture" value="{{ old('picture') }}"/>
                        @error('picture') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-5">
                        <label for="description"><h4>Description</h4></label>
                        <textarea name="description"
                              class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection