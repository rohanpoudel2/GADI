@extends('layouts.error')
<div class="container">
    <div class="error-page">
        @section('content')
            <div class="error-info">
                <img src="{{ asset('images/errors/500.jpg') }}" alt="500">
                <h1>
                    Sorry, our servers are currently experiencing some technical difficulties. Please try again later.
                </h1>
                <span>500 | Internal Server Error</span>
            </div>
        </div>
    </div>
