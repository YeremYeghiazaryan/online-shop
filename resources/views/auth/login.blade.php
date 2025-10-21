@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-4 text-center">Login</h3>

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                        >
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <a href="{{ route('google-redirect') }}" class="btn btn-outline-danger w-100 mt-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google me-2" viewBox="0 0 16 16">
                            <path d="M8.159 5.244v2.552h3.986c-.163 1.038-1.02 3.048-3.986 3.048-2.394 0-4.348-1.977-4.348-4.412 0-2.435 1.954-4.413 4.348-4.413 1.37 0 2.288.583 2.81 1.088l1.914-1.918C11.408 1.374 9.945.636 8.159.636 3.76.636.636 3.85.636 8.045c0 4.196 3.124 7.409 7.523 7.409 4.339 0 7.23-3.044 7.23-7.346 0-.493-.056-.86-.123-1.238H8.159z"/>
                        </svg>
                        Login with Google
                    </a>

                    <p class="mt-3 text-center">
                        Don't have an account? <a href="{{ route('register.index') }}">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
