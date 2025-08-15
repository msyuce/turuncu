@extends('admin.layout')

@section('title', 'Kullanıcı Yönetimi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Kullanıcı Yönetimi</h2>

    {{-- Başarı mesajları --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Yeni kullanıcı ekleme butonu --}}
    @can('create', App\Models\User::class)
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Yeni Kullanıcı Ekle</a>
    @endcan

    {{-- Basit filtre formu --}}
    <form method="GET" action="{{ route('admin.user.index') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="İsim veya email ara...">
            </div>
            <div class="col-md-2">
                <select name="role" class="form-select">
                    <option value="">Tüm Roller</option>
                    <option value="admin" {{ request('role')=='admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ request('role')=='user' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary">Filtrele</button>
            </div>
        </div>
    </form>

    {{-- Kullanıcılar tablosu --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Oluşturulma Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    {{-- Yetkiye göre butonlar --}}
                    @can('update', $user)
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                    @endcan

                    @can('delete', $user)
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Silmek istediğinizden emin misiniz?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Sil</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">Kayıt bulunamadı.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Sayfalama --}}
    {{ $users->withQueryString()->links() }}
</div>
@endsection
