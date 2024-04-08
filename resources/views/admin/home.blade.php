@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">

      <div class="card m-2 p-3" >
        <div class="card-header">
          <h4>Home content</h4>
              
       
        </div>
        <form action="{{ route('home.update',$data->id) }}" method="POST"  enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $data->id }}">
          <input type="hidden" name="bc_image" value="{{ $data->bc_image }}">
          <input type="hidden" name="logo" value="{{ $data->logo }}">
          <div class="mb-3">
            <label for="title" class="form-label">Title </label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{ $data->title }}" >
            
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="sub_title" class="form-label">Sub Title </label>
            <input type="text" class="form-control  @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" value="{{ $data->sub_title }}">
            
            @error('sub_title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <span></span>
          </div>
          <div class="mb-3">
            <label for="bc_image" class="form-label">Background Image </label>
            <input type="file" class="form-control dropify" id="bc_image" name="bc_image" data-default-file="{{ asset('public/Images') }}/{{ $data->bc_image }}">
          </div>
          
          <div class="mb-3">
            <label for="logo" class="form-label">Logo </label>
            <input type="file" class="form-control dropify" id="logo" name="logo" data-default-file="{{ asset('public/Images') }}/{{ $data->logo }}">
          </div >
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        
      </div>




    </div>
    <div class="col-lg-2"></div>
    
  </div>
</div>

@endsection
