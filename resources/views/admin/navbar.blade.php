<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <style>
    .container {
        padding: 1rem 0rem;
    }

    h4 {
        margin: 2rem 0rem 1rem;
    }

    .table-image {
        td, th {
            vertical-align: middle;
        }
    }
        </style>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PoSoft-Admin</title>
        <link type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ URL::asset('assets/img/icons/css/font-awesome.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ URL::asset('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" crossorigin="anonymous">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a href="{{ route('admin') }}"><img src="../assets/img/navbar-logo.png" alt="" style="width: 100px; height: 50px; float: left; margin-right: 20px;" /></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="dropdown">
                                {{Auth::user()->name}}<img src="../assets/img/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container" style="margin-bottom: 250px;">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{ route('admin') }}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{ route('user') }}"><i class="menu-icon icon-user"></i> User </a></li>
                                <li><a href="{{ route('game') }}"><i class="menu-icon fas fa-gamepad"></i>Game</a></li>
                                <li><a href="{{ route('genre') }}"><i class="menu-icon icon-paste"></i>Genre </a></li>
                                <li><a href="{{ route('year') }}"><i class="menu-icon icon-paste"></i>Year </a></li>
                            </ul>
                            <!--/.widget-nav-->
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <main>
                        <div class="span9">
                            <div class="content">
                                @yield('content')
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2020 PoSoft - PoSoft.com </b>All rights reserved.
            </div>
        </div>

        <script src="{{ URL::asset('/js/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/flot/jquery.flot.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/common.js') }}" type="text/javascript"></script>
      
    </body>
    
