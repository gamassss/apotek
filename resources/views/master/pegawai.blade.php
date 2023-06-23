@extends('layout.main')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Data Pegawai</h4>
    <div class="card px-4 pb-4 pt-2">
        <div class="d-flex justify-content-end mb-3">
            <div class="demo-inline-spacing">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah
                </button>
                
            </div>
        </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="max-width: 50px;">No</th>
                    <th>Nama Pegawai</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                    <th style="max-width: 100px;">Detail</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="table-responsive text-nowrap">
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama Pegawai</label>
                                <input required type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autocomplete="off" autofocus />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="username" class="form-label">Username Pegawai</label>
                                <input required type="text" name="username" id="username" class="form-control"
                                    value="{{ old('username') }}" autocomplete="off" autofocus />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="no_telpon" class="form-label">Nomor Telepon Pegawai</label>
                                <input required type="number" name="no_telpon" id="no_telpon" class="form-control"
                                    value="{{ old('no_telpon') }}" autocomplete="off" autofocus />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="password" class="form-label">Password Pegawai</label>
                                <input required disabled type="text" name="password" id="password" class="form-control"
                                    value="12345678" autocomplete="off" autofocus />
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

  
    @push('script')
        <script>
            $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('pegawai.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'no_telpon',
                    name: 'no_telpon'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            
                // {
                //     data: 'action',
                //     name: 'action',
                // },
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
            });
            $('#myTable').on('click','.edit-button', function () {
                let idMember = $(this).attr('data-id');
                $.get(`/admin/data/member/${idMember}`,
                    function (data) {
                        $('#edit-form').attr('action',`/admin/data/member/${data.id}`)
                        $('#edit_nama_member').val(data.nama_member);
                        $('#edit_alamat_member').val(data.alamat_member);
                        $('#edit_telpon_member').val(data.no_telpon);
                        $('#modal-edit').modal('show');
                    },
                   
                );
            });
        </script>
    @endpush
@endsection
