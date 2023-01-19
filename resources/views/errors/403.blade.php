@extends('layouts.error')
<div class="container">
    <div class="error-page">
        @section('content')
            <div class="error-info">
                <img src="{{ asset('images/errors/403.jpg') }}" alt="403">
                <h1>
                    Sorry, you are not allowed to go through here.
                </h1>
                <span>403 | Access Forbidden</span>
            </div>
        </div>
    </div>
