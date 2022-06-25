@extends('layouts.master')
@section('content')
<section class="flat-title-page parallax parallax-1 contact-page-title">
    <div class="container-fluid">
        <div class="row">
            <div class="breadcrumbs">
                <h2 class="section-title-page">Get in Touch</h2>
                <div class="breadcrumb-trail link-style-2">
                    <a class="home" href="/">Acceuil</a><span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tf-space flat-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-title link-style-2">
                    <h3 class="section-heading">Let's Talk</h3>
                    <div class="features-content-left">
                        <h2>Speak With Our<br>
                            Consulti</h2>
                    </div>
                    <div class="contact-icon-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="icon meta-address"></div>
                        <div class="content">
                            <h4>66 Broklyant, India 3269 Road.
                                New Eskaton, New York, USA</h4>
                        </div>
                    </div>
                    <div class="contact-icon-box wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="icon meta-mail"></div>
                        <div class="content">
                            <a href="mailto:abc@gmail.com">
                                <h4>Your.Agency@Gmail.Com</h4>
                            </a>
                            <a href="mailto:abc@gmail.com">
                                <h4>My.Shop@Hotmail.Com</h4>
                            </a>
                        </div>
                    </div>
                    <div class="contact-icon-box wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
                        <div class="icon meta-phone"></div>
                        <div class="content">
                            <a href="tel:012345678">
                                <h4>+11 012 888 598 9303</h4>
                            </a>
                            <a href="tel:012345678">
                                <h4>+88 096 965 678 9203</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="title">
                    <h3>Don’t Hesitate<br>
                        To Send Your Message To Us</h3>
                </div>
                <div class="contact-form wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" id="comments" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">
                    <form method="post" id="contactform" class="comment-form form-submit" action="./contact/contact-process.php" accept-charset="utf-8" novalidate="novalidate">
                        <div class="text-wrap clearfix">
                            <fieldset class="name-wrap">
                                <input type="text" id="name" class="tb-my-input" name="name" tabindex="1" placeholder="Name*" value="" size="32" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="email-wrap">
                                <input type="email" id="email" class="tb-my-input" name="email" tabindex="2" placeholder="Email*" value="" size="32" aria-required="true" required="">
                            </fieldset>
                        </div>
                        <fieldset class="message-wrap">
                            <textarea id="comment-message" name="message" rows="13" tabindex="4" placeholder="write your comment" aria-required="true"></textarea>
                        </fieldset>
                        <button name="submit" type="submit" id="comment-reply" class="button btn-style4 btn-submit-comment">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-map">
    <div class="container-fluid">
        <div class="row">
            <div class="inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13231.744998391967!2d-6.7202066!3d33.9941712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8b6155a966d4ca3e!2sOrange%20Business%20Services!5e0!3m2!1sfr!2sde!4v1652284350398!5m2!1sfr!2sde" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection