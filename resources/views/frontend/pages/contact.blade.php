@extends('frontend.master')

@section('content')


@include('frontend.layouts.page_header')


<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="contact-info">
                            <h3>The Office</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    4/7, Block: #B, Mirpur-12, Pallabi, Dhaka-1217
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <a href="tel:+88 01311-796531">+88 01311-796531</a>
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:info@ladylikeclothes.com">info@ladylikeclothes.com</a>
                                </li>
                            </ul><!-- End .contact-list -->
                        </div><!-- End .contact-info -->
                    </div><!-- End .col-sm-7 -->

                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h3>The Office</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-clock-o"></i>
                                    <span class="text-dark">Monday-Saturday</span> <br>11am-7pm
                                </li>
                                <li>
                                    <i class="icon-calendar"></i>
                                    <span class="text-dark">Sunday</span> <br>11am-6pm 
                                </li>
                            </ul><!-- End .contact-list -->
                        </div><!-- End .contact-info -->
                    </div><!-- End .col-sm-5 -->
                </div><!-- End .row -->
            </div><!-- End .col-lg-6 -->
            <div class="col-lg-6">
                <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                <p class="mb-2">Use the form below to get in touch with the sales team</p>

                <form action="#" class="contact-form mb-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cname" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="cname" placeholder="Name *" required>
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <label for="cemail" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cphone" class="sr-only">Phone</label>
                            <input type="tel" class="form-control" id="cphone" placeholder="Phone">
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <label for="csubject" class="sr-only">Subject</label>
                            <input type="text" class="form-control" id="csubject" placeholder="Subject">
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->

                    <label for="cmessage" class="sr-only">Message</label>
                    <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                        <span>SUBMIT</span>
                        <i class="icon-long-arrow-right"></i>
                    </button>
                </form><!-- End .contact-form -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <hr class="mt-4 mb-5">

    </div><!-- End .container -->
    <div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14594.229522317764!2d90.3943404197754!3d23.869846200000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1631869708459!5m2!1sen!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
    
    </div><!-- End #map -->
</div><!-- End .page-content -->


    
@endsection
