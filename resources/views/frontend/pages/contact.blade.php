@extends('frontend.layouts.front_app')
@section('title')
    Contact Us
@endsection
@section('content')
    <section class="contact">
        <div class="container">
            <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
                <li class="ht-breadcrumbs__item"><a href="Default.html" class="ht-breadcrumbs__link"><span
                            class="ht-breadcrumbs__title">Home</span></a></li>

                <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">Contact Us</span></li>
            </ul>
            <!-- ht-breadcrumb -->
            @include('frontend.partials.flash_msg')
            <div class="contact__main">
                <div class="contact__map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d97767.74769921151!2d54.46012710570673!3d24.405098864533173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sP.O.Box%20-%2072849%2C%20Abu%20Dhabi%2C%20U%20A%20E!5e0!3m2!1sen!2sbd!4v1649394726370!5m2!1sen!2sbd"
                        width="1140" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- .contact__map-container -->

                <div class="row">
                    <div class="col-md-6">
                        <h2 class="contact__title">Contact Us</h2>
                        <div class="contact__desc">
                            <p>You can contact us by a call, a message or visit us</p>
                            <p>From <strong>Saturday</strong> to <strong>Thursday, 8:00 am - 6:00 pm</strong></p>
                        </div>
                        <ul class="agency__contact">
                            <li class="agency__contact-phone"><a href="tel:  +971 264 22 331"> +971 264 22 331, 642 64
                                    63</a></li>
                            <li class="agency__contact-phone"><a href="tel:  +971 55 3400 206"> +971 55 3400 206</a></li>
                            <li class="agency__contact-website"><a href="#">www.ibasuae.com</a></li>
                            <li class="agency__contact-email"><a href="mailto:Sales@ibasuae.com">Sales@ibasuae.com</a></li>
                            <li class="agency__contact-address"> Hazza Bin Zayed Road. Office No: M1,
                                Bld. No: 725,<br /> Malek Sayed Yousuf Kabil Building. <br />Opposite Building of Grand
                                Millennium & Al Wahda Mall,<br />
                                P.O.Box - 72849, Abu Dhabi, U A E,</li>
                        </ul>
                    </div>
                    <!-- .col -->
                    <div class="col-md-6">

                        <h2 class="contact__title">Send Us a Message</h2>
                        <div class="contact__desc">
                            <p>Send a message about your query we will reply</p>
                        </div>
                        <form action="{{ url('contact') }}" method="post">
                            @csrf
                            <div class="contact-form contact-form--no-padding">
                                <div class="contact-form__body">
                                    <div class="row">
                                        <input name="name" type="text" class="contact-form__field" placeholder="Your Name"
                                            required />
                                        <input name="subject" type="text" class="contact-form__field" placeholder="Subject"
                                            required />

                                        <div class="col-md-6">
                                            <input name="email" type="text" class="property__form-field"
                                                placeholder="Your Email" required />
                                        </div>
                                        <div class="col-md-6">
                                            <input name="phone" type="text" class="property__form-field"
                                                placeholder="Your Phone" required />

                                        </div>
                                    </div>
                                    <textarea name="user_message" rows="4" cols="20" id="ctl00_ContentPlaceHolder1_txtMessage" class="property__form-field"
                                        placeholder="Message" required="">
                                    </textarea>

                                </div>
                                <!-- .contact-form__body -->
                                <div class="contact-form__footer">
                                    <input type="submit" value="Submit" class="contact-form__submit"/>
                                </div>
                                <!-- .contact-form__footer -->
                            </div>
                        </form>
                        <!-- .contact-form -->
                    </div>
                    <!-- .col -->
                </div>
                <!-- .row -->
            </div>
            <!-- .contact__main -->
        </div>
    </section>
    <!-- .contact -->
@endsection
