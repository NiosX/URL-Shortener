@extends('layouts.app')

@section('content')
<div class="col-md-12">

    @include('partials.errors')

    <form method="POST" action="/short-url">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="URL to shorten" name="long_url" required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Short!</button>
            </div>
        </div>                      
    </form>

    @if(isset($short_url) && !empty($short_url))
    <div class="card bg-light my-5">
        <div class="card-body text-center">
            <h1>Yay!</h1>
            <p class="card-text">Here is your short URL: <a href="{{$short_url}}" target="_blank">{{$short_url}}</a></p>
        </div>
    </div>
    @endif

    @include('partials.top-url')

</div>
@endsection
