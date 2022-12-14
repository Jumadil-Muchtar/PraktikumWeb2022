@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Permission Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">ID : {{ $permissions->id }}</h5>
        <p class="card-text">Nama : {{ $permissions->name }}</p>
        <p class="card-text">Deskripsi : {{ $permissions->description }}</p>
        <p class="card-text">Status : {{ $permissions->status }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
