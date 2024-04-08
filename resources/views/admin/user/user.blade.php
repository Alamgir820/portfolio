@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        
      <div class="card my-3">
        <h5 class="card-header">All User</h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Avatar</th>
                <th>User Name</th>
                <th>E-Mail</th>
                <th>Created At</th>
              </tr>
            </thead>    
            <tbody>
              @foreach ($user as $key=>$item)
              <tr>
                <th>{{ ++$key }}</th>
                <td>
                    <img width="30px" src="{{ Avatar::create($item->name)->toBase64() }}" alt="">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at->diffForHumans() }}</td>
              
              </tr>
              @endforeach
              
             
            </tbody>
          </table>


        </div>
      </div>
      {{ $user->links() }}
   
    
  </div>
</div>

@endsection
