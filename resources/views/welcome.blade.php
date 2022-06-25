@extends('layouts.master')
@section('content')

<!-- flat slider -->
<section class="flat-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="swiper-container mainslider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slider-item">
                            <div class="slider-left">
                                <div class="slider-left-content">
                                    <h3>La meilleure Assurance !</h3>
                                    <h2>Consalti Assurance pour <br>
                                        tout le monde</h2>
                                    <p>Avec Consalti, vous bénéficiez de garanties santé, prévoyance, épargne et retraite complémentaire bien sûr, mais aussi de services sur mesure et d'un accompagnement social personnalisé. BIENVENUE !</p>
                                    <div class="button-slider">
                                        <a href="{{url('/contact')}}" class="button readmore">Consultation Gratuite</a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="slider-right">
                                <div class="image-slider">
                                    <img src="{{asset('front/images/cover.png')}}" alt="images">
                                </div>
                                <div class="mark-slider-1">
                                    <img src="{{asset('front/images/mark-page/mark-slide-item-1.png')}}" alt="images">
                                </div>
                                <div class="mark-slider-2">
                                    <img src="{{asset('front/images/mark-page/mark-slide-item-2.png')}}" alt="images">
                                </div>
                                <div class="mark-slider-3">
                                    <img src="{{asset('front/images/cc.png')}}" alt="images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next btn-slide-next"></div>
                <div class="swiper-button-prev btn-slide-prev active"></div>
            </div>
        </div>
    </div>
</section>
<!-- /flat slider -->

<!-- flat work -->
<section class="tf-space flat-work">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h3 class="section-heading">What We Do</h3>
                    <div class="features-content-left">
                        <h2>Our Business & Financial
                            Consulting Services</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="swiper-container carousel work-carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="work-box wow fadeInUp" data-wow-delay="0ms"
                                data-wow-duration="1500ms">
                                <div class="work-icon">
                                    <div class="top item-shape item-shape1"></div>
                                    <div class="top item-shape item-shape2"></div>
                                    <div class="bottom item-shape item-shape1"></div>
                                    <div class="bottom item-shape item-shape2"></div>
                                    <div class="master-icon-box">
                                        <div class="icon-wrap">
                                            <span class="icon icon-programer"></span>
                                        </div>
                                        <div class="text-wrap">
                                            <h3 class="headline">Program Manager</h3>
                                            <p>It is a long established fact that a reader will be
                                                distracted by the readable content of a page when looking at
                                                its layout.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="work-box active wow fadeInUp" data-wow-delay="300ms"
                                data-wow-duration="1500ms">
                                <div class="work-icon">
                                    <div class="top item-shape item-shape1"></div>
                                    <div class="top item-shape item-shape2"></div>
                                    <div class="bottom item-shape item-shape1"></div>
                                    <div class="bottom item-shape item-shape2"></div>
                                    <div class="master-icon-box">
                                        <div class="icon-wrap">
                                            <span class="icon icon-data"></span>
                                        </div>
                                        <div class="text-wrap">
                                            <h3 class="headline">Strategy & Planning</h3>
                                            <p>It is a long established fact that a reader will be
                                                distracted by the readable content of a page when looking at
                                                its layout.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="work-box wow fadeInUp" data-wow-delay="600ms"
                                data-wow-duration="1500ms">
                                <div class="work-icon">
                                    <div class="top item-shape item-shape1"></div>
                                    <div class="top item-shape item-shape2"></div>
                                    <div class="bottom item-shape item-shape1"></div>
                                    <div class="bottom item-shape item-shape2"></div>
                                    <div class="master-icon-box">
                                        <div class="icon-wrap">
                                            <span class="icon icon-tax"></span>
                                        </div>
                                        <div class="text-wrap">
                                            <h3 class="headline">Tax Management</h3>
                                            <p>It is a long established fact that a reader will be
                                                distracted by the readable content of a page when looking at
                                                its layout.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="work-box">
                                <div class="work-icon">
                                    <div class="top item-shape item-shape1"></div>
                                    <div class="top item-shape item-shape2"></div>
                                    <div class="bottom item-shape item-shape1"></div>
                                    <div class="bottom item-shape item-shape2"></div>
                                    <div class="master-icon-box">
                                        <div class="icon-wrap">
                                            <span class="icon icon-high"></span>
                                        </div>
                                        <div class="text-wrap">
                                            <h3 class="headline">Business Growth Plan</h3>
                                            <p>It is a long established fact that a reader will be
                                                distracted by the readable content of a page when looking at
                                                its layout.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next btn-custom-carousel-next"></div>
                <div class="swiper-button-prev btn-custom-carousel-prev"></div>
            </div>
        </div>
    </div>
</section>
<!-- /flat work -->


