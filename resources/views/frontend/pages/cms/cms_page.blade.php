@extends('frontend.layouts.front_app')
@section('title')
{{ $cmsPageDetails['title'] }}
@endsection
@section('styles')

@endsection
@section('content')
    <section class="about-us">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="{{ url('/') }}" class="ht-breadcrumbs__link"><span
                            class="ht-breadcrumbs__title">Home</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span
                            class="ht-breadcrumbs__title">{{ $cmsPageDetails['title'] }}</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">{{ $cmsPageDetails['title'] }}</span>
                </li>
            </ul>
            <!-- ht-breadcrumb -->

            <div class="about-us__main">
                <div class="row">
                    <div class="col-md-12 col-md-main">
                        <!-- .about-us__img -->
                        <h1 class="about-us__title">{{ $cmsPageDetails['title'] }}</h1>
                        <p>
                            {!! $cmsPageDetails['description'] !!}
                        </p>
                        </p>
                    </div>
                    <!-- .col -->
                </div>
                <!-- .row -->
            </div>
            <!-- .about-us__main -->
        </div>
        <!-- .container -->
    </section>
@endsection
@section('scripts')

@endsection
