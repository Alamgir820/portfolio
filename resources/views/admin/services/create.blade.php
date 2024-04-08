@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('services.index') }}">See Your Services</a></h5>
            <div class="card-body">
        <form action="{{ route('services.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="icon" class="form-label">Font awesome icon:</label>
              <input type="text" class="form-control  @error('icon') is-invalid @enderror" id="icon" name="icon" placeholder="Example (ion-monitor)" >
              
              @error('icon')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Write your service title:</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Write title" >
                
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Write your service description:</label>
                <textarea type="text" class="form-control summernote @error('description') is-invalid @enderror" id="description" name="description" placeholder="Write description" ></textarea>
                
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
