@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        
      <div class="card my-3">
        <h5 class="card-header"><a class=" btn btn-primary" href="{{ route('services.create') }}">Add Service </a></h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>    
            <tbody>
             @foreach ($services as $key=>$item)
             <tr>
                <th>{{ ++$key }}</th>
                <td>{{ $item->icon }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ Illuminate\Support\Str::of($item->description)->words(6)}}</td>
                <td>
                  <a class=" btn btn-sm btn-primary" href="{{ route('services.edit',$item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a class=" btn btn-sm btn-danger " id="delete" href="{{ route('services.delete',$item->id) }}"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            
              
             @endforeach
              
              
            </tbody>
          </table>
          {{ $services->links() }}

        </div>
      </div>

   
    
  </div>
</div>

@endsection
