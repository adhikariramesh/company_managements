<base href="/public">
@extends('backend.layouts.main')

@section('main-section')


<div class="container my-7">



    <h1 class="text-center">Update Company Details</h1>
<form action="/update_company/{{$data->company_id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-5">
      <label for="exampleInputEmail1" class="form-label">Company Name</label>
      <input type="text" name="name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus value="{{$data->name}}">
    </div>
    <div class="mb-3 col-5">
      <label for="exampleInputEmail1" class="form-label">Company Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{$data->email}}">
    </div>
    <div class="mb-3 col-5">
      <label for="exampleInputPassword1" class="form-label">Company Website</label>
      <input type="text" name="web" class="form-control" id="exampleInputPassword1" required value="{{$data->website}}">
    </div>
    <div class="mb-3 col-5">
      <label for="exampleInputPassword1" class="form-label">Company Old Logo</label>
      @if($data->logo)
                <img src="{{ asset('public/images/'.$data->logo) }}" style="height: 50px;width:100px;">
                @else
                <span>No image found!</span>
                @endif
    </div>
    <div class="mb-3 col-5">
      <label for="exampleInputPassword1" class="form-label">Company New Logo</label>
      <input type="file" name="image"  class="form-control" id="exampleInputPassword1"  >
    </div>

    <button type="submit" class="btn btn-primary" style=" background:black;">Update</button>
  </form>
</div>
@endsection
