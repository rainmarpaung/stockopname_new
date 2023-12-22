<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Stock Count Apps</title>
    <meta name="description" content="Stock Opname Apps">
    <meta name="keywords"
        content="stock, opname" />
    <link rel="icon" type="image/png" href="{{ asset ('asset_so/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('asset_so/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset ('asset_so/css/style.css') }}">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="{{ asset ('asset_so/img/loading-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Silahkan isi username dan password Anda yang sesuai</h4>
        </div>
        <div class="section mb-5 p-2">

        <form class="user" role="form" method="POST" action="{{ url('/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                    placeholder="Your password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        @if ($errors->has('username'))
                        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                            Username atau Password SALAH. Silahkan isi yang benar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                    </div>
                </div>


                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset ('asset_so/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="{{ asset ('asset_so/unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js') }}"></script>
    
    <!-- Splide -->
    <script src="{{ asset ('asset_so/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset ('asset_so/js/base.js') }}"></script>



</body>

</html>