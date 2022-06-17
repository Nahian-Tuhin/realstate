@extends('frontend.layouts.front_app')
@section('title')
   {{ $data->title }}
@endsection
@section('content')

<section class="about-us">
    <div class="container">
        <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
            <li class="ht-breadcrumbs__item"><a href="{{ url('/') }}" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
            <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">{{ $data->title }}</span></li>
        </ul>
        <!-- ht-breadcrumb -->

        <div class="about-us__main">
            <div class="row">
                <div class="col-md-8 col-md-main">
                    <div class="about-us__img">
                        <img src="{{ URL::asset('') }}/uploads/latestupdates/{{ $data->image }}" alt="{{ $data->title }}">
                    </div>
                    <!-- .about-us__img -->
                    <h1 class="about-us__title">{{ $data->title }}</h1>
                    <p>
                        {{ $data->text }}
                    </p>

                        </div>
                <!-- .col -->
                <aside class="col-md-4 col-md-sidebar">
                    <section class="widget">
                        <div class="contact-form contact-form--bordered contact-form--wild-sand">
                            <div class="contact-form__header">
                                <h3 class="contact-form__title">Get more Details</h3>
                                <span id="ctl00_ContentPlaceHolder1_lblmsg"></span>
                            </div>
                            <!-- .contact-form__header -->
                            <form action="{{ url('contact') }}" method="post">
                                @csrf
                            <div class="contact-form__body">
                                <input name="name" type="text" id="ctl00_ContentPlaceHolder1_txtName" class="contact-form__field" placeholder="Your Name" required />
                                <input name="email" type="text" id="ctl00_ContentPlaceHolder1_txtEmail" class="property__form-field" placeholder="Your Email" required />
                                <input name="subject" type="text" id="ctl00_ContentPlaceHolder1_txtphone" class="property__form-field" placeholder="Your Phone/Subject" required/>
                                 <textarea name="user_message" rows="4" cols="20" id="ctl00_ContentPlaceHolder1_txtMessage" class="property__form-field" placeholder="Message" required>
                                        </textarea>

                            </div>
                            <!-- .contact-form__body -->

                            <div class="contact-form__footer">
                            <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="Submit" id="ctl00_ContentPlaceHolder1_btnSubmit" class="contact-form__submit" />

                            </div>
                            </form>
                            <!-- .contact-form__footer -->
                        </div>
                        <!-- .contact-form -->
                    </section>
                    <!-- .widget -->

                    <section class="widget widget--wild-sand widget--padding-20 widget__news">
                        <h3 class="widget__title">Get to Know</h3>
                        <ul class="widget__news-list">
                            <li class="widget__news-item"><a href="{{ url('/about') }}">Ibrahim Al Saffar  General Cont.</a></li>
                            <li class="widget__news-item"><a href="{{ url('/alamin') }}">Al Amin  Corner Cont.</a></li>
                            <li class="widget__news-item"><a href="{{ url('/fullpower') }}">Full Power  Electromechanic  al Cont.LLC.</a></li>
                            <li class="widget__news-item"><a href="{{ url('/crownvalley') }}">Crown Valley  General Cont.</a></li>
                            @forelse ( footerlink2() as $item)
                            <li class="widget__news-item"><a href="{{ route('latest_mep',$item->slug) }}">{{ $item->title }} </a></li>
                        @empty
                            @endforelse
                            <li class="widget__news-item"><a href="{{ url('/properties') }}">Trust Famous  Real Estate</a></li>
                        </ul>
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
<!-- .about-us -->



    <section class="features">

        <div class="features__overlay">


            <div class="container">

                <div class="row" >
                    <div class="col-md-12 text-center">
                        <h2 style="text-transform:uppercase;margin-bottom:20px;color:white">Our Clients</h2>
                    </div>
                    <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                           <img src="{{ URL::asset('') }}images/clients/c7.jpg" alt="" title=""/>

                    </div>
                    <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                           <img src="{{ URL::asset('') }}images/clients/c1.jpg"  alt="" title=""/>

                    </div>
                     <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                          <img src="{{ URL::asset('') }}images/clients/c2.jpg" alt="" title=""/>

                    </div>

                    <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                         <img src="{{ URL::asset('') }}images/clients/c3.jpg" alt="" title=""/>

                    </div>
                  <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                         <img src="{{ URL::asset('') }}images/clients/c4.jpg"alt="" title=""/>

                    </div>
                   <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                           <img src="{{ URL::asset('') }}images/clients/c5.jpg" alt="" title=""/>

                    </div>
                    <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                           <img src="{{ URL::asset('') }}images/clients/c6.jpg" alt="" title=""/>

                    </div>

                   <div class="col-sm-6 col-md-3" style="margin-bottom: 20px">

                           <img src="{{ URL::asset('') }}images/clients/c8.jpg" alt="" title=""/>

                    </div>



                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .features__overlay -->
    </section>
    <!-- .features -->
{{-- </form> --}}
@endsection
