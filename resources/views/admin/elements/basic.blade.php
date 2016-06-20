@extends('admin.elements.base')

@include('admin.elements.css')
@include('admin.elements.js-header')
@include('admin.elements.js-footer')
@include('admin.elements.side-bar')
@include('admin.elements.top-bar')
@include('admin.elements.footer')

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