@extends('layouts.admin')

@section('admin_content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('services.index') }}">See Your Services</a></h5>
            <div class="card-body">
        <form action="{{ route('services.update',$data->id) }}" method="POST"  enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="updescription" value="{{ $data->description }}">
            <div class="mb-3">
              <label for="icon" class="form-label">Font awesome icon:</label>
              <input type="text" class="form-control  @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ $data->icon }}" >
       
              @error('icon')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Write your service title:</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{ $data->title }}" >
                
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Write your service description:</label>
                <textarea type="text" class="form-control summernote @error('description') is-invalid @enderror" id="description" name="description" placeholder="Write your service description"  >{{ $data->description }}</textarea>
                
                @error('description')
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
