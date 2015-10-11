<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="{{asset('img/logo/logo-nav.png')}}" alt="Logo barra de navegación">
        </a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="/auth/logout">
                <i class="fa fa-sign-out fa-fw"></i> Salir
            </a>
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/adminhh/encuestas">
                        <i class="fa fa-table fa-fw"></i> Listado
                    </a>
                </li>
                <li>
                    <a href="/adminhh/encuestas/nueva">
                        <i class="fa fa-edit fa-fw"></i> Crear nuevo
                    </a>
                </li>
                <!--<li>
                    <a href="#">
                        <i class="fa fa-files-o fa-fw"></i> Cuestionarios
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.html">
                                <i class="fa fa-table fa-fw"></i> Listado
                            </a>
                        </li>
                        <li>
                            <a href="blank.html">
                                <i class="fa fa-edit fa-fw"></i> Crear nuevo
                            </a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
