<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets') }}/"
  data-template="vertical-menu-template-free"
>

<style>
  .button-delete-inline {
    display: inline;
    z-index: 1100;
    position: relative;
    text-align: center;
    background-color: white;
  }
  .button-delete-inline .show-button-delete {
    position: relative;
    top: -20px;
    left: -20px;
  }
  .icon-dashboard {
    position: absolute;
    top: 35px;
    left: 42.5%;
    opacity: 25%;
    font-size: 50px !important;
  }
  table.dataTable tbody tr.selected>* {
    box-shadow: inset 0 0 0 9999px rgb(220 220 220 / 90%) !important;
    color: black !important;
  }
  .total-price {
    border-bottom-width: 0 !important;
  }
  .is-loading {
    position: absolute;
    z-index: 9999;
    background: bisque;
    width: auto;
    left: 45%;
    top: 35%;
  }
  .is-loading div.wrap {
    position: fixed;
    top: 0;
    left: 0;
    /* Preserve aspet ratio */
    min-width: 100%;
    min-height: 100%;
    background: rgba(255, 255, 255, 0.8);
  }
  .is-loading div.progress {
    width: 300px;
    height: auto;
    font-size: initial;
  }
  .is-loading div.progress div.progress-bar {
    height: 24px;
    background-color: #ff3e1d;
    box-shadow: 0 0.125rem 0.25rem 0 rgb(255 62 29 / 40%);
  }
  .custom-logo img {
    width: 180px !important;
  }
  .show-alert {
    z-index: 1100;
    position: fixed;
    right: 3%;
    left: 50%;
    bottom: 0;
    text-align: center;
    background-color: white;
  }
  .show-alert-button {
    z-index: 1200;
    position: absolute;
    bottom: 89%;
    left: 98%;
  }
  .show-alert-button:hover {
    border-radius: 0.375rem;
    transition: ease-in-out 1s;
  }
  .relative {
    width: 1300px;
    position: relative;
  }
  /* CUSTOM SELECT2 */
  span.select2 {
    display: block;
    width: 100%;
    padding: 0.3rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  span.selection > span {
    border: none !important;
    border-radius: 0px !important;
  }

  .select2-selection__arrow b {
    top: 60% !important;
    left: 0 !important;
  }

  .select2-dropdown.select2-dropdown--below {
    border: 2px solid #d9dee3 !important;
    border-radius: 0.375rem !important;
    margin-top: 3px !important;
  }

  .select2-selection__choice {
    margin-left: 0 !important;
  }

  /* SELECT SELECT2 */
  .select2-results__option .select2-results__option--selectable .select2-results__option--selected {
    border-radius: 0.375rem !important;
  }

  /* HOVER SELECT2 */
  .select2-results__option .select2-results__option--selectable .select2-results__option--highlighted {
    border-radius: 0.375rem !important;
  }
  /* END CUSTOM SELECT2 */

  /* CUSTOM DROPIFY */
  span.file-icon p {
    font-size: 20px;
  }
  /* END CUSTOM DROPIFY */

  /* JUST CUSTUM CSS */

  .just-menu-link:before {
    content: "";
    position: absolute;
    left: 1.4375rem;
    width: 0.375rem;
    height: 0.375rem;
    border-radius: 50%;
    margin-left: 20px;
    background-color: #b4bdc6 !important;
  }
  /* Custom zIndex swal */
  .swal2-container {
    z-index: 20000 !important;
  }
  /* Datatables processing draw */
  div.dataTables_processing {
    top: 10% !important;
  }
  .nav-pills .nav-link.active, .nav-pills .nav-link.active:hover, .nav-pills .nav-link.active:focus {
    color: #fff !important;
    box-shadow: 0 2px 4px 0 rgb(105 108 255 / 40%) !important;
    background-color: #71dd37 !important;
    border-color: #71dd37 !important;
  }
  /* CUSTOM SCROLL BARR */
  /* html::-webkit-scrollbar
  {
    height:5px;
  }
  html::-webkit-scrollbar-track
  {
      border-radius: 8px;
      --webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  }
  html::-webkit-scrollbar-thumb
  {
      border-radius: 8px;
      background-color: #5f61e6;
      --webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
  } */
  /* END CUSTOM SCROLL BARR */
</style>
  
<!-- HEADER -->
@include('template.header')

  <body>
    <div class="is-loading" style="display: none;">
        <div class="wrap d-flex flex-column justify-content-center align-items-center">
          <img class="d-block" width="200px" src="{{ asset('assets') }}/mydatalogo.png" alt="MyData Logistic">
          <img class="d-block" width="50px" src="{{ asset('assets') }}/mydataspinner.gif" alt="Loading MyData">
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
    </div>
      @if (Session::has('messages'))
<div class="relative">
          <div class="show-alert shadow p-3 mb-5 rounded">
            <div class="alert alert-{!! session('messages_type') !!} mb-0 alert-dismissible">
              {!! session('messages') !!}
            </div>
            <button type="button" class="show-alert-button btn btn-secondary rounded px-2 py-0 buttonClicked" aria-label="Close">
              <i class="fa fa-xmark"></i>
            </button>
          </div>
        </div>
@endif

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

      @if (count($errors) > 0)
        <div class="show-alert shadow p-3 mb-5 rounded">
            <div class="alert alert-danger mb-0">
                <ul>
                    @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- SIDEBAR MENU -->
        @include('template.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

          <!-- NAVBAR -->
          @include('template.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            
            <!-- CONTENT -->
            @yield('content')

            <!-- FOOTER -->
            @include('template.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets') }}/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- ADD SCRIPT JS HERE -->

    <?php if (!empty($datatables)) : ?>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <?php endif; ?>

    <?php if (!empty($select2)) : ?>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php endif; ?>

 <script src="{{ asset('assets') }}/js/jquery.datetimepicker.full.min.js?v=1.00" type="text/javascript"></script>
    
 <!-- Custom script by view pages -->
    @yield('scriptFromAllView')

    <script>
        $(document).ready(function() {
            $('.show-alert-button').click(function(e) {
                e.preventDefault();
                $('.show-alert').fadeOut(2000);
                $('.show-alert-button').fadeOut(2000);
            });

            $('.icon-user').click(function() {

                if ($('.icon-user').attr('clicked') == 'true') {
                    $('.icon-user').attr('clicked', false);
                    $('.icon-user').removeClass('bx-user');
                    $('.icon-user').addClass('bxs-user');
                } else {
                    $('.icon-user').attr('clicked', true);
                    $('.icon-user').remove('bxs-user');
                    $('.icon-user').addClass('bx-user');
                }
            });

            $('.datetimepicker-ymd-timepicker').datetimepicker({
                inline: false,
                maxDate: new Date(),
                format: 'Y-m-d',
                timepicker: false,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });

            $('.datetimepicker-ymd').datetimepicker({
                inline: false,
                format: 'Y-m-d',
                timepicker: false,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });

            $('.datetimepicker-ymd-nomax').datetimepicker({
                inline: false,
                maxDate: new Date(),
                format: 'Y-m-d',
                timepicker: false,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });

            $('.datetimepicker-ymdhi-timepicker').datetimepicker({
                inline: false,
                maxDate: new Date(),
                format: 'Y-m-d H:i',
                timepicker: true,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });

            $('.datetimepicker-ymdhi').datetimepicker({
                inline: false,
                maxDate: new Date(),
                format: 'Y-m-d H:i',
                timepicker: false,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });

            $('.datetimepicker-nomax-timepicker').datetimepicker({
                inline: false,
                format: 'Y-m-d',
                timepicker: true,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });

            $('.datetimepicker-nomax').datetimepicker({
                inline: false,
                format: 'Y-m-d',
                maxDate: new Date(),
                timepicker: false,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false
            });
        });
    </script>
    
  </body>
</html>
