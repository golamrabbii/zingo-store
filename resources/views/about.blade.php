@extends('layouts.main')

@section('title')
    About us - eBuy
@endsection

@section('content')

{{-- content --}}
    
        	<div class="wrapper">
        	<div class="about-us-area pt-125 pb-125">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="overview-content">
                                <h1><span>e</span>Buy</h1>
                                <h2 style="font-size: 30px;">World's largest <span>E-COMMERCE </span>Website</h2>
                                <p style="text-align: justify;"><span>eBuy</span> the most latgest e-commerce website in the world can serve you latest quality of products, also you can sell here your products it quo minus iduod maxie placeat facere possimus, omnis voluptas assumenda est, omnis dolor llendus. Temporibus autem quibusdam </p>
                                <div class="question-area">
                                    <h4>HAVE ANY QUESTION? </h4>
                                    <div class="question-contact">
                                        <div class="question-icon">
                                            <i class="icofont icofont-phone"></i>
                                        </div>
                                        <div class="question-content-number">
                                            <h6> +88 01521 430 684</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="overview-img">
                                <img class="tilter" src="{{ asset('images/e-commerce.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-area pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-services orange mb-30 text-center">
                                <div class="services-icon">
                                    <img alt="" src="assets/img/icon-img/3.png">
                                </div>
                                <div class="services-text">
                                    <h5>FREE SHIPPING</h5>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-services yellow mb-30 text-center">
                                <div class="services-icon">
                                    <img alt="" src="assets/img/icon-img/4.png">
                                </div>
                                <div class="services-text">
                                    <h5>ONLINE SUPPORT</h5>
                                    <p>Online support 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-services purple mb-30 text-center">
                                <div class="services-icon">
                                    <img alt="" src="assets/img/icon-img/5.png">
                                </div>
                                <div class="services-text">
                                    <h5>MONEY RETURN</h5>
                                    <p>Back guarantee under 5 days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-services sky mb-30 text-center">
                                <div class="services-icon">
                                    <img alt="" src="assets/img/icon-img/6.png">
                                </div>
                                <div class="services-text">
                                    <h5>MEMBER DISCOUNT</h5>
                                    <p>Onevery order over $150</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-area">
                <div class="container">
                    <div class="section-title-2 section-title-position">
                        <h2>OUR CLIENTS REVIEW</h2>
                    </div>
                    <div class="testimonial-active owl-carousel">
                        <div class="single-testimonial">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="testimonial-img pl-75">
                                        <img alt="image" src="{{ asset('images/client/demo.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="testimonial-content">
                                        <div class="testimonial-dec">
                                            <p><span>eBuy</span> the most latgest bike store in the wold can serve you latest  qulity of motorcycle also you can sell here your motorcycle it quo minus iduod maxie placeat facere possimus, omnis voluptas assumenda est, omnis dolor llendus. Temporibus autem quibusdam quoten</p>
                                        </div>
                                        <div class="name-designation">
                                            <h4>Rayed Ayash Hisham</h4>
                                            <span>COO, ASEKHA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="testimonial-img pl-75">
                                        <img alt="image" src="{{ asset('images/client/demo2.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="testimonial-content">
                                        <div class="testimonial-dec">
                                            <p><span>eBuy</span> Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis dolor in reprehenderit.</p>
                                        </div>
                                        <div class="name-designation">
                                            <h4>James Momen Nirob</h4>
                                            <span>CEO, ASEKHA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our team Section -->
<section id="team" class="team content-section" style="margin-top: 140px;">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h2>Our Team</h2>
        <h3 class="caption gray">Meet the people who make awesome stuffs</h3>
      </div><!-- /.col-md-12 -->

      <div class="container">
        <div class="row">


        </div><!-- /.row -->
      </div><!-- /.container -->

    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.our-team -->
                    

    </div>


@endsection