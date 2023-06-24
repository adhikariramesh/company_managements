@extends('backend.layouts.main')

@section('main-section')
<div class="container my-5">
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{session()->get('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
      </div>

    @endif
<table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">Company Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Website Link</th>
        <th scope="col">Logo</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($company as $item)
        <tr>
            <th scope="row">{{$item->company_id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->website}}</td>
            <td>
                @if($item->logo)
                <img src="{{ asset('public/images/'.$item->logo) }}" style="height: 50px;width:100px;">
                @else
                <span>No image found!</span>
                @endif
            </td>
            <td>
                <a href="/update_company/{{$item->company_id}}" class="btn btn-primary">Update</a>
                <a href="/delete_company/{{$item->company_id}}" class="btn btn-danger">Delete</a>
            </td>
        @endforeach

    </tbody>
  </table>
</div>
@endsection
