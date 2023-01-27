<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <nav class="mt-1">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open ">
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <router-link to="/admin/home" class="nav-link">
                                    <i class="fa-solid fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="user-panel">

            <nav class="mt-1">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item menu-open ">
                        <ul class="nav nav-treeview">
                            <li class="nav-header">Master Data</li>

                            <li class="nav-item">
                                <router-link to="/admin/data-tagihan" class="nav-link">
                                    <i class="fa-solid fa-table"></i>&nbsp;
                                    <p>Data Tagihan</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/tagihan-lunas" class="nav-link">
                                    <i class="fa-solid fa-dollar"></i>&nbsp;
                                    <p>Pembayaran Lunas</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/data-menara" class="nav-link">
                                    <i class="fa-solid fa-building"></i>&nbsp;
                                    <p>Data Menara</p>
                                </router-link>

                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="user-panel">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</aside>