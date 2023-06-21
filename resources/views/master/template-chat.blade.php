@extends('layout.main')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Template Chat</h4>
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
                    <th>Text</th>
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
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea name="text" class="form-control" id="text" cols="30" rows="10"></textarea>
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
                    <h5 class="modal-title" id="modalCenterTitle">Edit Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="text-update" class="form-label">Text</label>
                                <textarea name="text" class="form-control" id="text-update" cols="30" rows="10"></textarea>
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
            ajax: '{{ route('template-chat.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'text',
                    name: 'text'
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
                let idTemplate = $(this).attr('data-id');
                $.get(`/admin/data/template-chat/${idTemplate}`,
                    function (data) {
                        $('#edit-form').attr('action',`/admin/data/template-chat/${data.id}`)
                        $('#text-update').val(data.text);
                        $('#modal-edit').modal('show');
                    },
                   
                );
            });
        </script>
    @endpush
@endsection
