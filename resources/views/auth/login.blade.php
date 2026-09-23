@extends('layouts.app')

@section('title', 'Login - Parkir Premium')

@section('content')
<div class="login-box">
    <form method="POST" action="{{ route('login.post') }}" class="glass-card">
        @csrf
        <h2>Parkir Premium</h2>
        <p>Silakan login untuk masuk ke sistem parkir.</p>

        @if ($errors->any())
            <div class="alert danger">
                {{ $errors->first() }}
            </div>
        @endif

        <label>Email</label>
        <input type="email" name="email" value="owner@parkirpremium.com" required>

        <label>Password</label>
        <input type="password" name="password" value="password" required>

        <button type="submit">Login</button>
    </form>
</div>
@endsection
