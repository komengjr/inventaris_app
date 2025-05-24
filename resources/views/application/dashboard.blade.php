@extends('layouts.template')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border border-primary">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center border-bottom">
                        <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt="" width="50" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to {{ $cabang->nama_cabang }}</h6>
                            <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                    System</span></h4>
                        </div><img class="ms-n4 d-none d-lg-block"
                            src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                    </div>
                    <div class="col-xl-auto px-3 py-2">
                        <h6 class="text-primary fs--1 mb-1">Support By : </h6>
                        <h4 class="text-primary fw-bold mb-0">
                            <img class="" src="{{ asset('vendor/pramita.png') }}" alt="" width="90" />
                            <img class="ms-1" src="{{ asset('vendor/sima.jpeg') }}" alt="" width="80" />
                            <img class="ms-1" src="{{ asset('vendor/prospek.png') }}" alt="" width="80" />
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">Module Start<a class="anchorjs-link "
                            aria-label="Anchor" data-anchorjs-icon="#" href="#example" style="padding-left: 0.375em;"></a>
                    </h5>
                    <p class="mb-0 mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum aspernatur quae, sint
                        illo saepe, non velit provident numquam deserunt rem dolorum exercitationem amet incidunt officiis
                        fuga ab accusamus aut. Placeat!</p>
                </div>
                <div class="col-auto ms-auto">

                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-ec0fa1e3-6325-4caf-a468-7691ef065d01"
                    id="dom-ec0fa1e3-6325-4caf-a468-7691ef065d01">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Menu
                                    Peminjaman ?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse1" aria-labelledby="heading1"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">

                                    <div class="list-group">
                                        <a
                                            class="list-group-item list-group-item-action flex-column align-items-start p-3 p-sm-4">
                                            <div
                                                class="d-flex flex-column flex-sm-row justify-content-between mb-1 mb-md-0">
                                                <h5 class="mb-1">Step 1</h5><small class="text-muted">Menu
                                                    Peminjaman</small>
                                            </div>
                                            <p class="mb-1">Membuat atau Menambahkan data / tiket Peminjaman.</p>
                                        </a>
                                        <a
                                            class="list-group-item list-group-item-action flex-column align-items-start p-3 p-sm-4">
                                            <div
                                                class="d-flex flex-column flex-sm-row justify-content-between mb-1 mb-md-0">
                                                <h5 class="mb-1">Step 2</h5><small class="text-muted">Menu
                                                    Peminjaman</small>
                                            </div>
                                            <p class="mb-1">Pastikan Field yang diisi sudah benar dan menyesuaikan
                                                keterangan yang ada.</p>
                                        </a>
                                        <a
                                            class="list-group-item list-group-item-action flex-column align-items-start p-3 p-sm-4">
                                            <div
                                                class="d-flex flex-column flex-sm-row justify-content-between mb-1 mb-md-0">
                                                <h5 class="mb-1">Step 3</h5><small class="text-muted">Menu
                                                    Peminjaman</small>
                                            </div>
                                            <p class="mb-1">Setelah Step 2 Sudah dilakukan dengan benar dan data tiket
                                                penyimpanan sudah tersimpan dengan baik , setelah itu untuk melengkapi data
                                                barang yang akan di pinjam.</p>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Menu Mutasi
                                    Antar Cabang ?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse2" aria-labelledby="heading2"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">

                                    <div class="list-group">
                                        <a
                                            class="list-group-item list-group-item-action flex-column align-items-start p-3 p-sm-4">
                                            <div
                                                class="d-flex flex-column flex-sm-row justify-content-between mb-1 mb-md-0">
                                                <h5 class="mb-1">Step 1</h5><small class="text-muted">Menu
                                                    Peminjaman</small>
                                            </div>
                                            <p class="mb-1">Membuat atau Menambahkan data / tiket Peminjaman.</p>
                                        </a>
                                        <a
                                            class="list-group-item list-group-item-action flex-column align-items-start p-3 p-sm-4">
                                            <div
                                                class="d-flex flex-column flex-sm-row justify-content-between mb-1 mb-md-0">
                                                <h5 class="mb-1">Step 2</h5><small class="text-muted">Menu
                                                    Peminjaman</small>
                                            </div>
                                            <p class="mb-1">Pastikan Field yang diisi sudah benar dan menyesuaikan
                                                keterangan yang ada.</p>
                                        </a>
                                        <a
                                            class="list-group-item list-group-item-action flex-column align-items-start p-3 p-sm-4">
                                            <div
                                                class="d-flex flex-column flex-sm-row justify-content-between mb-1 mb-md-0">
                                                <h5 class="mb-1">Step 3</h5><small class="text-muted">Menu
                                                    Peminjaman</small>
                                            </div>
                                            <p class="mb-1">Setelah Step 2 Sudah dilakukan dengan benar dan data tiket
                                                penyimpanan sudah tersimpan dengan baik , setelah itu untuk melengkapi data
                                                barang yang akan di pinjam.</p>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Menu
                                    Stockopname Barang Inventaris ?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse3" aria-labelledby="heading3"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">Disputed payments (also known as chargebacks) incur a $15.00
                                    fee. If the customer’s bank resolves the dispute in your favor, the fee is fully
                                    refunded.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Is there
                                    a fee to use Apple Pay or Google Pay?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse4" aria-labelledby="heading4"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">There are no additional fees for using our mobile SDKs or to
                                    accept payments using consumer wallets like Apple Pay or Google Pay.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
