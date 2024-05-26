@extends('layouts.app')

@section('component')
    @include('layouts.partials.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>
            @include('layouts.partials.footer')
        </div>
    </div>
@endsection
