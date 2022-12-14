@extends('contacts.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('contact') }}" method="post">
        {!! csrf_field() !!}
        <label>NIM</label></br>
        <input type="text" name="nim" id="name" class="form-control"></br>
        <label>Nama</label></br>
        <input type="text" name="nama" id="address" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="alamat" id="mobile" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop