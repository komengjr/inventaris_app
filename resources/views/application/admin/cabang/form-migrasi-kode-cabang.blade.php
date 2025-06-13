<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Migrasi Data {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-4">
        <div id="users">
            <div class="table-responsive scrollbar">
                <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort" data-sort="name">Data</th>
                            <th class="sort" data-sort="email">Status Cloning</th>
                            <th class="text-center" data-sort="age">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr id="table-master-barang">
                            <td class="name">Master Barang</td>
                            <td class="email">
                                <p class="text-danger mb-0">{{ $old_brg }} Data</p>
                                <p class="text-success mb-0">{{ $new_brg }} Data</p>
                            </td>
                            <td class="text-center fs-1">
                                <button class="btn btn-sm btn-primary fs--1" type="button"
                                    id="button-clone-data-master-barang" data-code="{{ $cabang->kd_cabang }}"
                                    data-list-pagination="next"><i class="fas fa-clone"></i> Clone</button>
                                <button class="btn btn-sm btn-danger fs--1" type="button"
                                    id="button-reset-clone-data-master-barang" data-code="{{ $cabang->kd_cabang }}"
                                    data-list-pagination="next"><i class="fas fa-redo"></i> Reset</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="name">Master Stock Opname</td>
                            <td class="email">
                                <p class="text-danger mb-0">0 Data</p>
                                <p class="text-success mb-0">0 Data</p>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary fs--1" type="button"
                                    data-list-pagination="next"><i class="fas fa-clone"></i> Clone</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var options = {
        valueNames: ['name', 'born']
    };

    var userList = new List('users', options);
</script>
