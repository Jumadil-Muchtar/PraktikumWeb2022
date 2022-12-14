@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Sellers Permissions Page</div>
  <div class="card-body">
        <div class="card-body">
        <!-- <h5 class="card-title">Nim : {{ $sellers_permissions->id }}</h5> -->
        <p class="card-text">Seller ID : {{ $sellers_permissions->sellers_id }} {{ $sellers[$sellers_permissions->sellers_id -1]->name }}</p>
        <p class="card-text">Permission ID : {{ $sellers_permissions->permissions_id }} {{ $permissions[$sellers_permissions->permissions_id -1]->name }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
