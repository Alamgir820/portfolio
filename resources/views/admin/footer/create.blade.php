@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header"><a class=" btn btn-primary align-left" href="{{ route('footer.index') }}">See Your Blogs</a></h5>
            <div class="card-body">
        <form action="{{ route('footer.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="websitename" class="form-label">Web site name :</label>
              <input type="text" class="form-control  @error('websitename') is-invalid @enderror" value="{{ old('websitename') }}" id="websitename" name="websitename" placeholder="Web site name" >
              
              @error('websitename')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


        
            <div class="mb-3">
                <label for="websitelink" class="form-label">Web site link:</label>
                <input type="text" class="form-control  @error('websitelink') is-invalid @enderror" value="{{ old('websitelink') }}" id="websitelink" name="websitelink" placeholder="Web site link" >
                
                @error('websitelink')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              
            <div class="mb-3">
                <label for="websiteicon" class="form-label">Web site icon:</label>
                <input type="text" class="form-control  @error('websiteicon') is-invalid @enderror" value="{{ old('websiteicon') }}" id="websiteicon" name="websiteicon" placeholder="Web site icon (Optional)" >
                
                @error('websiteicon')
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
