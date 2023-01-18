@extends('layouts.error')
<div class="container">
    <div class="error-page">
        @section('content')
            <div class="error-info">
                <img src="{{ asset('images/errors/404.jpg') }}" alt="404">
                <h1>
                    Sorry, we could not find the page you were looking for. Please try again later.
                </h1>
                <span>404 | Not Found</span>
            </div>
        </div>
    </div>
