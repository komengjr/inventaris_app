<div class="modal-header bg-success">
    <p class="modal-title text-white">

    </p>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="showmenudatalokasibarang">
    <div class="col-12 col-lg-12 col-xl-12">
        <div class="card" >
            <div class="card-body" >
                <div class="media align-items-center">
                    <div class="media-body text-left">
                        <h4 class="text-primary mb-0">{{$no->nomor_ruangan}}</h4>
                        <span class="small-font">Nomor Ruangan</span>
                    </div>
                    <div class="w-circle-icon rounded bg-warning" style="cursor: pointer;" data-toggle="modal"
                        data-target="#menusmasterbarang">
                        <i class="fa fa-download text-white"></i>
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
                @foreach ($datainventaris as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->no_inventaris }}</td>
                        <td>{{ $item->merk }}</td>
                        <td>{{ $item->tgl_beli }}</td>
                        <td>{{ $item->th_perolehan }}</td>
                        <td>{{ $item->harga_perolehan }}</td>
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
