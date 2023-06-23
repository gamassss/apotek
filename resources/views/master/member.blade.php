@extends('layout.main')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Data Member</h4>
    
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
                    <th>Nama Member</th>
                    <th>Alamat Member</th>
                    <th>No Telpon Member</th>
                    <th>Nama Pegawai</th>
                    <th style="max-width: 100px;">Action</th>
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
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        @if (Auth::user()->jabatan=="Manajemen")
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <select name="nama_pegawai" class="select2-modal-create" id="nama_pegawai">
                                    <option disabled selected value="-">-- Pilih Pegawai --</option>
                                    @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama-obat-create" class="form-label">Nama Member</label>
                                <input required type="text" name="nama_member" id="nama-obat-create" class="form-control"
                                    value="{{ old('nama_member') }}" autocomplete="off" autofocus />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="alamat_member" class="form-label">Alamat Member</label>
                                <input required type="text" name="alamat_member" id="alamat_member" class="form-control"
                                    value="{{ old('alamat_member') }}" autocomplete="off" autofocus />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="no_telpon" class="form-label">No Telpon Member</label>
                                <input required type="text" name="no_telpon" id="no_telpon" class="form-control"
                                    value="{{ old('no_telpon') }}" autocomplete="off" autofocus />
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

    <div class="modal fade" id="modal-edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        @if (Auth::user()->jabatan=="Manajemen")
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_nama_pegawai" class="form-label">Nama Pegawai</label>
                                <select name="user_id" class="select2-modal-edit" id="edit_nama_pegawai">
                                    @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_nama_member" class="form-label">Nama Member</label>
                                <input type="text" id="edit_nama_member" name="nama_member" class="form-control"
                                    value="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_alamat_member" class="form-label">Alamat Member</label>
                                <input type="text" id="edit_alamat_member" name="alamat_member" class="form-control"
                                    value="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="edit_telpon_member" class="form-label">No Telpon Member</label>
                                <input type="text" id="edit_telpon_member" name="no_telpon" class="form-control"
                                    value="" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Edit
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
                ajax: '{{ route('member.index') }}',
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
                        data: 'alamat_member',
                        name: 'alamat_member'
                    },
                    {
                        data: 'no_telpon',
                        name: 'no_telpon'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
            $('#myTable').on('click', '.edit-button', function() {
                let idMember = $(this).attr('data-id');
                $.get(`/admin/data/member/${idMember}`,
                    function(data) {
                        $('#edit-form').attr('action', `/admin/data/member/${data.id}`)
                        $('#edit_nama_member').val(data.nama_member);
                        $('#edit_alamat_member').val(data.alamat_member);
                        $('#edit_telpon_member').val(data.no_telpon);
                        $('#edit_nama_pegawai').val(data.user.id).trigger("change");
                        $('#modal-edit').modal('show');
                    },
                );
            });
      
        </script>
    @endpush
@endsection
