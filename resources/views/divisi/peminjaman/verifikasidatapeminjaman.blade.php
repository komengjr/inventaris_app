
<style>
    input[type="file"] {
    display: none;
}
.row label{
    padding-top: 10px;
}
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
         <h6>Form Peminjaman <span style="color: royalblue;"> Nomor tiket : {{$data->tiket_peminjaman}}</span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form  method="POST" action="{{ url('divisi/peminjaman/postverifikasidata', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="modal-body">
        <div class="card pb-3" id="tablepeminjaman">
            <table class="styled-table" id="data-verif">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Nama Barang</th>
                        <th>Merek / Type / No Seri</th>
                        <th>Tanggal Barang pinjam</th>
                        <th>Kondisi Barang Pinjam</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($barangpinjam as $barangpinjam)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$barangpinjam->nama_barang}}</td>
                            <td>{{$barangpinjam->merk}} / {{$barangpinjam->type}} / {{$barangpinjam->no_seri}}</td>
                            <td>{{$barangpinjam->tgl_pinjam_barang}}</td>
                            <td>{{$barangpinjam->kondisi_pinjam}}</td>
                            <td>null</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <input type="text" name="id" id="id" value="{{$data->tiket_peminjaman}}" hidden>
            <div class="col-md-12">
                <label for="">Penanggung Jawab Peminjam</label>
                <select name="pj_pinjam" id="" class="form-control single-select">
                    <option value="">Pilih Staff</option>
                    @foreach ($staff as $staff)
                        <option value="{{$staff->nip}}">{{$staff->nama_staff}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
            </div>
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save" ></i> Verif Data</button>
    </div>
</form>

</div>

<script>
     $(document).ready(function() {
        $('.single-select').select2();

      });
</script>
<script>
    $('#data-verif').DataTable();
</script>
