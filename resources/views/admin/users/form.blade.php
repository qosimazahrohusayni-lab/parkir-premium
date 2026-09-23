@extends('layouts.app')

@section('title', 'Admin - Tambah User')

@section('content')
<div class="page-box form-box">
    <h2>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h2>
    <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Nama lengkap" required>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" {{ isset($user) ? '' : 'required' }}>
        <select name="role">
            <option value="owner" {{ (old('role', $user->role ?? '') == 'owner') ? 'selected' : '' }}>Owner</option>
            <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ (old('role', $user->role ?? '') == 'petugas') ? 'selected' : '' }}>Petugas</option>
        </select>
        <select name="status">
            <option value="active" {{ (old('status', $user->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ (old('status', $user->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
        </select>
        <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" placeholder="Nomor Telepon">
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
