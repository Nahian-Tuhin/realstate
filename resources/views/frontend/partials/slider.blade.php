

<section class="main-slider">
    {{-- <style>
  .slider-content h2{
    background-color:transparent;
  }
    </style> --}}

        {{-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach ($sliders as $banner)
                    <div class="item @if ($loop->first) active @endif"
                        style="background-size: cover;background-repeat: no-repeat;background-position: center center;background-attachment: fixed; background-image: url('{{ asset('uploads/banner/' . $banner->background_img) }}'); height: 100vh;">
                        <div class="slider-content">
                            <a href="{{ route('banner.details', $banner->id) }}">
                                @if (!empty($banner->banner_image))
                                <img class="project-logo img-rounded" src="{{ asset('uploads/banner/'.$banner->banner_image) }}"
                                    alt="{{ $banner->title }}">
                            @else
                                <img class="project-logo"
                                    src="{{ url('uploads/banner/no_image.png') }}" alt="No Image">
                            @endif
                            <h2>{{ $banner->title }}</h2>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> --}}











    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="realand-slider-1" data-source="gallery" style="margin: 0px auto; background: rgba(0,0,0,0.5); padding: 0px; margin-top: 0px; margin-bottom: 0px;">
        <!-- START REVOLUTION SLIDER 5.4.6 fullwidth mode -->
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display: none;" data-version="5.4.6">
            <ul>
                <!-- SLIDE  -->
                @foreach ($sliders as $banner)

                <li data-index="rs-{{ $loop->index + 1 }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                 data-thumb="{{ URL::asset('') }}images/logo/ibas.png" data-rotate="0" data-saveperformance="off" data-title="Slide"
                  data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                  data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ URL::asset('') }}images/revslider/dummy.png" alt="" title="main_slider_1" width="1920" height="820"
                    data-lazyload="{{ asset('uploads/banner/'.$banner->background_img) }}"
                    data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-60','-40']" data-fontsize="['18','18','16','14']"
                     data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                     data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                     data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                     data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 18px; line-height: 22px; font-weight: 400; color: #f3f3f3; letter-spacing: 0px; font-family: Roboto;">
                     <img src="{{ asset('uploads/banner/'.$banner->banner_image) }}"  alt="Ibrahim Al Saffar  General Cont." title="Ibrahim Al Saffar  General Cont." />  </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="['center','center','center','center']"
                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                      data-fontsize="['60','60','40','26']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                       data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 6; white-space: nowrap; font-size: 60px; line-height: 22px; font-weight: 900; color: #ffffff; letter-spacing: 0px; font-family: Raleway;">
                        {{ $banner->title }}
                    </div>

                    <!-- LAYER NR. 3 -->

                    <a href="
                    @if ($banner->link == null )
                    {{ route('banner.details', $banner->id) }}
                    @else
                    {{ url('/').'/'.$banner->link }}
                    @endif
                    " data-lity class="tp-caption   tp-resizeme" target="_self" id="slide-1-layer-7" data-x="['center','center','center','center']" data-hoffset="['6','6','6','6']" data-y="['top','top','top','top']" data-voffset="['480','380','300','230']" data-fontsize="['60','60','36','36']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='' data-responsive_offset="on" data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 60px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px; font-family: Open Sans; text-decoration: none;"><i class="fa fa-play-circle-o"></i></a>
                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>




    <!-- END REVOLUTION SLIDER -->













    <section class="main-search main-search--absolute">
        <div class="container">
            <div class="main-search__container">
                <section class="listing-search">

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="listing-type" class="feature__title">HVAC :</label>
                            <p class="feature__desc">Chilled water system including AHU , Chillers, Pumps etc .  Also standalone units , package units </p>
                        </div>
                        <!-- .col -->

                        <div class="col-sm-3">

                            <label for="offer-type" class="feature__title">Ducting Works:</label>
                            <p class="feature__desc">A duct installer work involves section cutting to assemble commercial rigid air conditioning duct work / systems </p>
                        </div>
                        <!-- .col -->

                        <div class="col-sm-2">

                            <label for="offer-type" class="feature__title">Plumbing Works:</label>
                            <p class="feature__desc">Interprets blueprints and building specifications to map layout for pipes, drainage systems, and other plumbing materials </p>
                        </div>
                        <!-- .col -->
                        <div class="col-sm-2">

                            <label for="offer-type" class="feature__title">Fire Fighting :</label>
                            <p class="feature__desc">Firefighters are primarily responsible for responding to fires, accidents and other incidents </p>
                        </div>

                        <div class="col-sm-2">

                            <label for="offer-type" class="feature__title">Electrical Works:</label>
                            <p class="feature__desc">Inspect electrical components, such as transformers and circuit breakers. Identify electrical problems with a variety of testing devices</p>
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- row -->

                </section>

            </div>
            <!-- .main-search__container -->
        </div>
        <!-- .container -->
    </section>
    <!-- .main-search -->


</section>


