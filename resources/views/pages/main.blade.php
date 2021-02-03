@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Main</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Static Navigation</li>
            </ol>
        <form action="{{route('admin.main.update')}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                    <h3>Profile Image</h3>
                    <img style="height: 30vh" src="{{url($main->bc_img)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" id="bc_img" name="bc_img">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-5">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ? old('title') : $main->title}}"/>
                        @error('title') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-5">
                        <label for="sub_title"><h4>Sub Title</h4></label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle') ? old('subtitle') : $main->subtitle}}">
                        @error('subtitle') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-5">
                        <h4>Upload Resume</h4>
                        <input class="mt-2" type="file" id="resume" name="resume">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection