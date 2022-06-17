@extends('frontend.layouts.front_app')
@section('title')
    Search Result
@endsection
@section('styles')
    <style>
        .card-text {
            margin-top: 2.5rem;
        }

        .property-title {
            padding-bottom: 1.2rem;
        }

        .ct-main-text i {
            font-size: 1.5rem;
            color: #0b6ca5;
            padding-right: 0.313rem;
        }

        .ct-main-text span {
            font-size: 1.5rem;
            color: #0b6ca5;
        }

        .listing-info span {
            color: #0c1124;
            font-size: 20px;
            padding: 15px;
        }

        .info {
            background: #c1d9e3;
            color: #1c1a1a;
            border-radius: 10px;
            padding: 5px;
            margin-top: 20px;
        }

        .price {
            margin-top: 1rem;
            color: #fc330b;
        }

    </style>
@endsection

@section('content')
    <section class="contact">
        <div class="container">
            <div class="row">
                @forelse ($searchData as $property)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-xxs-12">
                        <div class="ct-itemProducts">
                            <div class="ct-main-content-card animate__animated animate__fadeInTopLeft">
                                <div class="ct-imageBox">
                                    <a href="{{ route('propertyDetails', $property->slug) }}">
                                        <img alt="Image" class="img-responsive"
                                            src="{{ asset('/uploads/property_img/' . $property->image) }}"
                                            onerror="this.src='{{ asset('/uploads/property_img/default.png') }}'">
                                    </a>
                                </div>
                                <div class="card-text">
                                    <div class="ct-main-text">
                                        <h1 class="property-title">{{ $property->title }}</h1>
                                        <hr>
                                        <h5><i class="fa-solid fa-location-dot"></i>{{ $property->title }}
                                            rent in {{ $property->address }}</h5>
                                        <h5 class="price">
                                            AED: {{ $property->price }}
                                        </h5>
                                        <div class="info" style="display: flex; clear: both;">
                                            <div class="listing-info bedroom">
                                                <span class="title">Bedrooms</span>
                                                <span class="number">{{ $property->bedroom }}</span>
                                            </div>
                                            <div class="listing-info bath">
                                                <span class="title">Baths</span>
                                                <span class="number">{{ $property->bathroom }}</span>
                                            </div>
                                            <div class="listing-info size">
                                                <span class="title">Size (Sq.ft)</span>
                                                <span class="number">{{ $property->size_sqft }}</span>
                                            </div>
                                            <!-- end list1_info -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No property data found
                @endforelse
            </div>
        </div>
    </section>
    <!-- .contact -->
@endsection
@section('scripts')
    <script></script>
@endsection
