<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand ms-5" href="/reditect">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/reditect">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/company">company</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Employees
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/employee">Show Employees</a></li>
                  <li><a class="dropdown-item" href="employee/create">Add Employees</a></li>
                </ul>
              </li>

            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @if(Route::has('login'))
            <div class="ms-3">
                @auth
                <x-app-layout>
                </x-app-layout>
                @else
                <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                @if(Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary me-5">Signup</a>
                @endif
                @endauth
            </div>
            @endif
          </div>
        </div>
      </nav>
