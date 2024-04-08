@extends('layouts.admin')

@section('admin_content')
<div class="container-fluid">
  <div class="row m-2">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        
      <div class="card my-3">
        <h5 class="card-header"><a class=" btn btn-primary" href="{{ route('works.create') }}">Add Work </a></h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Service name</th>
                <th>Client name</th>
                <th>Client review</th>
                <th>Rating (<i style="color: yellow" class="fa-solid fa-star"></i>)</th>
                <th>Project image</th>
                <th>Client image</th>
                <th>Action</th>
              </tr>
            </thead>    
            <tbody>
          
           @foreach ($data as $key=>$item)
           <tr>
            <th>{{++$key }}</th>
            <td>{{ $item->service->title }}</td>
            <td>{{ $item->client_name }}</td>
            <td>{{Illuminate\Support\Str::of($item->client_review)->words(2) }}</td>
            <td>{{ $item->review_star }} star</td>
            <td> <img class=" img rounded-circle img-thumbnail " width="30" src="{{ asset('public/works/images') }}/{{ $item->project_image }}" alt=""></td>
            <td> <img class=" img rounded-circle img-thumbnail " width="30" src="{{ asset('public/works/images') }}/{{ $item->client_image }}" alt=""></td>
           
            <td>
              <a class=" btn btn-sm btn-primary" href="{{route('works.edit', $item->id )}}"><i class="fa-solid fa-pen-to-square"></i></a>
              <a class=" btn btn-sm btn-danger " id="delete" href="{{ route('works.show',$item->id) }}"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
        
           @endforeach
              
           
              
              
            </tbody>
          </table>
         

        </div>
      </div>

   
    
  </div>
</div>

@endsection
