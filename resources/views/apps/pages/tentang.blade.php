@extends('apps.app')

@section('content')

<x-nav-bar title="Tentang Covid-19"></x-nav-bar>

<div class="container content mt-5">
    {{-- QUESTION --}}
    <div class="row justify-content-around question">
        <div class="col-md-11">
            <div class="card mb-4 bg-white border-0">
                <div class="card-body text-left py-3">
                    {!!$tentang->body!!}
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection