@section('side-bar')
    <!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
         data-position="right" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li>
                    <a href="/admin/teacher">
                        <i class="fa fa-users fa-fw">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">教師一覧</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/delete">
                        <i class="fa fa-trash-o fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">データーベース削除</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/excel">
                        <i class="fa fa-plus fa-fw">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">データーベース追加</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/elective">
                        <i class="fa fa-check">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">選択科目 認証</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
@endsection