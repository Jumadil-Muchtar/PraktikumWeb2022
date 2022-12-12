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
            <div class="card-header bg-warning text-white">Edit Seller</div>
            <form action="{{ route('sellers.update', $seller->id) }}" method ="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <div class="form-group row pt-3">
                    <label for="name" class="col-sm-2 col-form-label text-white">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id='name' value='{{ $seller->name }}'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="address" class="col-sm-2 col-form-label text-white">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id='address' value='{{ $seller->address }}'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="no_hp" class="col-sm-2 col-form-label text-white">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_hp" id='no_hp' value='{{ $seller->no_hp }}'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="status" class="col-sm-2 col-form-label text-white">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" id='status' value='{{ $seller->status }}'>
                    </div>
                </div>
                <fieldset class="pt-3 form-group bg-dark text-white">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male">
                                <label class="form-check-label" for="gender1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
                                <label class="form-check-label" for="gender2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class='pb-3 d-flex justify-content-end pt-5'>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection