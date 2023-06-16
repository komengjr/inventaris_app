<div class="card">
    <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>
                Tiket : 
                <small> </small>
            </h3>
        </section>
            <table id="default-table1" class="styled-table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Status Cek Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($databarang as $databarang)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$databarang->nama_barang}}</td>
                            
                            <td>
                                <div class="icheck-material-success icheck-inline" id="jawab-{{$databarang->id}}">
                                    <input type="radio" id="inline-radio-success-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="0/{{$tiket}}/{{$databarang->id_inventaris}}"/>
                                    <label for="inline-radio-success-{{$databarang->id}}">Baik</label>
                                </div><br>
                                <div class="icheck-material-warning icheck-inline" id="jawab-{{$databarang->id}}">
                                    <input type="radio" id="inline-radio-warning-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="1/{{$tiket}}/{{$databarang->id_inventaris}}"/>
                                    <label for="inline-radio-warning-{{$databarang->id}}">Maintenance</label>
                                </div><br>
                                <div class="icheck-material-danger icheck-inline" id="jawab-{{$databarang->id}}">
                                    <input type="radio" id="inline-radio-danger-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="2/{{$tiket}}/{{$databarang->id_inventaris}}"/>
                                    <label for="inline-radio-danger-{{$databarang->id}}">Rusak</label>
                                </div>
                            </td>
                        
                            <td>
                                <textarea name="" id="" cols="10" rows="3" class="form-control"></textarea>
                            </td>
                        </tr>
                        <script>
                            function displayResult(buah){ 
                                console.log(buah);
                                $.ajax({
                                    url: '/menu/verifdatainventaris/lokasi/update/'+buah,
                                    type: 'GET',
                                    dataType: 'html'
                                })
                                .done(function(data) {
                                    // $('#menuverifikasi').html(data);
                                })
                                .fail(function() {
                                    // $('#menuverifikasi').html(
                                    //     '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                                    //     );
                                });
                            }
                          
                        </script>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>