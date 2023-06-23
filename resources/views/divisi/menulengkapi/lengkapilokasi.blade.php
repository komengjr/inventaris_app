
    <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>

                <small>  Nomor : {{$tiket}}</small>
            </h4>
        </section>
            <table id="default-table1" class="styled-table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Status Cek Barang</th>
                        <th>Keterangan</th>
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
                                @php
                                    $cekdata = DB::table('tbl_sub_verifdatainventaris')
                                    ->where('kode_verif',$tiket)
                                    ->where('id_inventaris',$databarang->id_inventaris)
                                    ->get();
                                @endphp
                                @if ($cekdata->isEmpty())
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
                                @else
                                    @if ($cekdata[0]->status_data_inventaris == 0)
                                        <div class="icheck-material-success icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-success-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="0/{{$tiket}}/{{$databarang->id_inventaris}}" checked/>
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
                                    @elseif($cekdata[0]->status_data_inventaris == 1)
                                        <div class="icheck-material-success icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-success-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="0/{{$tiket}}/{{$databarang->id_inventaris}}" />
                                            <label for="inline-radio-success-{{$databarang->id}}">Baik</label>
                                        </div><br>
                                        <div class="icheck-material-warning icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-warning-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="1/{{$tiket}}/{{$databarang->id_inventaris}}" checked/>
                                            <label for="inline-radio-warning-{{$databarang->id}}">Maintenance</label>
                                        </div><br>
                                        <div class="icheck-material-danger icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-danger-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="2/{{$tiket}}/{{$databarang->id_inventaris}}"/>
                                            <label for="inline-radio-danger-{{$databarang->id}}">Rusak</label>
                                        </div>
                                    @elseif($cekdata[0]->status_data_inventaris == 2)
                                        <div class="icheck-material-success icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-success-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="0/{{$tiket}}/{{$databarang->id_inventaris}}" />
                                            <label for="inline-radio-success-{{$databarang->id}}">Baik</label>
                                        </div><br>
                                        <div class="icheck-material-warning icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-warning-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="1/{{$tiket}}/{{$databarang->id_inventaris}}" />
                                            <label for="inline-radio-warning-{{$databarang->id}}">Maintenance</label>
                                        </div><br>
                                        <div class="icheck-material-danger icheck-inline" id="jawab-{{$databarang->id}}">
                                            <input type="radio" id="inline-radio-danger-{{$databarang->id}}" name="inlineradio-{{$databarang->id}}" onclick="displayResult(this.value)" value="2/{{$tiket}}/{{$databarang->id_inventaris}}" checked/>
                                            <label for="inline-radio-danger-{{$databarang->id}}">Rusak</label>
                                        </div>
                                    @endif
                                @endif

                            </td>

                            <td>
                                <div id="div{{$databarang->id}}">
                                    <div style="display: none;">
                                        <textarea id="ket{{$databarang->id}}" class="form-control"></textarea>
                                        <button class="btn-info"><i class="fa fa-save"></i></button>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        <script>
                            function displayResult(buah){
                                var ket = document.getElementById("ket<?php echo $databarang->id ?>").value;

                                console.log(buah);
                                console.log(ket);
                                $.ajax({
                                    url: '/menu/verifdatainventaris/lokasi/update/'+buah+'/-'+ket,
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

