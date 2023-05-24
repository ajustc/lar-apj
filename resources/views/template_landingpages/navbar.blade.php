<!--====== PRELOADER PART START ======-->

<div class="preloader">
    <div class="loader">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->

<section class="header_area">
    <div class="navbar-area bg-white">
        <div class="container relative">
            <div class="row items-center">
                <div class="w-full">
                    <nav class="flex items-center justify-between py-4 navbar navbar-expand-lg">
                        <a class="navbar-brand mr-5" href="index.html">
                            <img src="{{ asset('assets_landingpages') }}/images/logo.svg" alt="Logo">
                        </a>
                        <button class="block navbar-toggler focus:outline-none lg:hidden" type="button"
                            data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="absolute left-0 z-20 hidden w-full px-5 py-3 duration-300 bg-white lg:w-auto collapse navbar-collapse lg:block top-full mt-full lg:static lg:bg-transparent shadow lg:shadow-none"
                            id="navbarOne">
                            <ul id="nav"
                                class="items-center content-start mr-auto lg:justify-end navbar-nav lg:flex">
                                <li class="nav-item ml-5 lg:ml-11">
                                    <a class="page-scroll active" href="{{ url('/') }}">Home</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

        @if (Session::has('messages'))
            <div class="alert alert-{!! session('messages_type') !!} shadow-lg">
                <span>{!! session('messages') !!}</span>
            </div>
        @endif

    </div> <!-- header navbar -->

    <div id="home" class="header_hero bg-gray relative z-10 overflow-hidden lg:flex items-center">
        <div class="hero_shape shape_1">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-1.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_2">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-2.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_3">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-3.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_4">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-4.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_6">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-1.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_7">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-4.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_8">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-3.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_9">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-2.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_10">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-4.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_11">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-1.svg" alt="shape">
        </div><!-- hero shape -->
        <div class="hero_shape shape_12">
            <img src="{{ asset('assets_landingpages') }}/images/shape/shape-2.svg" alt="shape">
        </div><!-- hero shape -->

        <div class="container">
            <div class="row">
                <div class="w-full lg:w-1/2">
                    <div class="header_hero_content pt-150 lg:pt-0">
                        <h2 class="hero_title text-2xl sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl font-extrabold">
                            Let's join your <span class="text-theme-color">Events</span></h2>
                        <p class="mt-8 lg:mr-8">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                        <div class="hero_btn mt-10">
                            <!-- The button to open modal -->
                            <label for="my-modal" class="main-btn" id="myBtn">Register Events</label>
                        </div>
                    </div> <!-- header hero content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="header_shape hidden lg:block"></div>

        <div class="header_image flex items-center">
            <div class="image 2xl:pl-25">
                <img src="{{ asset('assets_landingpages') }}/images/header-image.svg" alt="Header Image">
            </div>
        </div> <!-- header image -->
    </div> <!-- header hero -->
</section>

<!--====== HEADER PART ENDS ======-->


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <form action="{{ url('create-member-event') }}" method="post">
            @CSRF

            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Congratulations! Let's choose event!</h2>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="event_id" class="col-md-2 col-form-label">Event</label>
                    <div class="col-md-10">
                        <select class="form-select select-success" name="event_id" id="event_id">
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="company_name" class="col-md-2 col-form-label">Company Name</label>
                    <div class="col-md-10">
                        <input class="form-control input input-success" name="company_name" type="text"
                            placeholder="PT. XXXX X XX XXX" id="company_name" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="participant_name" class="col-md-2 col-form-label">Participant Name</label>
                    <div class="col-md-10">
                        <input class="form-control input input-success" name="participant_name" type="text"
                            placeholder="Rio Justicio" id="participant_name" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="participant_email" class="col-md-2 col-form-label">Participant Email</label>
                    <div class="col-md-10">
                        <input class="form-control input input-success" type="text" name="participant_email"
                            placeholder="riojusticiof@gmil.com" id="participant_email" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="participant_phone_number" class="col-md-2 col-form-label">Participant Phone
                        Number</label>
                    <div class="col-md-10">
                        <input class="form-control input input-success" type="text"
                            name="participant_phone_number" placeholder="081233764534"
                            id="participant_phone_number" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="participant_avatar" class="col-md-2 col-form-label">Participant
                        Avatar</label>
                    <div class="col-md-10">
                        <input class="file-input file-input-bordered file-input-success" type="file"
                            id="participant_avatar" name="participant_avatar">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit">Save changes</button>
            </div>
        </form>

    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
