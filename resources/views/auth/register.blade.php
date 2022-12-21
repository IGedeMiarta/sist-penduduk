@extends('auth.master')
@section('content')
    <div class="col-md-12 col-lg-6">
        <div class="card login-box-container">
            <div class="card-body">
                <div class="authent-logo">
                    <img src="{{ asset('') }}/logo.png" alt="" style="max-width: 100px;">
                </div>
                <div class="authent-text">
                    <b>Register / Daftar</b>
                    <p>Sistem Kependudukan Kabupaten Kaimana</p>
                </div>

                <form action="{{ route('regist.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                name="name" id="floatingInputName" placeholder="Nama" required
                                value="{{ old('name') }}">
                            <label for="floatingInputName">Nama</label>
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text"
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                name="username" id="floatingInput" placeholder="Username" required
                                value="{{ old('username') }}">
                            <label for="floatingInput">Username</label>
                        </div>
                        @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">

                        <div class="mb-3 col">
                            <div class="form-floating">
                                <input type="password"
                                    class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                    id="floatingPassword" placeholder="Password" required name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <div class="form-floating">
                                <input type="password"
                                    class="form-control @error('floatingPassword2')
                                    is-invalid
                                @enderror"
                                    id="floatingPassword2" placeholder="Password" required name="password_confirmation">
                                <label for="floatingPassword2">Retype Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                    </div>
                </form>
                <div class="authent-reg">
                    <p>Sudah Punya Akun? <a href="{{ route('login.get') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
