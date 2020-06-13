@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Passport</h1>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <passport-clients></passport-clients>
            <br>
            <passport-personal-access-tokens></passport-personal-access-tokens>
            <br>
            <passport-authorized-clients></passport-authorized-clients>                    
        </div>
    </div>
</div>
@endsection
