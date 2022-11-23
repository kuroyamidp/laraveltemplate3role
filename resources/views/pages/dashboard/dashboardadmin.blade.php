@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">
                    <h6>Selamat datang admin BAK {{Auth::user()->name}}</h6>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection