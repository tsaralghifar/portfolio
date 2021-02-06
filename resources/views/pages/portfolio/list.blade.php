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
                    <th scope="col">App</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($portfolio) > 0)
                    @foreach ($portfolio as $portfolios)
                  <tr>
                    <th scope="row">{{ $portfolios->id }}</th>
                    <td>{{ $portfolios->nama_app }}</td>
                    <td>
                      <img src="{{ url($portfolios->gambar) }}" alt="">
                    </td>
                    <td>{{ Str::limit(strip_tags($portfolios->desc),40) }}</td>
                    <td>{{ $portfolios->github }}</td>
                    <td>
                        
                                <a href="{{ route('admin.portfolio.edit', $portfolios->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            
                                <form action="{{ route('admin.portfolio.destroy', $portfolios->id) }}" method="post" class="d-inline">
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