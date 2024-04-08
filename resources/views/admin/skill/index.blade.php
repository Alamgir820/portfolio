@extends('layouts.admin')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
        
      <div class="card my-3">
        <h5 class="card-header"><a class=" btn btn-primary" href="{{ route('skill.create') }}">Add Skill & Message</a></h5>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Skills Name</th>
                <th>Kills Percentage(%)</th>
                <th>Messages</th>
                <th>Action</th>
              </tr>
            </thead>    
            <tbody>
              @foreach ($data as $key=>$item)
              <tr>
                <th>{{ ++$key }}</th>
                <td>{{ $item->skill_name }}</td>
                <td>{{ $item->skill_percentage }}%</td>
                <td>{{Illuminate\Support\Str::of($item->message)->words(4) }}</td>
                <td>
                  <a class=" btn btn-sm btn-primary" href="{{ route('skill.edit',$item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a class=" btn btn-sm btn-danger " id="delete" href="{{ route('skill.delete',$item->id) }}"><i class="fa-solid fa-trash"></i></a>
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
