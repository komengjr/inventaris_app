<div class="modal-body p-0">
    <div class="bg-primary rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel" style="color: white;">Form Add Data Ruangan</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="row p-3 g-3">
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">1. Inventaris Tersedia (Database)</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle" id="tabelTersedia" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 40px;" class="text-center no-sort">
                                            <input class="form-check-input" type="checkbox" id="selectAllTersedia">
                                        </th>
                                        <th>Kode Barang</th>
                                        <th>No Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Loc</th>
                                        <th class="text-end">Harga</th>
                                        <th class="">Cabang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-primary w-100" id="btnPindahkan">Mindahkan ke Tabel IT &rarr;</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">2. Siap Masuk ke Inventaris IT</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle" id="tabelTerpilih" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Kode Barang</th>
                                        <th>No Barang</th>
                                        <th>Nama Barang</th>
                                        <th class="text-end">Harga</th>
                                        <th style="width: 50px;" class="text-center no-sort">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-secondary" id="btnReset">Reset All</button>
                        <button type="button" class="btn btn-success flex-grow-1" id="btnSimpan">Simpan ke Database</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Output JSON Server</h5>
                    <span class="badge bg-light text-dark" id="itemCount">0 Item</span>
                </div>
                <div class="card-body bg-dark text-light p-0">
                    <pre class="m-0 p-3" id="jsonOutput" style="font-size: 0.85rem; max-height: 500px; overflow-y: auto;">// Menunggu aksi simpan...</pre>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {

        // 1. Inisialisasi DataTables
        const dtTersedia = $('#tabelTersedia').DataTable({
            "pageLength": 10,
            "columnDefs": [{
                    "orderable": false,
                    "targets": 'no-sort'
                },
                {
                    "targets": 5,
                    "visible": false
                } // Sembunyikan kolom cabang dari mata user, tapi datanya tersimpan
            ],
            "language": {
                "search": "Cari:",
                "lengthMenu": "_MENU_"
            }
        });

        const dtTerpilih = $('#tabelTerpilih').DataTable({
            "pageLength": 10,
            "columnDefs": [{
                "orderable": false,
                "targets": 'no-sort'
            }],
            "language": {
                "zeroRecords": "Belum ada data dipilih"
            }
        });

        // 2. Load Data dari Database via AJAX Laravel saat halaman siap
        function loadDataTersedia() {
            dtTersedia.clear().draw();

            fetch("{{ route('master_data_it_get_data') }}")
                .then(response => response.json())
                .then(data => {
                    data.forEach(item => {
                        // Format mata uang rupiah untuk display tabel
                        let formatHarga = 'Rp ' + parseInt(item.inventaris_data_harga).toLocaleString('id-ID');
                        let checkbox = `<input class="form-check-input chk-tersedia" type="checkbox" value="${item.inventaris_data_code}">`;

                        dtTersedia.row.add([
                            checkbox,
                            item.inventaris_data_code,
                            item.inventaris_data_number,
                            item.inventaris_data_name,
                            item.inventaris_data_location,
                            formatHarga,
                            item.inventaris_data_cabang // Disimpan di hidden column (index 5)
                        ]);
                    });
                    dtTersedia.draw();
                })
                .catch(err => console.error('Gagal mengambil data:', err));
        }

        loadDataTersedia(); // Eksekusi load data awal

        // 3. Fitur Select All
        $('#selectAllTersedia').on('change', function() {
            const rows = dtTersedia.rows({
                'search': 'applied'
            }).nodes();
            $('.chk-tersedia', rows).prop('checked', this.checked);
        });

        // 4. Pindahkan Barang ke Kanan
        $('#btnPindahkan').on('click', function() {
            const checkedBoxes = dtTersedia.$('.chk-tersedia:checked');
            if (checkedBoxes.length === 0) {
                alert('Pilih minimal satu barang!');
                return;
            }

            checkedBoxes.each(function() {
                const row = $(this).closest('tr');
                const rowData = dtTersedia.row(row).data();
                const btnHapus = `<button type="button" class="btn btn-sm btn-danger btn-hapus-item" data-cabang="${rowData[5]}">✕</button>`;

                dtTerpilih.row.add([
                    rowData[1], // inventaris_data_code
                    rowData[2], // inventaris_data_name
                    rowData[3], // inventaris_data_jenis
                    rowData[4], // inventaris_data_harga
                    rowData[5], // inventaris_data_harga
                    btnHapus
                ]);
                dtTersedia.row(row).remove();
            });

            dtTersedia.draw();
            dtTerpilih.draw();
            $('#selectAllTersedia').prop('checked', false);
        });

        // 5. Kembalikan Barang ke Kiri (Hapus dari Pilihan)
        $('#tabelTerpilih tbody').on('click', '.btn-hapus-item', function() {
            const row = $(this).closest('tr');
            const rowData = dtTerpilih.row(row).data();
            const cabang = $(this).data('cabang');
            const checkboxHtml = `<input class="form-check-input chk-tersedia" type="checkbox" value="${rowData[0]}">`;

            dtTersedia.row.add([
                checkboxHtml,
                rowData[0], // code
                rowData[1], // name
                rowData[2], // jenis
                rowData[3], // harga
                rowData[4], // harga
                cabang // cabang dikembalikan ke hidden column
            ]);

            dtTerpilih.row.remove(row);
            dtTersedia.draw();
            dtTerpilih.draw();
        });

        // 6. PROSES SIMPAN KE DATABASE VIA FETCH POST (KIRIM JSON)
        $('#btnSimpan').on('click', function() {
            const semuaDataTerpilih = dtTerpilih.data();
            if (semuaDataTerpilih.length === 0) {
                alert('Tabel IT masih kosong!');
                return;
            }

            const payloadFinal = [];

            // Membangun payload yang dibutuhkan oleh skema 'inventaris_data_it'
            for (let i = 0; i < semuaDataTerpilih.length; i++) {
                const dataBaris = semuaDataTerpilih[i];
                // Ambil data cabang dari atribut data tombol hapus di baris tersebut
                const cabang = $(dtTerpilih.cell(i, 4).node()).find('.btn-hapus-item').data('cabang');

                payloadFinal.push({
                    inventaris_data_code: dataBaris[0],
                    inventaris_data_cabang: cabang
                });
            }

            // Dapatkan token CSRF Laravel dari tag meta
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Kirim data menggunakan Fetch API
            fetch("{{ route('master_data_it_simpan_barang') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify(payloadFinal)
                })
                .then(response => response.json())
                .then(res => {
                    $('#jsonOutput').text(JSON.stringify(payloadFinal, null, 2));
                    $('#itemCount').text(`${payloadFinal.length} Item`);

                    if (res.success) {
                        alert(res.message);
                        dtTerpilih.clear().draw(); // Bersihkan tabel kanan karena sudah masuk DB
                        location.reload();
                    } else {
                        alert('Gagal: ' + res.message);
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    alert('Terjadi kesalahan sistem saat menyimpan data.');
                });
        });

        $('#btnReset').on('click', function() {
            loadDataTersedia();
            dtTerpilih.clear().draw();
        });
    });
</script>
