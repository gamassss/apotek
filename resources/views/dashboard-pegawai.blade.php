@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="badge bg-label-primary p-2">
                                <i class="bx bx-user text-primary"></i>
                            </span>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="{{ route('member.index') }}">View Details</a>
                                {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    <span>Member</span>
                    <h3 class="card-title text-nowrap mb-1">{{ $jumlahMemberTotal }}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="badge bg-label-success p-2"><i class="bx bx-dollar text-success"></i></span>

                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="{{ route('transaksi-obat.index') }}">View Details</a>
                                {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    <span>Transaksi</span>
                    <h3 class="card-title text-nowrap mb-1">{{ $jumlahTransaksiTotal }}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="badge bg-label-info p-2"><i class='bx bx-chat'></i></span>

                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="{{ route('transaksi-obat.index') }}">View Details</a>
                                {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    <span>Performa Pesan</span>
                    <h3 class="card-title text-nowrap mb-1">100%</h3>
                </div>
            </div>
        </div>
       
    </div>
@endsection
