@extends('frontend.layouts.front_app')
{{-- @section('title')

@endsection --}}
@section('content')


<section class="featured-listing">

    <div class="container">



        <hr>
        {{-- <div class="container " > --}}
            <h2   class="section__title text-center" style="margin-top: 50px" >Latest Updates:</h2>
            <br>
            {{-- <h2>Ticker 3</h2> --}}
            {{-- <button class="up3">Up</button> <button class="down3">Down</button> --}}
            {{-- <div class="myTicker3">

                <ul>

                    <li > <h5>
                        <i class="fa fa-bullhorn" aria-hidden="true"></i> <a href="{{ route('latest_updates',[$item->id, $item->title]) }}">{{ $item->title }}</a>

                        </h5></li> --}}
                        {{-- &nbsp; --}}


                {{-- </ul> --}}
            {{-- </div> --}}

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                            <hr>
                            {{-- <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news">
                            </div> --}}
                            {{-- <span class="d-flex align-items-center">Latest Updates</span> --}}

                            <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                @foreach ($updates as $item)

                                <span class="dot"></span>
                                <a href="{{ route('latest_updates',[$item->id, $item->title]) }}">
                                    {{ $item->title }}</a>
                                      @endforeach
                                  {{-- <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </a>
                                  <span class="dot"></span> <a href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse </a> --}}
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>


        {{-- </div> --}}
        <hr>

        <h2 class="section__title" style="margin-top: 50px">List of Ongoing Projects :</h2>
        <div class="row">
            @forelse ($ongoing as $property)
            <div class="col-md-4 featured-listing__container">
                <div class="listing">
                    <div class="item-grid__image-container">
                        <a href="{{ route('propertyDetails', $property->slug) }}">
                            <div class="item-grid__image-overlay"></div>
                            <!-- .item-grid__image-overlay -->
                            <img src="{{ asset('uploads/property_img/' . $property->image) }}"
                                alt="{{ $property->title }}" class="listing__img">
                        </a>
                    </div>
                    <!-- item-grid__image-container -->
                    <div class="item-grid__content-container">
                        <div class="listing__content">
                            <h3 class="listing__title"><a href="{{ route('propertyDetails', $property->slug) }}">{{ $property->title }}</a>
                            </h3>
                            <p class="listing__location">
                                {{ Str::limit($property->description, 200, '...') }}
                            </p>
                            <!-- .listing__details -->
                        </div>
                        <!-- .listing-content -->
                    </div>
                    <!-- .item-grid__content-container -->
                </div>
                <!-- .listing -->
            </div>
            <!-- .col -->
            @empty
            No ongoin project
            @endforelse
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>


<!-- .featured-listing -->
<!-- .item-grid-2 -->
<section class="features">
    <div class="features__overlay">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="feature">
                        <img src="{{ URL::asset('') }}images/icon_map.png" alt="Map" class="feature__icon">
                        <h3 class="feature__title">Our Values</h3>
                        <p class="feature__desc">
                            Our technical solutions empower us to quickly bring bold ideas to market. We will continue
                            to leverage new technology and innovate for the future.
                        </p>
                    </div>
                    <!-- .feature -->
                </div>
                <!-- .col -->
                <div class="col-sm-4">
                    <div class="feature">
                        <img src="{{ URL::asset('') }}images/icon_search.png" alt="Search" class="feature__icon">
                        <h3 class="feature__title">Our Strategy</h3>
                        <p class="feature__desc">
                            Timeously execute select building projects, by utilising proactive management skills with
                            carefully selected clients and consultants.
                        </p>
                    </div>
                    <!-- .feature -->
                </div>
                <!-- .col -->
                <div class="col-sm-4">
                    <div class="feature">
                        <img src="{{ URL::asset('') }}images/icon_negotiation.png" alt="Negotiation"
                            class="feature__icon">
                        <h3 class="feature__title">Our Vision</h3>
                        <p class="feature__desc">
                            Our diverse teams are problem-solvers and collaborate with our customers to solve their most
                            difficult challenges.
                        </p>
                    </div>
                    <!-- .feature -->
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .features__overlay -->
</section>
<!-- .features -->
<section class="testimonial">
    <div class="container">
        <div class="testimonial__container">
            <div class="row">
                <div class="col-md-6">
                    <div class="testimonial__video">
                        <img src="{{ URL::asset('') }}images/uploads/about_home.jpg" alt="Testimonial"
                            class="testimonial__video-img">
                        <div class="testimonial__overlay"></div>
                        <!-- .testimonial__overlay -->
                    </div>
                    <!-- .testimonial__video -->
                </div>
                <!-- .col -->
                <div class="col-md-6">
                    <div class="testimonial__content">
                        <h2 class="section__title">About Us</h2>
                        <p class="testimonial__desc">Ibrahim Al Saffar is operating in the UAE and specifically in Abu
                            Dhabi since the last 20 years. We provide services in the MEP Contracting sector as an
                            installation Sub-Contractor for major projects. We have been associated with the largest MEP
                            Contractors in the business and have undertaken complex installation on some of the major
                            projects in the country.</p>
                        <div class="testimonial__customer">
                            <div class="testimonial__customer-profile">
                                <a href="{{ url('/about') }}" class="listing__btn">+ Read More <span
                                        class="listing__btn-icon"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></a>
                            </div>
                            <!-- .testimonial__customer-profile -->
                        </div>
                        <!-- .testimonial__customer -->
                    </div>
                    <!-- .testimonial__content -->
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .testimonial__container -->
    </div>
    <!-- .container -->
</section>
<!-- .testimonial -->
<section class="features">
    <div class="features__overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="text-transform:uppercase;margin-bottom:20px">Our Clients</h2>
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c7.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c1.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c2.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c3.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c4.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c5.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c6.jpg" alt="" title="" />
                </div>
                <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">
                    <img src="{{ URL::asset('') }}images/clients/c8.jpg" alt="" title="" />
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .features__overlay -->
</section>
@endsection
