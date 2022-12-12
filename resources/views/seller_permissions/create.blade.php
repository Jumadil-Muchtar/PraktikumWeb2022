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
        <div class="card bg-dark mt-5 mb-5" style="width: 55rem;">
            <div class="card-header bg-success text-white">Add Seller Permission</div>
            <form action="{{ route('seller-permissions.store') }}" method ="post">
                @csrf
                <div class="form-group row pt-3">
                    <label for="seller" class="col-sm-2 col-form-label text-white">Seller ID</label>
                    <div class="col-sm-10">
                        <input type="number" min='1' class="form-control" name="seller_id" id='seller_id'>
                    </div>
                </div>
                <fieldset class="pt-3 form-group bg-dark text-white">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Permission</legend>
                        
                        <div class="col-sm-10">
                            @foreach ($permissions as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="permission_id" id="{{ $item->id }}" value="{{ $item->id }}">
                                <label class="form-check-label" for="{{ $item->id }}">
                                    {{ $item->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                    
                </fieldset>
                <div class='pb-3 d-flex justify-content-end pt-3'>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection