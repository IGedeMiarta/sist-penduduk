@extends('auth.master')
@section('content')
    <div class="col-md-12 col-lg-5">
        <div class="card login-box-container">
            <div class="card-body">
                <div class="authent-logo">
                    <img src="{{ asset('') }}/logo.png" alt="" style="max-width: 100px;">
                </div>
                <div class="authent-text">
                    <p>Selamat Datang</p>
                    <p>Sistem Kependudukan Kelurahan Krooy Kabupaten Kaimana</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="username" id="floatingInput"
                                placeholder="Username" required>
                            <label for="floatingInput">Username</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                required name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                    </div>
                </form>
                <div class="authent-reg">
                    <p>Belum Punya Akun? <a href="{{ route('regist.get') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
