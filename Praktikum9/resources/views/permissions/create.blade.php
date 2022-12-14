@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Permission Page</div>
  <div class="card-body">
      
      <form action="{{ url('permissions') }}" method="post" id="data">
        {!! csrf_field() !!}
        <label>Nama</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Deskripsi </label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Status</label></br>
        <select class="form-select" name="status" form="data">
          <option value="Available">Available</option>
          <option value="Unavailable">Unavailable</option>
        </select>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop

<!-- 
name
address 
gender
no_hp
status 
-->