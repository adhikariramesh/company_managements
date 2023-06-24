@extends('backend.layouts.main')

@section('main-section')
<div class="container my-5">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}

        <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
    </div>
    @endif
<table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">Employee Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Company Id</th>
        <th colspan="2">Operation</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employees as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->firstName}}</td>
            <td>{{$item->lastName}}</td>
            <td>{{$item->company_id}}</td>
            <td>
                <a href="employee/{{$item->id}}/edit" class="btn btn-primary">Update</a>
            </td>
            <td>
                <form action="employee/{{$item->id}}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger" style="background: rgb(127, 41, 41)">Delete</button>
                </form>
            </td>
        @endforeach

    </tbody>
  </table>
</div>
@endsection


