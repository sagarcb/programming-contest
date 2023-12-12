<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUB</title>
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{--Toaster--}}
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.css')}}">

    {{--Page css libraries--}}
    @yield('page-library-css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

    {{--page custom css--}}
    @yield('page-custom-css')
    <style>
        #overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            z-index: 9999; /* Ensure it's above other elements */
            display: none;
        }
    </style>

    <!-- jQuery -->
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <script>
        $(function (){
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        })
    </script>
</head>
