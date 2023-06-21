@extends('layout.main')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Data Obat</h4>
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
                    <th>Nama Obat</th>
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
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama-obat-create" class="form-label">Nama</label>
                                <input required type="text" name="nama_obat" id="nama-obat-create" class="form-control"
                                    value="{{ old('nama_obat') }}" autocomplete="off" autofocus />
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

    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama-obat" class="form-label">Nama</label>
                                <input type="text" id="nama-obat" name="nama_obat" class="form-control" value="" />
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
            ajax: '{{ route('obat.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_obat',
                    name: 'nama_obat'
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
            $('#myTable').on('click','.edit-button', function () {
                let idObat = $(this).attr('data-id');
                $.get(`/admin/data/obat/${idObat}`,
                    function (data) {
                        $('#edit-form').attr('action',`/admin/data/obat/${data.id}`)
                        $('#nama-obat').val(data.nama_obat);
                        $('#modal-edit').modal('show');
                    },
                   
                );
            });
        </script>
    @endpush
@endsection
