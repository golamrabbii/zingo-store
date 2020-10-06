@extends('layouts.main')

@section('title')
    Contact - eBuy
@endsection

@section('content')

{{-- content --}}
    <div class="container">
        <div class="row">
        	<div class="contact-area pt-130">
                <div class="container">
                    <div class="contact-map">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="all-info ptb-130">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-info-wrapper">
                                    <h4 class="contact-title">INFORMATION</h4>
                                    <div class="communication-info">
                                        <div class="single-communication">
                                            <div class="communication-icon">
                                                <i class="ti-home" aria-hidden="true"></i>
                                            </div>
                                            <div class="communication-text">
                                                <h4>Address:</h4>
                                                <p>Miata 309 S Main St,Stafford, KS 67578</p>
                                            </div>
                                        </div>
                                        <div class="single-communication">
                                            <div class="communication-icon">
                                                <i class="ti-mobile" aria-hidden="true"></i>
                                            </div>
                                            <div class="communication-text">
                                                <h4>Phone:</h4>
                                                <p>0123 456 789 - 15 2368 4597</p>
                                            </div>
                                        </div>
                                        <div class="single-communication">
                                            <div class="communication-icon">
                                                <i class="ti-email" aria-hidden="true"></i>
                                            </div>
                                            <div class="communication-text">
                                                <h4>Email:</h4>
                                                <p><a href="#">Support@BootExperts.com</a></p>
                                            </div>
                                        </div>
                                        <div class="single-communication">
                                            <div class="communication-icon">
                                                <i class="ti-world" aria-hidden="true"></i>
                                            </div>
                                            <div class="communication-text">
                                                <h4>Website:</h4>
                                                <p><a href="#">https://DevItems.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-message-wrapper">
                                    <h4 class="contact-title">GET IN TOUCH</h4>
                                    <div class="contact-message">
                                        <form id="contact-form" action="#" method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="contact-form-style mb-20">
                                                        <input name="name" placeholder="Full Name" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="contact-form-style mb-20">
                                                        <input name="email" placeholder="Eail Address" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="contact-form-style mb-20">
                                                        <input name="subject" placeholder="Subject" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="contact-form-style">
                                                        <textarea name="message" placeholder="Massage"></textarea>
                                                        <button class="submit cr-btn btn-style" type="submit"><span>SEND MASSAGE</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
        </div>
    </div>


@endsection