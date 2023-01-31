@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="profile-cover">
            </div>
            <div class="profile-header">
                <div class="profile-img">
                    <img src="{{ auth()->user()->userAva() }}" alt="user-avatar">
                </div>
                <div class="profile-name">
                    <h3>{{ auth()->user()->nama }}</h3>
                </div>

                <div class="profile-header-menu">

                    <ul class="list-unstyled">
                        <li><a href="#" class="active">Info</a></li>
                        <li><a href="#ubahPass">Edit Profil</a></li>
                        <li><a href="#addUser">Tambah User</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-9">
            <div class="card">
                <div class="card" id="ubahPass">
                    <div class="card-body">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                        <form action="{{ route('user.update') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('username1')
                                    is-invalid
                                @enderror"
                                        id="username1" name="username1" value="{{ auth()->user()->username }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('nama1')
                                    is-invalid
                                @enderror"
                                        id="nama1" name="nama1" value="{{ auth()->user()->nama }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                        class="form-control @error('password1')
                                    is-invalid
                                @enderror"
                                        id="password1" name="password1" value="{{ old('password1') }}">
                                    @error('password1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                        class="form-control @error('password_confirmation1')
                                    is-invalid
                                @enderror"
                                        id="password_confirmation1" name="password_confirmation1"
                                        value="{{ old('password_confirmation1') }}">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (auth()->user()->role != 3)
                <div class="card" id="addUser">
                    <div class="card-body">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <form action="{{ url('add-user') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('username')
                                    is-invalid
                                @enderror"
                                        id="username" name="username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('nama')
                                    is-invalid
                                @enderror"
                                        id="nama" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                        class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                        id="password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                        class="form-control @error('password_confirmation')
                                    is-invalid
                                @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="role"
                                        class="form-select @error('role')
                                    is-invalid
                                @enderror">
                                        <option selected disabled>--select role</option>
                                        @if (auth()->user()->role == 1)
                                            <option value="1" @if (old('role') == 1) selected @endif>Admin
                                            </option>
                                        @endif
                                        <option value="2" @if (old('role') == 2) selected @endif>Lurah
                                        </option>
                                        <option value="3" @if (old('role') == 3) selected @endif>Kaur
                                        </option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Users</h5>
                    <div class="story-list">
                        @foreach ($user as $u)
                            <div class="story">
                                <a href="#"><img src="{{ $u->userAva() }}" alt="user-ava"></a>
                                <div class="story-info">
                                    <a href="#"><span
                                            class="story-author">{{ substr($u->nama, 0, 8) . '...' }}</span></a>
                                    <span class="story-time">{{ $u->userRole() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
