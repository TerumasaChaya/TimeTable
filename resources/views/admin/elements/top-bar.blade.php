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
                <a id="logo" href="/admin/excel" class="navbar-brand">
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
                            <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>&nbsp;
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user pull-left">
                            <li>
                                <a href="{{ url('/admin/profile') }}">
                                    <i class="fa fa-key"></i>
                                    登録情報
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/register') }}">
                                    <i class="fa fa-key"></i>
                                    管理者を追加する
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/logout') }}">
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