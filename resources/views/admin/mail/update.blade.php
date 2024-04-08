@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card m-3">
            <h5 class="card-header">Mail Setting</h5>
            <div class="card-body">
        <form action="{{ route('mail.update') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $mail->id }}" id="">
            <div class="mb-3">
              <label for="mail_transport" class="form-label">Mail Transport:</label>
              <input type="text" class="form-control  @error('mail_transport') is-invalid @enderror" value="{{ $mail->mail_transport }}" id="mail_transport" name="mail_transport"  >
              
              @error('mail_transport')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
                <label for="mail_port" class="form-label">Mail Port:</label>
                <input type="text" class="form-control  @error('mail_port') is-invalid @enderror" value="{{ $mail->mail_port }}" id="mail_port" name="mail_port"  >
                
                @error('mail_port')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="mail_password" class="form-label">Mail Password:</label>
                <input type="text" class="form-control  @error('mail_password') is-invalid @enderror" value="{{ $mail->mail_password }}" id="mail_password" name="mail_password"  >
                
                @error('mail_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="mail_from" class="form-label">Mail From:</label>
                <input type="text" class="form-control  @error('mail_from') is-invalid @enderror" value="{{ $mail->mail_from }}" id="mail_from" name="mail_from"  >
                
                @error('mail_from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="mail_host" class="form-label">Mail Host:</label>
                <input type="text" class="form-control  @error('mail_host') is-invalid @enderror" value="{{ $mail->mail_host }}" id="mail_host" name="mail_host"  >
                
                @error('mail_host')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="mail_username" class="form-label">Mail Username:</label>
                <input type="text" class="form-control  @error('mail_username') is-invalid @enderror" value="{{ $mail->mail_username }}" id="mail_username" name="mail_username"  >
                
                @error('mail_username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="mail_encryption" class="form-label">Mail Encryption:</label>
                <input type="text" class="form-control  @error('mail_encryption') is-invalid @enderror" value="{{ $mail->mail_encryption }}" id="mail_encryption" name="mail_encryption"  >
                
                @error('mail_encryption')
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
