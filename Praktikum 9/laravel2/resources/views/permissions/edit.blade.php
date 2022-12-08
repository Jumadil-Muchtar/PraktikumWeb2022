@extends('layouts.main')
@section('container-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please fill the form correctly!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <div class="row pt-5 justify-content-center">
        <div class="card bg-dark mb-5 mt-5" style="width: 55rem;">
            <div class="card-header bg-warning text-white">Edit Permission</div>
            <form action="{{ route('permissions.update', $permission->id) }}" method ="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <div class="form-group row pt-3">
                    <label for="name" class="col-sm-2 col-form-label text-white">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id='name' value='{{ $permission->name }}'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="description" class="col-sm-2 col-form-label text-white">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" id='description' value='{{ $permission->description }}'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="status" class="col-sm-2 col-form-label text-white">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" id='status' value='{{ $permission->status }}'>
                    </div>
                </div>
                <div class='pb-3 d-flex justify-content-end pt-5'>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection