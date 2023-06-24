<base href="/public">
@extends('backend.layouts.main')

@section('main-section')

<div class="container">
    <a href="/show_details_company" class="btn btn-primary" style="float: right;">Show Company Details</a>
</div>

<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}

        <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
    </div>
    @endif
<form action="/add_company" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-5">
      <label for="exampleInputEmail1" class="form-label">Company Name</label>
      <input type="text" name="name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus>
    </div>
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror



    <div class="mb-3 col-5">
      <label for="exampleInputEmail1" class="form-label">Company Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror

    <div class="mb-3 col-5">
      <label for="exampleInputPassword1" class="form-label">Company Website</label>
      <input type="text" name="web" class="form-control" id="exampleInputPassword1" required>
    </div>
    @error('web')
        <span class="text-danger">{{$message}}</span>
    @enderror
    <div class="mb-3 col-5">
      <label for="exampleInputPassword1" class="form-label">Company Logo</label>
      <input type="file" name="image"  class="form-control" id="exampleInputPassword1" required >
    </div>
    @error('image')
        <span class="text-danger">{{$message}}</span>
    @enderror

    <button type="submit" class="btn btn-primary" style=" background:black;">Add</button>
  </form>
</div>
@endsection