<!-- flat about -->
<section class="tf-space flat-about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="about-left-content wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="section-title">
                        <h3 class="section-heading">A propos Consalti</h3>
                        <h2>Consalti Assurance</h2>
                    </div>
                    <p>Maecenas posuere neque et volutpat accumsan. Aliquam hendrerit tincidunt diam eu
                        imperdiet. Etiam dictum suscipit tempus. Vestibulum eget
                        pellentesque dolor. Duis enim risus, malesuada sodales
                        sapien eu, commodo malesuada tortor.
                    </p>
                    <p class="font-weight-500">Every pleasures is to welcomed pain avoided owing to the duty
                        the obligations of business it will frequently occur that pleasures have be
                        repudiated and annoyances accepted.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-right-content tf-counter wow fadeInRight" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="about-post">
                        <img src="{{asset('front/images/team.jpg')}}" alt="images">
                        <div class="about-counter-box wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <div class="about-counter-inner">
                                <div class="number-counter">
                                    <span>0</span>
                                    <span class="number" data-speed="2000" data-to="9"
                                        data-inviewport="yes">5</span>
                                </div>
                                <div class="heading-count">
                                    <h3>YEARS<br>
                                        EXPERIENCE</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /flat about -->


<!-- flat testimonial -->
<section class="tf-space flat-testimonial">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <h3 class="section-heading">Témoignage Clients</h3>
                    <div class="features-content-left">
                        <h2>Heureux de recevoir<br>
                            ces commentaires.</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial-content-left">
                    <div class="testimonial-post">
                        <div class="main-post wow fadeInLeft" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <img src="{{asset('front/images/team.jpg')}}" alt="images">
                        </div>
                        <div class="testimonial-btn-slider">
                            <div class="swiper-button-next btn-custom-carousel-next"></div>
                            <div class="swiper-button-prev btn-custom-carousel-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial-content-right wow fadeInRight" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="swiper-container slider-vertical">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-slide-box">
                                    <div class="testimonal-content">
                                        <p>maro Corporis nihil temporibus magna nesciunt unde cumque quia aspernatur sapiente accusantium  nesciunt unde cumque.</p>
                                    </div>
                                    <div class="testimonal-icon">
                                        <span class="icon-tes"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-slide-box">
                                    <div class="testimonal-content">
                                        <p>
                                            Votre sérieux, votre patience, vos explications nous permettent de choisir quelle option nous allons prendre. Merci infiniment pour votre amabilité.</p>
                                    </div>
                                    <div class="testimonal-icon">
                                        <span class="icon-tes"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-slide-box">
                                    <div class="testimonal-content">
                                        <p>
                                            L'interlocutrice a parfaitement répondu à ma question et a pris le temps de m'accompagner dans la création de mon espace client.</p>
                                    </div>
                                    <div class="testimonal-icon">
                                        <span class="icon-tes"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-slide-box">
                                    <div class="testimonal-content">
                                        <p>
                                            Excellente écoute, amabilité, force de proposition, rapidité de l’envoi de documents. Conseiller très professionnel. Merci beaucoup.</p>
                                    </div>
                                    <div class="testimonal-icon">
                                        <span class="icon-tes"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /flat testimonial -->


<!-- flat subcribe -->
<section class="tf-space flat-subcribe">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="subcribe-content wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <h3>50% discount for your first consultancy</h3>
                    <h2>Join our newsletter and get...</h2>
                    <div class="widget-subcribe">
                        <form action="#" method="get" class="subcribe-form">
                            <input type="email" class="subcribe-form-footer"
                                placeholder="Your email address" value="" name="s" required="">
                            <button class="btn-subcribe" type="submit" title="subcribe">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="subcribe-content-right">
                    <div class="subcribe-post">
                        <img src="{{asset('front/images/subcribe-post@2x.png')}}" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /flat subcribe -->

<!-- flat latest -->
<section class="tf-space flat-latest">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="latest-content-wrap wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="section-title">
                        <h3 class="section-heading">Latest News</h3>
                        <div class="features-content-left">
                            <h2>Something from our<br>
                                latest blog.</h2>
                        </div>
                        <p>Improve efficiency, provide a better customer experience with modern technology
                            services around the world. Our skilled staff, combined</p>
                        <a href="#" class="button readmore">View All blog</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-content-box wow fadeInUp" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <div class="latest-post">
                        <img src="{{asset('front/images/blog1.jpg')}}" alt="images">
                        <div class="post-date">25 JUN
                            2021</div>
                    </div>
                    <div class="latest-content link-style-2">
                        <a href="#" class="heading">We would love to share a
                            similar experience</a>
                        <div class="latest-content-bottom">
                            <div class="post-readmore">
                                <a href="#" class="read-more"><span class="text">Read
                                        More</span></a>
                            </div>
                            <span class="post-tag">Digital</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-content-box wow fadeInUp" data-wow-delay="300ms"
                    data-wow-duration="1500ms">
                    <div class="latest-post">
                        <img src="{{asset('front/images/blog.jpg')}}" alt="images">
                        <div class="post-date">25 JUN
                            2021</div>
                    </div>
                    <div class="latest-content link-style-2">
                        <a href="#" class="heading">In this context our main
                            approach was to build</a>
                        <div class="latest-content-bottom">
                            <div class="post-readmore">
                                <a href="#" class="read-more"><span class="text">Read
                                        More</span></a>
                            </div>
                            <span class="post-tag">Digital</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /flat latest -->
@endsection