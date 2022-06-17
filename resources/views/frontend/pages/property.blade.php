@extends('frontend.layouts.front_app')
@section('title')
    Contact Us
@endsection

@section('styles')
    <style>
        .jumbotron {
            padding-top: 20px;
            padding-bottom: 20px;
            padding-right: 10px;
            padding-left: 10px;
        }

        .search-container {
            background: #eceff5;
            border: 2px solid #233861;
            border-radius: 5px;
            height: 200px;
        }

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

        .form-group {
            margin-bottom: 0.7rem !important;
            margin-right: 1.563rem;
        }

        .myBtn {
            background: green;
            padding-top: 10px;
            padding-bottom: 10px;
            min-height: 40px;
            margin-bottom: 13px;
            color: white;
        }

        .prices {
            DISPLAY: FLEX;
            MARGIN-BOTTOM: 20PX;
        }

    </style>
@endsection
@section('content')
    <section class="contact">
        <div class="container">
            <div class="jumbotron">
                <form action="{{ route('searchProperty') }}" class="form-inline search-form" method="get">
                    {!! Form::hidden('price_from', null, ['id' => 'price_from']) !!}
                    {!! Form::hidden('price_to', null, ['id' => 'price_to']) !!}
                    <div class="form-group">
                        <label for="category_id">Property Type</label>
                        <select id="category_id" name="category_id" class="ht-field listing-sort__field">
                            <option value="">Property Type</option>
                            @foreach ($categoryList as $pCategory)
                                <option value="{{ $pCategory->category_id }}">{{ $pCategory->category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bedroom">Bathrooms</label>
                        <select name="bathroom" class="ht-field listing-sort__field">
                            <option value="">Bathrooms</option>
                            @foreach ($bathrooms as $bathroom)
                                <option value="{{ $bathroom }}">{{ $bathroom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bedrooms">Bedrooms</label>
                        <select name="bedroom" id="bedrooms" class="ht-field listing-sort__field">
                            <option value="">Bedrooms</option>
                            @foreach ($bedrooms as $bedroom)
                                <option value="{{ $bedroom }}">{{ $bedroom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rental_period">Rental period</label>
                        <select name="rental_period" class="ht-field listing-sort__field">
                            <option value="">Rental period</option>
                            @foreach ($rental_periods as $rental_period)
                                <option value="{{ $rental_period }}">{{ $rental_period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bedroom">Prices</label>
                        <div class="prices">
                            <input placeholder="Min price" class="price_from" type="number" name="price_from" min="1">
                            <input placeholder="Target Price" class="price_to" type="number" name="price_to" min="2">
                        </div>
                    </div>
                    <button type="submit" class="form-control myBtn">Search</button>
                </form>
            </div>

            <div class="row">
                @foreach ($allProperty as $property)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-xxs-12">
                        <div class="ct-itemProducts">
                            <div class="ct-main-content-card animate__animated animate__pulse">
                                <div class="ct-imageBox">
                                    <a href="">
                                        <img alt="" class="img-responsive"
                                            src="{{ asset('/uploads/property_img/' . $property->image) }}"
                                            onerror="this.src='{{ asset('/uploads/property_img/default.png') }}'">
                                    </a>
                                </div>

                                <div class="card-text">
                                    <div class="ct-main-text">
                                        <a href="{{ route('propertyDetails', $property->slug) }}">
                                            <h1 class="property-title"> {{ $property->title }}</h1>
                                        </a>
                                        <hr>
                                        <h5><i class="fa-solid fa-location-dot"></i>{{ $property->category->title }}
                                            rent in {{ $property->address }}</h5>
                                        <h5 class="price">
                                            Price :
                                            @if ($property->price != 0)
                                                AED: {{ $property->price }}
                                                <small>/&nbsp;{{ $property->rental_period }}</small>
                                            @else
                                                Negotiable
                                            @endif

                                        </h5>
                                        <div class="info" style="display: flex; clear: both;">
                                            <div class="listing-info bedroom">
                                                <span class="title">Bedrooms</span>
                                                <span class="number">{{ $property->bedroom }}</span>
                                            </div>
                                            <div class="listing-info bath">
                                                <span class="title">Baths</span>
                                                <span class="number"> {{ $property->bathroom }}</span>
                                            </div>
                                            <div class="listing-info size">
                                                <span class="title">Size (Sq.ft)</span>
                                                <span class="number"> {{ $property->size_sqft }}</span>
                                            </div>
                                            <!-- end list1_info -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- .contact -->
@endsection
@section('scripts')
    <script>
        $(document).on('change', '#filter_price', function() {
            var from_price = $(this).find(':selected').data('from');
            var to_price = $(this).find(':selected').data('to');
            $('#price_from').val(from_price);
            $('#price_to').val(to_price);
        })
    </script>
@endsection
