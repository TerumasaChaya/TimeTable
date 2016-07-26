@section('side-bar')
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
         data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">

                <div class="clearfix"></div>
                <li>
                    <a href="/user/week">
                        <i class="fa fa-calendar fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">今週の時間割</span>
                    </a>
                </li>

                <li>
                    <a href="/user/day">
                        <i class="fa fa-calendar-o fa-fw">
                            <div class="icon-bg bg-pink"></div>
                        </i>
                        <span class="menu-title">今日の時間割</span>
                    </a>
                </li>

                <li>
                    <a href="/user/teacher">
                        <i class="fa fa-users fa-fw">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">教師一覧</span>
                    </a>
                </li>

                <li>
                    <a href="/user/roomlist">
                        <i class="fa fa-building-o fa-fw">
                            <div class="icon-bg bg-violet"></div>
                        </i>
                        <span class="menu-title">教室一覧</span>
                    </a>
                </li>
                <li>
                    <a href="/user/attendance">
                        <i class="fa fa-list-alt fa-fw">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">出席照会</span>
                    </a>
                </li>
                <li>
                    <a href="/user/app">
                        <i class="fa fa-list fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">選択科目 確認</span>
                    </a>
                </li>
                <li>
                    <a href="/user/elective">
                        <i class="fa fa-check-square-o fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">選択科目 申込</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
@endsection