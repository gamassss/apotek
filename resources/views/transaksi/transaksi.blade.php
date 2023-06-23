@extends('layout.main')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Data Pembelian</h4>

    <div class="card px-4 pb-4 pt-2">
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
        <div class="d-flex justify-content-end mb-3">
            <div class="demo-inline-spacing">
                @if (Auth::user()->jabatan == 'Pegawai')
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#modal-create">
                        <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah
                    </button>
                @endif

            </div>
        </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="max-width: 50px;">No</th>
                    @if (Auth::user()->jabatan == 'Manajemen')
                        <th>Nama Pegawai</th>
                    @endif
                    <th>Nama Member</th>
                    <th>Nama Obat</th>
                    <th>Lama Habis</th>
                    <th>Tanggal Beli</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="table-responsive text-nowrap">
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="modal-create" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="member_id" class="form-label">Nama Member</label>
                                <select name="member_id" class="select2-modal-create" id="member_id">
                                    <option disabled selected value="-">-- Pilih Member --</option>
                                    @foreach ($member as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_member }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="obat_id" class="form-label">Nama Obat</label>
                                <select name="obat_id" class="select2-modal-create" id="obat_id">
                                    <option disabled selected value="-">-- Pilih Obat --</option>
                                    @foreach ($obat as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="lama_habis" class="form-label">Lama Habis (Hari)</label>
                                <input required type="number" name="lama_habis" id="lama_habis" class="form-control"
                                    value="{{ old('lama_habis') }}" autocomplete="off" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (Auth::user()->jabatan == 'Pegawai')
        @push('script')
            <script>
                $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('transaksi-obat.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama_member',
                            name: 'nama_member'
                        },
                        {
                            data: 'nama_obat',
                            name: 'nama_obat'
                        },
                        {
                            data: 'lama_habis',
                            name: 'lama_habis'
                        },
                        {
                            data: 'tanggal_beli',
                            name: 'tanggal_beli'
                        },

                    ],
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],

                });
                // $('#myTable').on('click', '.edit-button', function() {
                //     let idMember = $(this).attr('data-id');
                //     $.get(`/admin/data/member/${idMember}`,
                //         function(data) {
                //             $('#edit-form').attr('action', `/admin/data/member/${data.id}`)
                //             $('#edit_nama_member').val(data.nama_member);
                //             $('#edit_alamat_member').val(data.alamat_member);
                //             $('#edit_telpon_member').val(data.no_telpon);
                //             $('#modal-edit').modal('show');
                //         },

                //     );
                // });
            </script>
        @endpush
    @endif
    @if (Auth::user()->jabatan == 'Manajemen')
        @push('script')
            <script>
                $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('transaksi-obat.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama_pegawai',
                            name: 'nama_pegawai'
                        },
                        {
                            data: 'nama_member',
                            name: 'nama_member'
                        },
                        {
                            data: 'nama_obat',
                            name: 'nama_obat'
                        },
                        {
                            data: 'lama_habis',
                            name: 'lama_habis'
                        },
                        {
                            data: 'tanggal_beli',
                            name: 'tanggal_beli'
                        },

                    ],
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],

                });
                // $('#myTable').on('click', '.edit-button', function() {
                //     let idMember = $(this).attr('data-id');
                //     $.get(`/admin/data/member/${idMember}`,
                //         function(data) {
                //             $('#edit-form').attr('action', `/admin/data/member/${data.id}`)
                //             $('#edit_nama_member').val(data.nama_member);
                //             $('#edit_alamat_member').val(data.alamat_member);
                //             $('#edit_telpon_member').val(data.no_telpon);
                //             $('#modal-edit').modal('show');
                //         },

                //     );
                // });
            </script>
        @endpush
    @endif

@endsection
