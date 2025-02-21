<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="#" class="brand-link" onclick="showAlert()">
            <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Admin Panel</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->
    
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                  <!-- Dashboard -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house-door"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Manajemen Pendaftaran -->
                <li class="nav-header">Manajemen Pendaftaran</li>

                <li class="nav-item">
                    <a href="{{ route('admin.tahunAjaran') }}" class="nav-link {{ Request::routeIs('admin.tahunAjaran') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-calendar3"></i>
                        <p>Tahun Ajaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jenjang.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-mortarboard"></i>
                        <p>Jenjang Pendidikan</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('pendaftar.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Data Pendaftar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.index') }}" class="nav-link" ">
                        <i class="nav-icon bi bi-list-check"></i>
                        <p>Status Pendaftaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-check2-circle"></i>
                        <p>Verifikasi Pendaftaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-award"></i>
                        <p>Program Unggulan</p>
                    </a>
                </li>

                <!-- Manajemen Santri -->
                <li class="nav-header">Manajemen Santri</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-person-lines-fill"></i>
                        <p>Data Santri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>Manajemen Kelas</p>
                    </a>
                </li>

                <!-- Pembayaran -->
                <li class="nav-header">Pembayaran</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-receipt"></i>
                        <p>Tagihan Santri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-cash"></i>
                        <p>Konfirmasi Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-currency-exchange"></i>
                        <p>Pembayaran Pos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-wallet2"></i>
                        <p>Pembayaran Lainnya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-graph-up"></i>
                        <p>Laporan Keuangan</p>
                    </a>
                </li>

                <!-- Pengaturan -->
                <li class="nav-header">Pengaturan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Manajemen Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-shield-lock"></i>
                        <p>Manajemen Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showAlert()">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Log Admin</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>

<script>
    function showAlert() {
        alert("Fitur sedang dikerjakan!");
    }
</script>
