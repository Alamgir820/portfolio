@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('skill.index') }}">See Your Skills & Messages</a></h5>
            <div class="card-body">
        <form action="{{ route('skill.update',$data->id) }}" method="POST">
            @csrf
           
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="mb-3">
              <label for="skill_name" class="form-label">Write your skill name :</label>
              <input type="text" class="form-control  @error('skill_name') is-invalid @enderror" id="skill_name" name="skill_name" value="{{ $data->skill_name }}" >
              
              @error('skill_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3">
                <label for="skill_percentage" class="form-label">Write your skill percentage(1-100)% :</label>
                <input type="text" class="form-control  @error('skill_percentage') is-invalid @enderror" id="skill_percentage" name="skill_percentage" value="{{ $data->skill_percentage }}" >
                
                @error('skill_percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="form-floating">
                    <label for="message">Write Your Message About Skill:</label>
                    <textarea class="form-control summernote @error('message') is-invalid @enderror" id="message"  name="message" placeholder="Write Your Message Here---" id="message" style="height: 100px" @required(true)>{{ $data->message }}</textarea>
                  </div>
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
