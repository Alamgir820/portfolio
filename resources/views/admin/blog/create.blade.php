@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('blog.index') }}">See Your Blogs</a></h5>
            <div class="card-body">
        <form action="{{ route('blog.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="blog_title" class="form-label">Write your blog title :</label>
              <input type="text" class="form-control  @error('blog_title') is-invalid @enderror" id="blog_title" name="blog_title" placeholder="Blog title" >
              
              @error('blog_title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


        
            <div class="mb-3">
                <label for="blog_subtitle" class="form-label">Write your blog sub-title:</label>
                <input type="text" class="form-control  @error('blog_subtitle') is-invalid @enderror" id="blog_subtitle" name="blog_subtitle" placeholder="Blog sub-title" >
                
                @error('blog_subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="blog_description" class="form-label">Write your blog description:</label>
                <textarea type="text" class="form-control summernote  @error('blog_description') is-invalid @enderror" id="blog_description" name="blog_description" placeholder="Write your blog description" ></textarea>
                
                @error('blog_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              

            
              <div class="mb-3">
                <label for="blog_image" class="form-label">Blog Image :</label>
                <input type="file" class="form-control dropify  @error('blog_image') is-invalid @enderror" id="blog_image" name="blog_image" placeholder="Your skill (1-100)%" >
                
                @error('blog_image')
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
