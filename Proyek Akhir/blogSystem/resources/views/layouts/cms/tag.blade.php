@extends('layouts.master')
@section('title', 'Add Tag')
@section('content')
@section('h1', 'Tag')
<div class="col-12 col-md-6 col-lg-6">
    <div class="card">

            <input type="text" class="form-control inputtags"></input>

        </div>
        <button class="btn btn-primary"><i class="bi bi-bookmark-plus"></i> Add Tag</button>
</div>
@endsection

@push('page-script')

@endpush
