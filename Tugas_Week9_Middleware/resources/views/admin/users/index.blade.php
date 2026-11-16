@extends('layouts.app')
@section('title', 'Manajemen Pengguna')
@section('content')
<div class="card">
    <div class="card-header"><div><h1 class="card-title">Manajemen Pengguna</h1><p class="card-subtitle">Daftar akun Admin, Dosen, dan Mahasiswa.</p></div></div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.users.index') }}" style="display:flex;gap:.5rem;margin-bottom:1rem;">
            <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau nomor induk">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
        <div style="overflow-x:auto"><table style="width:100%;border-collapse:collapse">
            <thead><tr><th style="text-align:left;padding:.75rem">Nama</th><th style="text-align:left;padding:.75rem">Email</th><th style="text-align:left;padding:.75rem">Nomor Induk</th><th style="text-align:left;padding:.75rem">Role</th></tr></thead>
            <tbody>@forelse($users as $user)<tr style="border-top:1px solid var(--slate-200)"><td style="padding:.75rem">{{ $user->name }}</td><td style="padding:.75rem">{{ $user->email }}</td><td style="padding:.75rem">{{ $user->nomor_induk ?? '-' }}</td><td style="padding:.75rem;text-transform:capitalize">{{ $user->role }}</td></tr>@empty<tr><td colspan="4" style="padding:1rem;text-align:center">Belum ada pengguna.</td></tr>@endforelse</tbody>
        </table></div>
        <div style="margin-top:1rem">{{ $users->links() }}</div>
    </div>
</div>
@endsection
