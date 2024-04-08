@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">

      <div class="card m-2 p-3" >
        <div class="card-header">
          <h4>About content</h4>
              
       
        </div>
        <form action="{{ route('about.update',$about->id) }}" method="POST"  enctype="multipart/form-data">
          @csrf
         <input type="hidden" name="id" value="{{ $about->id }}">
         <input type="hidden" name="image" value="{{ $about->image }}">
          <div class="mb-3">
            <label for="profile_name" class="form-label">Profile Name :</label>
            <input type="text" class="form-control  @error('profile_name') is-invalid @enderror" id="profile_name" name="profile_name" value="{{ $about->profile_name }}" >
            
            @error('profile_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="name" class="form-label"> Name :</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $about->name }}" >
            
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label"> E-mail : </label>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ $about->email }}" >
            
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
         
          <div class="mb-3">
            <label for="phone" class="form-label"> Phone : </label>
            <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $about->phone }}" >
            
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="image" class="form-label"> Image :</label>
            <input type="file" class="form-control dropify @error('image') is-invalid @enderror" id="image" name="image" value="" data-default-file="{{ asset('public/images') }}/{{ $about->image }}" >
            
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>




    </div>
    <div class="col-lg-2"></div>
    
  </div>
</div>

@endsection
