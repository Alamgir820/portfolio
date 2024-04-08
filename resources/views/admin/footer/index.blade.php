@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        
      <div class="card my-3">
        <h5 class="card-header"><a class=" btn btn-primary" href="{{ route('footer.create') }}">Add Footer Content</a></h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Web site name</th>
                <th>Web site link</th>
                <th>Icon</th>
                <th>Action</th>
              </tr>
            </thead>    
            <tbody>
          @foreach ($footer as $key=>$item)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->websitename }}</td>
                <td>{{ $item->websitelink }}</td>
                <td>{{ $item->websiteicon }}</td>
                <td>
                  <a class=" btn btn-sm btn-primary" href="{{ route('footer.edit',$item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a class=" btn btn-sm btn-danger " id="delete" href="{{ route('footer.delete',$item->id) }}"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
           
              
              
              
            </tbody>
          </table>


        </div>
      </div>

   
    
  </div>
</div>

@endsection
