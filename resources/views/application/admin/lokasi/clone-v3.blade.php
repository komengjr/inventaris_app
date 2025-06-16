  <div class="tab-content">
      <table id="data-v3" class="table table-striped nowrap" style="width:100%">
          <thead class="bg-200 text-700">
              <tr>
                  <th>No</th>
                  <th>Kode Lokasi</th>
                  <th>Nama Lokasi</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($data_v3 as $items)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $items->master_lokasi_code }}</td>
                      <td>{{ $items->master_lokasi_name }}</td>
                      <td>
                          <button class="btn btn-falcon-warning btn-sm"><i class="fas fa-edit"></i></button>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <script>
      new DataTable('#data-v3', {
          responsive: true
      });
  </script>
