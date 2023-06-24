<base href="/public">
@extends('backend.layouts.main')

@section('main-section')


<div class="container my-5">
    <h1 class="text-center">Add Employee</h1>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{session()->get('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
      </div>

    @endif
<form action="/employee" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-5">
      <label for="exampleInputEmail1" class="form-label">First Name</label>
      <input type="text" name="fname" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" required autofocus >
    </div>
    @error('fname')
    <span class="text-danger">{{$message }}</span>
    @enderror


    <div class="mb-3 col-5">
      <label for="exampleInputEmail1" class="form-label">Last Name</label>
      <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    @error('lname')
    <span class="text-danger">{{$message }}</span>
    @enderror


    <div class="mb-3 col-5">
      <label for="exampleInputPassword1" class="form-label">Company Id</label>
      {{-- <input type="text" name="web" class="form-control" id="exampleInputPassword1" required> --}}
      <select name="company_id" id="" class="form-control">
        @foreach ($company as $item)
        <option value="{{$item->company_id}}" >{{$item->company_id}}</option>
        @endforeach
      </select>
    </div>
    @error('company_id')
    <span class="text-danger">{{$message }}</span>
    @enderror

    <button type="submit" class="btn btn-primary" style=" background:black;">Add</button>
  </form>
</div>
@endsection

