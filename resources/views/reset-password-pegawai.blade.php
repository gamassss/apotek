@extends('layout.main')
@section('content')
    <form action="{{ route('reset-password.pegawai') }}" method="post">
        @csrf
        @method('put')
        <div class="container">
            <div class="card">
                <div class="card-header mb-3">
                    <h5>Reset Password</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">New Password</label>
                            {{-- <a href="/forgot-password">
                        <small>Forgot Password?</small>
                    </a> --}}
                        </div>
                        <div class="input-group input-group-merge">
                            <input required type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-4 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password_confirmation">Confirmation Password</label>
                            {{-- <a href="/forgot-password">
                        <small>Forgot Password?</small>
                    </a> --}}
                        </div>
                        <div class="input-group input-group-merge">
                            <input required type="password" id="password_confirmation" class="form-control"
                                name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password_confirmation" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3 col-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
