<div class="modal-body p-0">
    <div class="bg-youtube rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1 text-white" id="staticBackdropLabel">Perhitungan Depresiasi Data Aset</h4>
        <p class="fs--2 mb-0 text-white">Support by <a class="link-200 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card p-3 mb-3 border border-danger">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="">Nama Inventaris</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_name }}" disabled>
                    <input type="text" name="id_inventaris" id="id_inventaris"
                        value="{{ $datas->inventaris_data_code }}" hidden>
                </div>
                <div class="col-md-6">
                    <label for="">Nomor Inventaris</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_number }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Merek</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_merk }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Type</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_type }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">No Seri</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_no_seri }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Suplier</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_suplier }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Tanggal Pembelian</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $datas->inventaris_data_tgl_beli }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Harga Pembelian</label>
                    <input type="text" class="form-control form-control-lg" value="@currency($datas->inventaris_data_harga)" disabled>
                </div>
            </div>
        </div>

        <div class="card p-3 border border-youtube" id="hasil-pencarian">
            <table id="data-aset-d" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Persentase Penyusutan</th>
                        <th class="text-end">Pengurangan</th>
                        <th class="text-end">Penyusutan</th>
                        <th>Status Depresiasi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $no = 1;
                        $check = DB::table('depresiasi_penyusutan_log')
                            ->where('inventaris_data_code', $datas->inventaris_data_code)
                            ->where('penyusutan_log_harga', '=', 1)
                            ->first();
                        if ($check) {
                            $hitungs = $penyusutan->count();
                        } else {
                            $hitungs = $penyusutan->count() + 1;
                        }

                    @endphp
                    @for ($i = 0; $i < $hitungs; $i++)
                        @if ($i == $hitung)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data[$i - 1] }}</td>
                                <td class="text-center">
                                    {{ substr($persen, 0, 4) }} %
                                </td>
                                <td class="text-end">
                                    @currency($pengurangan)
                                </td>
                                <td class="text-end">
                                    <strong class="text-primary">@currency(1)</strong>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary">Done</span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $no++ }}</td>

                                <td>
                                    @if ($penyusutan->count() == $i)
                                        {{ $data[$i] }}
                                    @else
                                        <strong class="text-primary">{{$penyusutan[$i]->penyusutan_log_date}}</strong>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($penyusutan->count() == $i)
                                        {{ substr($persen, 0, 4) }} %
                                    @else
                                        <strong
                                            class="text-primary">{{ substr($penyusutan[$i]->penyusutan_log_persen, 0, 4) }}
                                            %</strong>
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if ($penyusutan->count() == $i)
                                        @currency($pengurangan)
                                    @else
                                        <strong class="text-primary">@currency($penyusutan[$i]->penyusutan_log_nilai)</strong>
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if ($penyusutan->count() == $i)
                                        @currency($hargaperolehan[$i])
                                    @else
                                        <strong class="text-primary">@currency($penyusutan[$i]->penyusutan_log_harga)</strong>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($penyusutan->count() == $i)
                                        <button class="btn btn-primary btn-sm" id="button-generate-fix-aset"
                                            data-id="{{ $datas->inventaris_data_code }}"
                                            data-code="{{ $code }}" data-nilai="{{ $pengurangan }}"
                                            data-persen="{{ substr($persen, 0, 4) }}"
                                            data-harga="{{ $hargaperolehan[$i] }}"
                                            data-date="{{ $data[$i] }}"><span class="far fa-credit-card"></span>
                                            Generate</button>
                                    @else
                                        <span class="badge bg-primary">Generated</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endfor --}}
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($penyusutan as $penyusurans)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ date('d - M - Y', strtotime($penyusurans->penyusutan_log_date)) }}</td>
                            <td>{{ $penyusurans->penyusutan_log_persen }} %</td>
                            <td>@currency($penyusurans->penyusutan_log_nilai)</td>
                            <td>@currency($penyusurans->penyusutan_log_harga)</td>
                            <td class="text-center"><span class="badge bg-primary">Generated</span></td>
                        </tr>
                    @endforeach
                    @if ($depresiasi->penyusutan_log_harga > 1)
                        @php
                            $hasil = $depresiasi->penyusutan_log_harga - $depresiasi->penyusutan_log_nilai;
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ date('d - M - Y', strtotime('+' . 1 . ' month', strtotime($depresiasi->penyusutan_log_date))) }}
                            </td>
                            <td>{{ $depresiasi->penyusutan_log_persen }} %</td>
                            <td>@currency($depresiasi->penyusutan_log_nilai)</td>
                            <td>
                                @if ($hasil <= 1)
                                    @currency(1)
                                @else
                                    @currency($hasil)
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm" id="button-generate-fix-aset"
                                    data-id="{{ $depresiasi->inventaris_data_code }}"
                                    data-code="{{ $depresiasi->penyusutan_aset_code }}"
                                    data-nilai="{{ $depresiasi->penyusutan_log_nilai }}"
                                    data-persen="{{ $depresiasi->penyusutan_log_persen }}"
                                    data-harga="{{ $hasil }}"
                                    data-date="{{ date('d - M - Y', strtotime('+' . 1 . ' month', strtotime($depresiasi->penyusutan_log_date))) }}">
                                    <span class="far fa-credit-card"></span>
                                    Generate</button>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <script>
                new DataTable('#data-aset-d', {
                    responsive: true
                });
            </script>

        </div>
    </div>
</div>
