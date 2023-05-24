@extends('template_landingpages.template')
@section('title', 'Home')
@section('content')

    <!--====== EVENT PART START ======-->

    <section id="blog" class="blog_area pt-120">
        <div class="container">
            <div class="row justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="sub_title">Events</h5>
                        <h4 class="main_title">From The Events</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            <div class="row justify-center lg:justify-start">
                @foreach ($events as $event)
                    <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                        <div
                            class="single_blog mx-3 mt-8 rounded-xl bg-white transition-all duration-300 overflow-hidden hover:shadow-lg">
                            <div class="blog_image">
                                <img src="{{ asset('assets_landingpages') }}/images/blog-1.jpg" alt="blog"
                                    class="w-full">
                            </div>
                            <div class="blog_content p-4 md:p-5">
                                <ul class="blog_meta flex justify-between">
                                    <li class="text-body-color text-sm md:text-base">{{ date('d-D-Y', strtotime($event->startdate)) }}</li>
                                    <li class="text-body-color text-sm md:text-base">- - - - - - - - - - -</li>
                                    <li class="text-body-color text-sm md:text-base">{{ date('d-D-Y', strtotime($event->enddate)) }}</li>
                                </ul>
                                <h3 class="blog_title"><a href="#">{{ $event->title }} <span class="badge">{{ $event->rlEventMembers->count() }}</span></a></h3>
                                <a href="#" class="more_btn">Read More</a>
                            </div>
                        </div> <!-- row -->
                    </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== EVENT PART ENDS ======-->

@endSection
