@extends('layout.main')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('pegawai.index') }}">Pegawai</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0);">Profile</a>
                </li>
            </ol>
        </nav>
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Username</label>
                        <input class="form-control" disabled type="text" id="" name=""
                            value="{{ $user->username }}" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input class="form-control" disabled type="text" id="" name=""
                            value="{{ $user->name }}" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">No Telepon</label>
                        <input class="form-control" disabled type="text" id="" name=""
                            value="{{ $user->no_telpon }}" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Jabatan</label>
                        <input class="form-control" disabled type="text" id="" name=""
                            value="{{ $user->jabatan }}" autofocus />
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
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
                            {{-- <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="{{ route('transaksi-obat.index') }}">View Details</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div> --}}
                        </div>
                        @php
                            if ($responseTime > 0) {
                                [$hours, $minutes] = explode(':', $responseTime);
                            } else {
                                [$hours,$minutes] = [0,0];
                            }
                        @endphp
                        <span>Performa Pesan</span>
                        <h3 class="card-title text-nowrap mb-1"> {{ $hours }} jam {{ $minutes }} menit</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card p-3">
                    <div class="row">

                        <div class="col">
                            <p>Tahun</p>
                            <div class="row">
                                <div class="col-5">
                                    <select class="form-select" name="year" id="year-member">
                                        @foreach ($tahunMember as $item)
                                            <option {{ date('Y') == $item->year ? 'selected' : '' }}
                                                value="{{ $item->year }}">{{ $item->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" id="search-member" class="btn btn-primary">
                                        <span class="tf-icons bx bx-search"></span>
                                        &nbsp;Cari
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card" id="chart-member"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card" id="chart-member-yearly"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card p-3">
                    <div class="row">

                        <div class="col">
                            <p>Tahun</p>
                            <div class="row">
                                <div class="col-5">
                                    <select class="form-select" name="year" id="year-transaksi">
                                        @foreach ($tahunTransaksi as $item)
                                            <option {{ date('Y') == $item ? 'selected' : '' }}
                                                value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" id="search-transaksi" class="btn btn-primary">
                                        <span class="tf-icons bx bx-search"></span>
                                        &nbsp;Cari
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card" id="chart-transaksi-monthly"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card" id="chart-transaksi-yearly"></div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Reset Password</h5>
            <hr class="my-0" />

            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Are you sure you want to reset passoword of this account?
                        </h6>
                        <p class="mb-0">Once you reset passoword of this account, the password will be back to default
                            settings.</p>
                    </div>
                </div>
                <form method="POST" id="resetpassword"
                    action="{{ route('pegawai.reset-password', ['pegawai' => $user->id]) }}">
                    @csrf
                    <button type="button" onclick="return confirm('resetpassword')"
                        class="btn btn-danger deactivate-account">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                loadMemberStatMonthly('{{ date('Y') }}');
                loadTransaksiStatMonthly('{{ date('Y') }}');
                loadMemberStatYearly();
                loadTransaksiStatYearly();
                $('#search-member').on('click', function() {
                    let year = $('#year-member').val();
                    $('#chart-member').html('');
                    loadMemberStatMonthly(year);
                });
                $('#search-transaksi').on('click', function() {
                    let year = $('#year-transaksi').val();
                    $('#chart-transaksi-monthly').html('');
                    loadTransaksiStatMonthly(year);
                });
            });

            function loadMemberStatMonthly(years) {
                $.ajax({
                    type: "get",
                    url: "{{ route('peningkatan.member.pegawai.monthly') }}",
                    data: {
                        'year': years,
                        'user': '{{ $user->id }}'
                    },
                    success: function(response) {
                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'Member',
                                data: response.dataBulanan,
                            }],
                            xaxis: {
                                categories: response.month,
                            },
                            title: {
                                text: `Peningkatan Member ${years}`,
                                align: 'center',
                                margin: 50,
                                offsetX: 0,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '16px',
                                    fontWeight: 'medium',
                                    color: '#263238',
                                },
                            },
                        };

                        chart = new ApexCharts(document.querySelector("#chart-member"), options);
                        chart.render();
                    }
                });
            }

            function loadMemberStatYearly() {
                $.ajax({
                    type: "get",
                    url: "{{ route('peningkatan.member.pegawai.yearly') }}",
                    data: {
                        'user': '{{ $user->id }}'
                    },
                    success: function(response) {
                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'Member',
                                data: response.dataTahunan,
                            }],
                            xaxis: {
                                categories: response.year,
                            },
                            title: {
                                text: `Peningkatan Member Tahunan`,
                                align: 'center',
                                margin: 50,
                                offsetX: 0,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '16px',
                                    fontWeight: 'medium',
                                    color: '#263238',
                                },
                            },
                        };

                        chart = new ApexCharts(document.querySelector("#chart-member-yearly"), options);
                        chart.render();
                    }
                });
            }

            function loadTransaksiStatYearly() {
                $.ajax({
                    type: "get",
                    url: "{{ route('peningkatan.transaksi.pegawai.yearly') }}",
                    data: {
                        'user': '{{ $user->id }}'
                    },
                    success: function(response) {
                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'Penjualan',
                                data: response.dataTahunan,
                            }],
                            xaxis: {
                                categories: response.year,
                            },
                            title: {
                                text: `Peningkatan Transaksi Tahunan`,
                                align: 'center',
                                margin: 50,
                                offsetX: 0,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '16px',
                                    fontWeight: 'medium',
                                    color: '#263238',
                                },
                            },
                        };

                        chart = new ApexCharts(document.querySelector("#chart-transaksi-yearly"), options);
                        chart.render();
                    }
                });
            }

            function loadTransaksiStatMonthly(years) {
                $.ajax({
                    type: "get",
                    url: "{{ route('peningkatan.transaksi.pegawai.monthly') }}",
                    data: {
                        'year': years,
                        'user': '{{ $user->id }}'
                    },
                    success: function(response) {
                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'Penjualan',
                                data: response.dataBulanan,
                            }],
                            xaxis: {
                                categories: response.month,
                            },
                            title: {
                                text: `Peningkatan Transaksi ${years}`,
                                align: 'center',
                                margin: 50,
                                offsetX: 0,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '16px',
                                    fontWeight: 'medium',
                                    color: '#263238',
                                },
                            },
                        };

                        chart = new ApexCharts(document.querySelector("#chart-transaksi-monthly"), options);
                        chart.render();
                    }
                });
            }
        </script>
    @endpush
@endsection
