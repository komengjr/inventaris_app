<div class="modal-body p-0">


    <div id="table-data-peminjaman">
        <table id="exampledata" class="table table-striped nowrap" style="width:100%">
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
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->inventaris_data_name }}</td>
                        <td>{{ $datas->inventaris_data_number }}</td>
                        <td class="m-2">
                            <div class="card p-3">
                                <form class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="inputState">Status</label>
                                        <select class="form-select" id="inputState">
                                            <option selected="selected">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="inputZip">Deskripsi</label>
                                        <textarea name="" class="form-control" id=""></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm float-end" type="submit">Verif</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
