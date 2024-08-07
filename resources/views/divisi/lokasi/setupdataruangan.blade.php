<div class="modal-header bg-success">
    <p class="modal-title text-white">

    </p>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-close"></i></span>
    </button>
</div>
<div class="modal-body" id="showmenudatalokasibarang">
    <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body" >
                <div class="media align-items-center">
                    <div class="media-body text-left">
                        <h4 class="text-primary mb-0">{{$no->nomor_ruangan}}</h4>
                        <span class="small-font">Nomor Ruangan</span>
                    </div>
                    <div class=""
                        data-target="#menusmasterbarang">
                        <form action="{{ url('divisi/postmasterlokasi/datasetup/postdataall', []) }}" method="post">
                            @csrf
                            <input type="text" name="no_ruangan" value="{{$no->id_nomor_ruangan_cbaang}}" hidden>
                            <input type="text" name="kd_lokasi" value="{{$no->kd_lokasi}}" hidden>
                            <button class="btn-info"><i class="fa fa-download"></i> Pilih Semua</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="default-datatablelog">
            <thead style="font-size: 12px;">
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>

                    <th>Nama Barang</th>
                    <th>No Inventaris</th>
                    <th>Merek / Type</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tahun Perolehan</th>
                    <th>Harga</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($datainventaris as $item)
                    <tr>
                        <td data-label="Nomor">{{$no++}}</td>
                        <td data-label="Nama Barang">{{ $item->nama_barang }}</td>
                        <td data-label="Nomor Inventaris">{{ $item->no_inventaris }}</td>
                        <td data-label="Merk">{{ $item->merk }}</td>
                        <td data-label="Tanggal Beli">{{ $item->tgl_beli }}</td>
                        <td data-label="Tahun Perolehan">{{ $item->th_perolehan }}</td>
                        <td data-label="Harga Perolehan">{{ $item->harga_perolehan }}</td>
                        <td><button class="btn-warning" id="buttoninputdatalokasi" data-id="{{$item->id_inventaris}}" data-no="{{$id}}"><i class="fa fa-dot-circle-o"></i> Pilih</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="modal-footer" style="float: left;">
</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatablelog').DataTable();
        $('#default-datatablelog1').DataTable();

    });
</script>
