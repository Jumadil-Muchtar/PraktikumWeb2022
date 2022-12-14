@extends('contacts.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Nim : {{ $contacts->nim }}</h5>
        <p class="card-text">Nama : {{ $contacts->nama }}</p>
        <p class="card-text">Alamat : {{ $contacts->alamat }}</p>
  </div>
      
    </hr>
  
  </div>
</div>