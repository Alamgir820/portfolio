@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        
      <div class="card my-3">
        <h5 class="card-header"><a class=" btn btn-primary" href="{{ route('blog.create') }}">Add Blog & Description</a></h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Blog title</th>
                <th>Blog sub-title</th>
                <th>Description</th>
                <th>Blog Image</th>
                <th>Action</th>
              </tr>
            </thead>    
            <tbody>
              @foreach ($blog as $key=>$item)
              <tr>
                <td>{{ ++$key }}</td>
                <th>{{ $item->blog_title }}</th>
                <td>{{ $item->blog_subtitle }}</td>
                <td>{{ Illuminate\Support\Str::of($item->blog_description)->words(1) }}</td>
                <td> <img class=" img rounded-circle img-thumbnail " width="30" src="{{ asset('public/blog/images') }}/{{ $item->blog_image }}" alt=""></td>
                <td>
                  <a class=" btn btn-sm btn-primary" href="{{ route('blog.edit',$item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a class=" btn btn-sm btn-danger " id="delete" href="{{ route('blog.delete',$item->id) }}"><i class="fa-solid fa-trash"></i></a>
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
