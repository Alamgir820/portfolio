@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('skill.index') }}">See Your Skills & Messages</a></h5>
            <div class="card-body">
        <form action="{{ route('skill.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="skill_name" class="form-label">Write your skill name :</label>
              <input type="text" class="form-control  @error('skill_name') is-invalid @enderror" id="skill_name" name="skill_name" placeholder="Your skill name" >
              
              @error('skill_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


        
            <div class="mb-3">
                <label for="skill_percentage" class="form-label">Write your skill percentage(1-100)% :</label>
                <input type="text" class="form-control  @error('skill_percentage') is-invalid @enderror" id="skill_percentage" name="skill_percentage" placeholder="Your skill (1-100)%" >
                
                @error('skill_percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Write your skill description:</label>
                <textarea type="text" class="form-control summernote  @error('message') is-invalid @enderror" id="message" name="message" placeholder="Write your skill description" ></textarea>
                
                @error('message')
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
