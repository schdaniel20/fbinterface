<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Facebook</title>

    <!-- Bootstrap Core CSS -->
    <link href="/basic/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/basic/css/simple-sidebar.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="/basic/js/jquery.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->    
    <style>
        .user-panel {
            height: 60px;            
        }
        .user-panel-head {
            height: 70%;                       
        }
        .user-pic {
            border-radius: 25px;
            max-width: 100%;
            max-height: 100%;            
        }
        .user-panel-body {
           height: 30%;
           color:white;
           margin:0px auto;
        }
        .navbar {
            margin-bottom: 0px;            
        }
        .glyphicon {
            display:inline;
        }
        .sidebar-nav li span {
            color:white;
        }
        .main-item {
            color:#cccccc;           
        }      
        .disabled {
            pointer-events: none;
        }
        
    </style>
    
    @yield('script')
</head>

<body id="app-layout">
    
       <nav class="navbar navbar navbar-default">
        
            <div class="navbar-header">                
                <a class="navbar-brand" href="{{ url('#') }}">
                    Facebook
                </a>
                <button class="btn" id="menu-toggle">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </button>    
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guest())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        
    </nav>
    
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                
                    @include('components.menu')
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
            @yield('content')
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="/basic/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
</body>

</html>
