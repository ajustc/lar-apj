<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>@yield('title')</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets_landingpages') }}/images/favicon.png" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets_landingpages') }}/css/animate.css">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets_landingpages') }}/css/tiny-slider.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets_landingpages') }}/fonts/lineicons/font-css/LineIcons.css">

    <!--====== Tailwind CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets_landingpages') }}/css/tailwindcss.css">

    <style>
        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #777;
            border-radius: 10px;
        }

        .alert-warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-align: center;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.375rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 10000;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .modal-body {
            padding: 2px 16px;
        }

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
            display: flex;
            justify-content: end;
        }

        .modal-footer button {
            padding: 5px;
            border: solid 1px gray;
        }
    </style>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> --}}

    {{-- <style>
        @media (min-width: 576px) {
            .modal {
                --bs-modal-margin: 1.75rem;
                --bs-modal-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }
        }

        .modal {
            --bs-modal-zindex: 1055;
            --bs-modal-width: 500px;
            --bs-modal-padding: 1rem;
            --bs-modal-margin: 0.5rem;
            --bs-modal-color: ;
            --bs-modal-bg: var(--bs-body-bg);
            --bs-modal-border-color: var(--bs-border-color-translucent);
            --bs-modal-border-width: var(--bs-border-width);
            --bs-modal-border-radius: var(--bs-border-radius-lg);
            --bs-modal-box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --bs-modal-inner-border-radius: calc(var(--bs-border-radius-lg) - (var(--bs-border-width)));
            --bs-modal-header-padding-x: 1rem;
            --bs-modal-header-padding-y: 1rem;
            --bs-modal-header-padding: 1rem 1rem;
            --bs-modal-header-border-color: var(--bs-border-color);
            --bs-modal-header-border-width: var(--bs-border-width);
            --bs-modal-title-line-height: 1.5;
            --bs-modal-footer-gap: 0.5rem;
            --bs-modal-footer-bg: ;
            --bs-modal-footer-border-color: var(--bs-border-color);
            --bs-modal-footer-border-width: var(--bs-border-width);
            position: fixed;
            top: 0;
            left: 0;
            z-index: var(--bs-modal-zindex);
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
        }

        .fade {
            transition: opacity .15s linear;
        }

        .modal.show .modal-dialog {
            transform: none;
        }

        .modal.fade .modal-dialog {
            transition: transform .3s ease-out;
            transform: translate(0, -50px);
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: var(--bs-modal-width);
                margin-right: auto;
                margin-left: auto;
            }
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: var(--bs-modal-margin);
            pointer-events: none;
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            color: var(--bs-modal-color);
            pointer-events: auto;
            background-color: var(--bs-modal-bg);
            background-clip: padding-box;
            border: var(--bs-modal-border-width) solid var(--bs-modal-border-color);
            border-radius: var(--bs-modal-border-radius);
            outline: 0;
        }

        .modal-header {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: space-between;
            padding: var(--bs-modal-header-padding);
            border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);
            border-top-left-radius: var(--bs-modal-inner-border-radius);
            border-top-right-radius: var(--bs-modal-inner-border-radius);
        }

        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: var(--bs-modal-padding);
        }

        .modal-footer {
            display: flex;
            flex-shrink: 0;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            padding: calc(var(--bs-modal-padding) - var(--bs-modal-footer-gap) * .5);
            background-color: var(--bs-modal-footer-bg);
            border-top: var(--bs-modal-footer-border-width) solid var(--bs-modal-footer-border-color);
            border-bottom-right-radius: var(--bs-modal-inner-border-radius);
            border-bottom-left-radius: var(--bs-modal-inner-border-radius);
        }
    </style> --}}

</head>
