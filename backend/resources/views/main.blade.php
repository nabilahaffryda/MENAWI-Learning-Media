<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - MENAWI Admin</title>
    <meta name="description" content="MENAWI Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('style/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/dashboard') }}"><img width="70px" height="70px"
                        src="{{ asset('style/images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ url('/dashboard') }}"><img
                        src="{{ asset('style/images/logo.png') }}" width="70px" height="70px" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Tabel</h3>
                    <li class="menu-item">
                        <a href="{{ url('user') }}" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon fa fa-user"></i>User</a>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Materi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('material') }}">Materi</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ url('description') }}">Deskripsi Materi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Kuis</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('level') }}">Level</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('theme') }}">Tema</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('question') }}">Pertanyaan</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ url('answer') }}">Jawaban</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/user.png') }}"
                                alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--breadcrumb-->
        @yield('breadcrumbs')
        <!-- content -->
        @yield('content')
    </div>
    </div>
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        });
    </script>
</body>

</html>
