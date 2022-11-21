<div class="card">
    <div class="card-body">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>
         <img src="{{ url('logo.png', []) }}" alt="" width="300">
        </h3>
      </section>

      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
       

        <hr>
       

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-lg-4 payment-icons text-center">
            <p class="lead">Scan Barcode :</p>
            <div class="card-body">{!! QrCode::size(300)->generate($data[0]->no_registerasi); !!}</div>
            
            
          </div><!-- /.col -->
          
          <div class="col-lg-8 mt-2">
            <p class="lead">Data Registrasi</p>
            <div class="table-responsive">
              <table style="width: 100%;" border="1" class="styled-table">
                <tbody>
                  <tr>
                    <th>No Registrasi:</th>
                    <td>{{$data[0]->no_registerasi }}</td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td>{{$data[0]->nama_pasien }}</td>
                  </tr>
                  <tr>
                    <th>NIK/Employee ID:</th>
                    <td>{{$data[0]->nik }}</td>
                  </tr>
                  <tr>
                    <th>Job Title/Dept:</th>
                    <td>{{$data[0]->job }}</td>
                  </tr>
                  <tr>
                    <th>Divisi:</th>
                    <td>{{$data[0]->divisi }}</td>
                  </tr>
                  <tr>
                    <th>Umur:</th>
                    <td>{{$data[0]->umur }}</td>
                  </tr>
                  <tr>
                    <th>Lokasi:</th>
                    <td>{{$data[0]->lokasi }}</td>
                  </tr>
                  <tr>
                    <th>Tgl Pemeriksaan:</th>
                    <td>{{$data[0]->tgl_pemeriksaan }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin:</th>
                    <td>{{$data[0]->jk }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <hr>
        <div class="row no-print">
          <div class="col-lg-3">
            <a href="javascript:window.print();" target="_blank" class="btn btn-dark m-1"><i
                class="fa fa-print"></i> Print</a>
          </div>
         
        </div>
      </section><!-- /.content -->
    </div>
  </div>