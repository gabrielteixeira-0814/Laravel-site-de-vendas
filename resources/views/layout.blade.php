<html lang='pt-br'>
<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Site de Vendas @yield('title')</title>
    <link href="{{ asset('/images/brand/favicon.png') }}" rel="icon" type="image/png"/>
    <link rel='stylesheet' href="{{ url('/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scriptDashboard.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/styledDashboard.css') }}" rel="stylesheet">

    <style>
        .wrapper #wrapperContent, .wrapper #wrapperContent.closed {
            padding: 0;
        }
    </style>
</head>
<body id="body-pd">
    <div id="appDashboard">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a href="{{ route('index')}}" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name">Site de Vendas</span>
                    </a>
                    <div class="nav_list">
                        <a href="{{ route('index')}}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> 
                        </a>

                         <a href="{{ route('user.create')}}" class="nav_link"> <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Usuários</span>
                        </a> 
                        <a href="{{ route('product.create')}}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Produtos</span>
                        </a>
                        <a href="{{ route('sale.create')}}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i>
                            <span class="nav_name">Vendas</span>
                        </a>
                        <a href="{{ route('kpis.index')}}" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Estatísticas</span>
                        </a>
                    </div>
                </div>
                <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Sair</span>
                </a>
            </nav>
        </div>
        <main class="main">
            @yield('content')
        </main>
    </div>

    
    <script src="{{ url('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d712964458.js" crossorigin="anonymous"></script>

    @yield('script')
    
</body>
</html>
