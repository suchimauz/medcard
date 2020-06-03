<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/font/iconsmind/style.css" />
    <link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/vendor/fullcalendar.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/css/vendor/dropzone.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/css/vendor/owl.carousel.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="/css/vendor/nouislider.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="/css/vendor/cropper.min.css" />
    <link rel="stylesheet" href="/css/main.css" />

    <script>
        window.Laravel = <? echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
        </div>

        <div class="navbar-right">
            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name">
                        @if(Auth::user()->lastname) 
                            <span> {{ Auth::user()->lastname }}</span>
                        @endif
                        @if(Auth::user()->firstname)
                            <span>{{ Auth::user()->firstname }}</span>
                        @endif
                        @if(Auth::user()->patronymic) 
                            <span> {{ Auth::user()->patronymic }}</span>
                        @endif
                    </span>
                    <span>
                        @if(Auth::user()->gender == 'male') 
                            <img alt="Male" src="/img/male.png" />
                        @else
                            <img alt="Female" src="/img/female.png" />
                        @endif
                    </span>
                </button>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <form id="role-set-form" action="{{ url('/role') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="hidden" name="role" id="role-set-value">
                </form>
                <div class="dropdown-menu dropdown-menu-right mt-3">
                    @if(Auth::user()->is_patient >= 1 && isset(Auth::user()->patient->id))
                        <a 
                            class="dropdown-item @if(session('role') == 'patient') font-weight-bold @endif" 
                            style="cursor: pointer"
                            onclick="
                                event.preventDefault();
                                document.getElementById('role-set-value').value = 'patient';
                                document.getElementById('role-set-form').submit();
                            "
                        >
                            Пациент
                        </a>
                    @endif
                    @if(Auth::user()->is_practitioner >= 1)
                    <a 
                        class="dropdown-item @if(session('role') == 'practitioner') font-weight-bold @endif" 
                        style="cursor: pointer"
                        onclick="
                            event.preventDefault();
                            document.getElementById('role-set-value').value = 'practitioner';
                            document.getElementById('role-set-form').submit();
                        "
                    >
                        Врач
                    </a>
                    @endif
                    @if(Auth::user()->is_admin >= 1)
                    <a 
                        class="dropdown-item @if(session('role') == 'admin') font-weight-bold @endif" 
                        style="cursor: pointer"
                        onclick="
                            event.preventDefault();
                            document.getElementById('role-set-value').value = 'admin';
                            document.getElementById('role-set-form').submit();
                        "
                    >
                        Админинстратор
                    </a>
                    @endif
                    <hr>
                    <a 
                        class="dropdown-item" 
                        style="cursor: pointer"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        <b>Выход</b>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @include('menu')

    <main>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-12">
                    <h1>@yield('title')</h1>
                    <div class="float-sm-right text-zero">
                        @yield('buttons')
                    </div>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                    <div class="separator mb-5"></div>
                </div>
            </div>
            @if($errors->any())
                <div class="mb-5">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger rounded" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif
            @yield('content')
        </div>
    </main>


    <script src="/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/js/vendor/Chart.bundle.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-datalabels.js"></script>
    <script src="/js/vendor/moment.min.js"></script>
    <script src="/js/vendor/fullcalendar.min.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
    <script src="/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="/js/vendor/owl.carousel.min.js"></script>
    <script src="/js/vendor/progressbar.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/select2.full.js"></script>
    <script src="/js/vendor/nouislider.min.js"></script>
    <script src="/js/vendor/bootstrap-datepicker.js"></script>
    <script src="/js/vendor/Sortable.js"></script>
    <script src="/js/vendor/mousetrap.min.js"></script>
    <script src="/js/dore.script.js"></script>
    <script src="/js/scripts.js"></script>
</body>

</html>