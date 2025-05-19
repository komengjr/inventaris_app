  <table id="exampledatas" class="table table-striped nowrap" style="width:100%">
      <thead class="bg-200 text-700">
          <tr>
              <th>Gambar</th>
              <th>Nama Barang</th>
              <th>ID Inventaris</th>
              <th>Nomor Inventaris</th>
              <th>Lokasi</th>
              <th>Merek / Type</th>
              <th>Harga</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody style="font-size: 13px;">
          @foreach ($data as $datas)
              <?php
              $nama_lokasi = DB::table('tbl_lokasi')->select('tbl_lokasi.nama_lokasi')->where('kd_lokasi', $datas->inventaris_data_location)->get();
              ?>
              <tr>
                  <td>
                      @if ($datas->inventaris_data_file == '')
                          <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="img-thumbnail" id="videoPreview"
                              width="70" height="70">
                      @else
                          <img src="{{ asset($datas->inventaris_data_file) }}" alt="" width="80" />
                      @endif
                  </td>
                  <td>{{ $datas->inventaris_data_name }}</td>
                  <td>{{ $datas->inventaris_data_code  }}</td>
                  <td>{{ $datas->inventaris_data_number }}</td>
                  @if ($nama_lokasi->isEmpty())
                      <td>{{ $datas->inventaris_data_location }}</td>
                  @else
                      <td>{{ $datas->inventaris_data_location }} ( {{ $nama_lokasi[0]->nama_lokasi }} )</td>
                  @endif


                  <td>
                      {{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}
                  </td>

                  <td>@currency($datas->inventaris_data_harga)</td>
                  <td class="text-center">
                      <button class="btn btn-falcon-warning" id="button-update-data-barang-cabang"
                          data-code="{{ $datas->inventaris_data_number }}"><i class="fa fa-edit">
                          </i> Detail & Edit</button><br><br>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  <script>
      new DataTable('#exampledatas', {
          responsive: true
      });
  </script>
