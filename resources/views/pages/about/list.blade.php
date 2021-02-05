@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
            <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($about) > 0)
                    @foreach ($about as $data)
                  <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->picture }}</td>
                    <td>{{ Str::limit(strip_tags($data->description),40) }}</td>
                    <td>
                        
                                <a href="{{ route('admin.about.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            
                                <form action="{{ route('admin.about.destroy', $data->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                    </td>
                  </tr>
                    @endforeach
                    @endif
                </tbody>
              </table>
    </main>
@endsection