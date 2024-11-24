@extends('layouts.BasicView')
@section('title', 'Havenseek')
@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg6">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>FAQ</li>
                </ul>
                <h3>FAQ</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->
    <!-- FAQ Area -->
    <div class="faq-area pt-100 pb-70 section-bg-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq-content faq-content-bg2">
                        <div class="section-title">
                            <span class="sp-color">FREE OF QUESTION</span>
                            <h2>Let's Start a Free of Questions and Get a Quick Support</h2>
                            <p>We are the agency that prioritizes your inquiries, allowing you to ask any questions freely
                                and easily.</p>
                        </div>

                        <div class="faq-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        How Can I Book a Venue or Resort?
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            To book a place or resort with us, start by visiting our website and browsing
                                            through our selection of venues. Once you find the venue that suits your needs,
                                            check its availability using our online calendar. Next, fill out the booking
                                            form with your preferred dates and any specific requirements you may have.
                                            Submit the form, and our team will review your request. We will then contact you
                                            to confirm your reservation and finalize any additional details. If you have any
                                            questions or need assistance during the booking process, don’t hesitate to reach
                                            out to us directly; we’re here to help.
                                        </p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        What Should I Do if I Encounter Issues During Booking? </a>

                                    <div class="accordion-content">
                                        <p>
                                            If you encounter issues during the booking process, first ensure that all
                                            required fields in the booking form are correctly filled out. If problems
                                            persist, try refreshing the page or using a different browser. For technical
                                            difficulties or unresolved issues, contact our customer support team. We are
                                            here to assist you and resolve any problems promptly.
                                        </p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        What Are the Benefits of Booking with Havenseek? </a>

                                    <div class="accordion-content">
                                        <p>
                                            Booking with Havenseek offers several benefits, including access to a wide range
                                            of well-rated venues and resorts, exceptional dining options, complimentary wifi
                                            access, and venues with top ratings. We prioritize your needs and strive to
                                            provide an excellent experience from booking to your event. Our dedicated
                                            support team is also available to assist you throughout the process.
                                        </p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        How Do I Make a Payment for My Reservation? </a>

                                    <div class="accordion-content show">
                                        <p>
                                            To make a payment for your reservation with Havenseek, log in to your account on
                                            our website and navigate to the 'My Reservations' section. Select the booking
                                            you wish to pay for and click on the 'Make Payment' button. Enter your payment
                                            details, choosing from the various payment methods we accept. Once you review
                                            and confirm the payment, it will be processed, and you'll receive a confirmation
                                            email with your payment receipt and booking details. If you experience any
                                            issues or need assistance during the payment process, please reach out to our
                                            support team for help.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-img-3">
                        <img src="/faq-img3.jpg" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Area End -->

    <!-- FAQ Another -->
    <div class="faq-another pt-100 pb-70">
        <div class="container">
            <div class="faq-form">
                <div class="contact-form">
                    <div class="section-title text-center">
                        <h2>Ask Questions</h2>
                    </div>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required
                                        data-error="Please enter your name" placeholder="Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required
                                        data-error="Please enter your email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" required
                                        data-error="Please enter your number" class="form-control" placeholder="Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required
                                        data-error="Please enter your subject" placeholder="Your Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required
                                        data-error="Write your message" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group checkbox-option">
                                    <input type="checkbox" id="chb2">
                                    <p>
                                        Accept <a href="terms-condition.html">Terms & Conditions</a> And <a
                                            href="privacy-policy.html">Privacy Policy.</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn btn-bg-three">
                                    Send Message
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Another End -->

@endsection
