<side class="sidebar bg-white shadow-sm">
    <div class="sidebar-header text-center py-3">
        <div class="avatar avatar-lg rounded-circle mx-auto mb-2">
            <img src="{{ asset('assets/images/003.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle" />
        </div>
        <h5>{{ Auth::user()->name }}</h5>
        <small class="text-muted">{{ Auth::user()->role ?? 'Kullanıcı' }}</small>
    </div>

    <ul class="nav flex-column px-3">
        <li class="nav-item">
            <a class="nav-link">
                <i class="fas fa-tachometer-alt me-2"></i>Users
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-user me-2"></i>Profilim
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-cog me-2"></i>Ayarlar
            </a>
        </li>
    </ul>
</side>