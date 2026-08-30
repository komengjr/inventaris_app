<div class="row g-3">
    <!-- Form Document KSO -->
    <div class="col-lg-5">
        <div class="card border border-200 shadow-sm">
            <div class="card-header bg-light py-3">
                <h5 class="mb-0 text-primary fw-bold" id="form-doc-title">
                    <i class="fas fa-file-upload me-2"></i>Input Dokumen KSO
                </h5>
            </div>
            <div class="card-body">
                <form id="form-document-kso" enctype="multipart/form-data">
                    @csrf
                    <!-- ID Primary Key sesuai Schema DB -->
                    <input type="hidden" name="id_document_kso" id="id_document_kso">

                    <!-- FK ID Inventaris KSO -->
                    <input type="hidden" name="id_inventaris" id="id_inventaris" value="{{ $code ?? '' }}">

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="periode_kso">Periode KSO <span class="text-danger">*</span></label>
                        <input class="form-control" id="periode_kso" name="periode_kso" type="text" placeholder="Contoh: 2023 - 2028" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="file_kso">File Dokumen <span id="req-file" class="text-danger">*</span></label>
                        <input class="form-control" id="file_kso" name="file_kso" type="file" accept=".pdf,.doc,.docx" />
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-secondary btn-sm" id="btn-cancel-doc" style="display:none;">Batal</button>
                        <button class="btn btn-primary btn-sm px-4" type="submit" id="btn-save-doc">
                            <i class="fas fa-save me-1"></i> Simpan Dokumen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table Document KSO -->
    <div class="col-lg-7">
        <div class="card border border-200 shadow-sm">
            <div class="card-header bg-light py-3">
                <h5 class="mb-0 text-primary fw-bold">
                    <i class="fas fa-folder-open me-2"></i>Data Dokumen KSO
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-doc-kso" class="table table-striped align-middle fs--1 nowrap w-100">
                        <thead class="bg-200 text-800">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Periode</th>
                                <th>Dokumen</th>
                                <th style="width: 15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $datas)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semi-bold">{{ $datas->periode_kso }}</td>
                                <td>
                                    @if($datas->file_kso)
                                    <a href="{{ asset('doc_kso/' . $datas->file_kso) }}" target="_blank" class="btn btn-falcon-info btn-sm">
                                        <i class="fas fa-file-pdf me-1"></i> Lihat Dokumen
                                    </a>
                                    @else
                                    <span class="badge bg-soft-warning text-warning">Tidak Ada File</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- DIPERBAIKI: Menggunakan id_document_kso, bukan id -->
                                    <button class="btn btn-falcon-default btn-sm btn-edit-doc me-1"
                                        data-id="{{ $datas->id_document_kso }}"
                                        data-periode="{{ $datas->periode_kso }}"
                                        title="Edit Data">
                                        <span class="fas fa-pencil-alt text-primary"></span>
                                    </button>
                                    <button class="btn btn-falcon-default btn-sm btn-delete-doc"
                                        data-id="{{ $datas->id_document_kso }}"
                                        title="Hapus Data">
                                        <span class="fas fa-trash-alt text-danger"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#data-doc-kso')) {
            new DataTable('#data-doc-kso', {
                responsive: true
            });
        }

        // Action Handler Submit Form (Create & Update)
        $('#form-document-kso').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#id_document_kso').val();
            var url = id ? "{{ route('doc_kso.update') }}" : "{{ route('doc_kso.store') }}";

            $('#btn-save-doc').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Memproses...');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status === 'success') {
                        Swal.fire('Berhasil!', res.message, 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Gagal!', res.message, 'error');
                        $('#btn-save-doc').prop('disabled', false).html('<i class="fas fa-save me-1"></i> Simpan Dokumen');
                    }
                },
                error: function() {
                    Swal.fire('Error!', 'Terjadi kesalahan sistem.', 'error');
                    $('#btn-save-doc').prop('disabled', false).html('<i class="fas fa-save me-1"></i> Simpan Dokumen');
                }
            });
        });

        // Trigger Click Edit Data
        $(document).on('click', '.btn-edit-doc', function() {
            var id = $(this).data('id');
            var periode = $(this).data('periode');

            $('#id_document_kso').val(id);
            $('#periode_kso').val(periode);
            $('#form-doc-title').html('<i class="fas fa-edit me-2"></i>Edit Dokumen KSO');
            $('#req-file').hide();
            $('#btn-cancel-doc').show();
            $('#btn-save-doc').removeClass('btn-primary').addClass('btn-warning text-white').html('<i class="fas fa-edit me-1"></i> Update Dokumen');
        });

        // Trigger Batal Edit
        $('#btn-cancel-doc').click(function() {
            $('#form-document-kso')[0].reset();
            $('#id_document_kso').val('');
            $('#form-doc-title').html('<i class="fas fa-file-upload me-2"></i>Input Dokumen KSO');
            $('#req-file').show();
            $(this).hide();
            $('#btn-save-doc').removeClass('btn-warning text-white').addClass('btn-primary').html('<i class="fas fa-save me-1"></i> Simpan Dokumen');
        });

        // Trigger Hapus Data
        $(document).on('click', '.btn-delete-doc', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Dokumen KSO akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('doc_kso.destroy') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_document_kso: id
                        },
                        success: function(res) {
                            if (res.status === 'success') {
                                Swal.fire('Terhapus!', res.message, 'success').then(() => location.reload());
                            } else {
                                Swal.fire('Gagal!', res.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Gagal menghapus dokumen.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
