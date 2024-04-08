@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('works.index') }}">See Your Works</a></h5>
            <div class="card-body">
        <form action="{{ route('works.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="service_id" class="form-label">Select service name:</label>
              <select type="text" class="form-control  @error('service_id') is-invalid @enderror" id="service_id" name="service_id"  >
            @foreach ($data as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
            </select>
              
              @error('service_id')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3">
                <label for="client_name" class="form-label">Client name:</label>
                <input type="text" class="form-control  @error('client_name') is-invalid @enderror" id="client_name" name="client_name" placeholder="Write clint name" >
                
                @error('client_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="review_star" class="form-label">Review star:</label>
                <select type="text" class="form-control  @error('review_star') is-invalid @enderror" id="review_star" name="review_star"  >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>
                
                @error('review_star')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="client_review" class="form-label"> Review description:</label>
                <textarea type="text" class="form-control summernote   @error('client_review') is-invalid @enderror" id="client_review summernote" name="client_review"  ></textarea>
                
                @error('client_review')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="project_image" class="form-label">Project Image:</label>
                <input type="file" class="form-control dropify @error('project_image') is-invalid @enderror" id="project_image" name="project_image"  >
                
                @error('project_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="client_image" class="form-label">Client Image:</label>
                <input type="file" class="form-control dropify  @error('client_image') is-invalid @enderror" id="client_image" name="client_image"  >
                
                @error('client_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
              
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
    
    <div class="col-lg-2">
      
    </div>
    
  </div>
</div>

@endsection
