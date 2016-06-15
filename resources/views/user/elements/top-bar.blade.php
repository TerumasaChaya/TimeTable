@section('top-bar')

    <a id="totop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>

    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="logo" href="index.html" class="navbar-brand">
                    <span class="fa fa-rocket"></span>
                    <span class="logo-text">CarryCulum</span>
                    <span style="display: none" class="logo-text-icon">µ</span>
                </a>
            </div>
            <div class="topbar-main">
                <a id="menu-toggle" href="#" class="hidden-xs">
                    <i class="fa fa-bars"></i>
                </a>

                <ul class="nav navbar navbar-top-links navbar-right mbn">

                    <li class="dropdown topbar-user">
                        <a data-hover="dropdown" href="#" class="dropdown-toggle">
                            <img src="/design/images/avatar/human_48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;
                            <span class="hidden-xs">ここにユーザー名が入る</span>&nbsp;
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-calendar"></i>
                                    My Calendar
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    My Inbox
                                    <span class="badge badge-danger">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-tasks"></i>
                                    My Tasks
                                    <span class="badge badge-success">7</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-lock"></i>
                                    Lock Screen
                                </a>
                            </li>
                            <li>
                                <a href="Login.html">
                                    <i class="fa fa-key"></i>
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--END TOPBAR-->
@endsection