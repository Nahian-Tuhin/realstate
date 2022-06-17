@extends('frontend.layouts.front_app')
@section('title')
    {{ $propertyDetails->title }}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('') }}inputtelephone/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="{{ URL::asset('') }}inputtelephone/css/demo.css">
    <style>
        .contact-form__submit {
            background-color: #1fc341;
            color: #ffffff;
            font-size: 13px;
            font-weight: 500;
            text-align: center;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 4px;
            border: none;
            padding: 10px;
        }

        [type=color],
        [type=date],
        [type=datetime],
        [type=datetime-local],
        [type=email],
        [type=month],
        [type=number],
        [type=password],
        [type=search],
        [type=tel],
        [type=text],
        [type=url],
        [type=week],
        [type=time],
        [type=submit],
        select,
        textarea {
            border: 1px solid rgb(6, 27, 14);
            margin-bottom: 10px;
        }

        #defaulMessasge {
            margin-top: 10px;
        }

        .iti--allow-dropdown input,
        .iti--allow-dropdown input[type=tel],
        .iti--allow-dropdown input[type=text],
        .iti--separate-dial-code input,
        .iti--separate-dial-code input[type=tel],
        .iti--separate-dial-code input[type=text] {
            width: 566px;
        }

    </style>
@endsection
@section('content')
    <section class="about-us">
        <div class="container">
            @include('frontend.partials.flash_msg')
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="{{ url('/') }}" class="ht-breadcrumbs__link"><span
                            class="ht-breadcrumbs__title">Home</span></a></li>
                <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span
                            class="ht-breadcrumbs__title">{{ $propertyDetails->category->title }}</span></a></li>
                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">{{ $propertyDetails->title }}</span>
                </li>
            </ul>
            <!-- ht-breadcrumb -->

            <div class="about-us__main">
                <div class="row">
                    <div class="col-md-8 col-md-main">
                        <div class="about-us__img">
                            <img src="{{ asset('uploads/property_img/' . $propertyDetails->image) }}" alt="Image">
                        </div>
                        <!-- .about-us__img -->
                        <h1 class="about-us__title">{{ $propertyDetails->title }}</h1>
                        <p>
                            {{ $propertyDetails->description }}
                        </p>
                        </p>
                    </div>
                    <!-- .col -->
                    <aside class="col-md-4 col-md-sidebar">
                        <section class="widget">
                            <button type="button" class="contact-form__submit" data-toggle="modal"
                                data-target="#exampleModal">
                                Send Property Query
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('propertyQuery') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Email to Publisher</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input name="title" type="text" value="{{ $propertyDetails->title }}" readonly>
                                                <input name="property_slug" type="hidden"
                                                value="{{ $propertyDetails->slug }}">
                                                <input name="name" type="text" placeholder="Your name">
                                                <input name="email" type="email" placeholder="Enter your email">
                                                <input name="mobile" id="phone" type="tel">
                                                <textarea name="default_message" class="message-area">
                                                Hi, I found your property on your web site. Please contact me. Thank you.
                                                </textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-success" value="Send Mail">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- .contact-form -->
                        </section>
                        <!-- .widget -->
                    </aside>
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
    <script src="inputtelephone/js/intlTelInput.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // allowDropdown: false,
            // autoHideDialCode: false,
            // autoPlaceholder: "off",
            // dropdownContainer: document.body,
            // excludeCountries: ["us"],
            // formatOnDisplay: false,
            // geoIpLookup: function(callback) {
            //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp && resp.country) ? resp.country : "";
            //     callback(countryCode);
            //   });
            // },
            // hiddenInput: "full_number",
            // initialCountry: "auto",
            // localizedCountries: { 'de': 'Deutschland' },
            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            // preferredCountries: ['cn', 'jp'],
            // separateDialCode: true,
            utilsScript: "inputtelephone/js/utils.js",
        });
    </script>

    <script type="text/javascript">
        $(function() {
            var pane = $('#defaulMessasge');
            pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
                .replace(/(<[^\/][^>]*>)\s*/g, '$1')
                .replace(/\s*(<\/[^>]+>)/g, '$1'));
        });
    </script>
@endsection

