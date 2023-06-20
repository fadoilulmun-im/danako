<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="/admin">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        {{-- <span class="badge bg-success rounded-pill float-end">9+</span> --}}
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title mt-2">Master</li>
                <li>
                    <a href="/admin/users">
                        <i class="fas fa-users"></i>
                        <span> User </span>
                    </a>
                </li>
                <li>
                    <a href="/admin/categories">
                        <i class="dripicons-view-thumb"></i>
                        <span> Category </span>
                    </a>
                </li>
                <li>
                    <a href="/admin/campaigns">
                        <i class="mdi mdi-charity"></i>
                        <span> Campaigns </span>
                    </a>
                </li>
                <li>
                    <a href="/admin/donations">
                        <i class="dripicons-wallet"></i>
                        <span> Donations </span>
                    </a>
                </li>
                <li>
                    <a href="#withdrawal" data-bs-toggle="collapse">
                        <i class="mdi mdi-bank-transfer-out mdi-24px"></i>
                        <span>Withdrawals</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="withdrawal">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/admin/withdrawals">Withdrawals</a>
                            </li>
                            <li>
                                <a href="/admin/withdrawals-calculation">Withdrawal calculation</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="/admin/distribution-report">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span> Distribution Report</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>