@extends('user.elements.base')

@include('user.elements.css')
@include('user.elements.js-header')
@include('user.elements.js-footer')
@include('user.elements.side-bar')
@include('user.elements.top-bar')
@include('user.elements.footer')

@section('container')
    <div>
        @yield('top-bar')

        <div class="wrapper">

            @yield('side-bar')

            <div id="page-wrapper">

                @yield('content-header')

                @yield('content')

                @yield('footer')

            </div>
        </div>
    </div>
@endsection