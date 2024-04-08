@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('works.index') }}">See Your Works</a></h5>
            <div class="card-body">
        <form action="{{ route('works.update',$data1->id) }}" method="POST"  enctype="multipart/form-data">
          @method('put')
            @csrf
            <input type="hidden" name="id" value="{{ $data1->id }}">
            <input type="hidden" name="project_image" value="{{ $data1->project_image }}">
            <input type="hidden" name="client_image" value="{{ $data1->client_image }}">
            <input type="hidden" name="client_review" value="{{ $data1->client_review }}">
            <div class="mb-3">
              <label for="service_id" class="form-label">Select service name:</label>
              <select type="text" class="form-control  @error('service_id') is-invalid @enderror" id="service_id" name="service_id"  >
            @foreach ($data as $item)
            <option value="{{ $item->id }}" @if($item->id==$data1->service_id) selected @endif>{{ $item->title }}</option>
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
                <input type="text" class="form-control  @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ $data1->client_name }}" >
                
                @error('client_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="review_star" class="form-label">Review star:</label>
                <select type="text" class="form-control  @error('review_star') is-invalid @enderror" id="review_star" name="review_star"  >
                
               @php
               $star=[1,2,3,4,5];
               @endphp
                @foreach ($star as $row)
                <option value="{{ $row }}"@if($data1->review_star==$row) selected @endif >{{ $row }}</option>
                @endforeach
                
               
                
                </select>
                
                @error('review_star')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="client_review" class="form-label"> Review description:</label>
                <textarea type="text" class="form-control  @error('client_review') is-invalid @enderror" id="client_review summernote" name="client_review"  >{{ $data1->client_review }}</textarea>
                
                @error('client_review')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="project_image" class="form-label">Project Image:</label>
                <input type="file" class="form-control dropify @error('project_image') is-invalid @enderror" id="project_image" name="project_image" data-default-file="{{ asset('public/works/images') }}/{{ $data1->project_image }}" >
                
                @error('project_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
             
              <div class="mb-3">
                <label for="client_image" class="form-label">Client Image:</label>
                <input type="file" class="form-control dropify @error('client_image') is-invalid @enderror" id="client_image" name="client_image" data-default-file="{{ asset('public/works/images') }}/{{ $data1->client_image }}" >
                
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
