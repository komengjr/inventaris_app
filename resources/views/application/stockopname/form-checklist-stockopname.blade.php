<div class="modal-body p-0">


    <div id="table-data-peminjaman">
        <table id="exampledata-list" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Nomor Inventaris</th>
                    <th>Verifikasi Kondsi</th>
                </tr>
            </thead>
            <tbody style="font-size: 13px;">
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    @php
                        $cek = DB::table('tbl_sub_verifdatainventaris')
                            ->where('kode_verif', $tiket)
                            ->where('id_inventaris', $datas->inventaris_data_code)
                            ->first();
                    @endphp
                    @if (!$cek)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->inventaris_data_number }}</td>
                            <td class="m-2">
                                <div class="card p-3">
                                    <form class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Status</label>
                                            <select class="form-select" id="answer{{ $datas->id_inventaris_data }}"
                                                name="answer-{{ $datas->id_inventaris_data }}">
                                                <option value="">Choose...</option>
                                                <option value="0">BAIK</option>
                                                <option value="1">MAINTENANCE</option>
                                                <option value="2">RUSAK</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label" for="inputZip">Deskripsi</label>
                                            <textarea name="desk{{ $datas->id_inventaris_data }}" class="form-control" id="desk{{ $datas->id_inventaris_data }}"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary btn-sm float-end" type="button"
                                                id="buttonverifcheckliststok{{ $datas->id_inventaris_data }}">Verif</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <script>
                            $(document).on("click", "#buttonverifcheckliststok{{ $datas->id_inventaris_data }}", function(e) {
                                e.preventDefault();
                                const answer = document.getElementById("answer{{ $datas->id_inventaris_data }}").value;
                                const desk = document.getElementById("desk{{ $datas->id_inventaris_data }}").value;
                                $('#hasil-pencarian').html(
                                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                                );
                                $.ajax({
                                    url: "{{ route('menu_stock_opname_proses_data_with_checklist_lokasi_save') }}",
                                    type: "POST",
                                    cache: false,
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "code": "{{ $code }}",
                                        "tiket": "{{ $tiket }}",
                                        "id": "{{ $datas->inventaris_data_code }}",
                                        'answer': answer,
                                        'desk': desk,
                                    },
                                    dataType: 'html',
                                }).done(function(data) {
                                    $('#hasil-pencarian').html(data);
                                }).fail(function() {
                                    $('#hasil-pencarian').html('eror');
                                });
                            });
                        </script>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        new DataTable('#exampledata-list', {
            responsive: true
        });
    </script>
</div>
