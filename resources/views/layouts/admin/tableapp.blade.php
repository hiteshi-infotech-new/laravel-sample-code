<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name', 'Online Grocery Shop') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('admin_theme/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('admin_theme/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('admin_theme/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="{{ asset('admin_theme/css/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script>
        var SITEURL = '{{url('/')}}';  //this site url used for javascript file      
        </script>
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        @include('layouts/admin/header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts/admin/sidebar')

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
            @yield('content') 
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>