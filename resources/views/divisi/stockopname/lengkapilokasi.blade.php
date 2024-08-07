{{-- <div class="modal-header">
    <span><button class="btn-info"><i class="fa fa-arrow-circle-o-left"></i></button>
    </span>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <i class="fa fa-close"></i>
    </button>
</div> --}}
<div class="modal-body">
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
                        <th>Detail Barang</th>
                        <th>Status Cek Barang</th>
                        {{-- <th>Keterangan</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($databarang as $databarang)
                        <tr>
                            <td data-label="No">{{$no++}}</td>
                            <td data-label="Detail Barang">
                                {{$databarang->nama_barang}}
                                <p>( {{$databarang->no_inventaris}} )</p>
                            </td>

                            <td data-label="Pilih Kondisi" class="text-left">
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
                                <textarea id="ket{{$databarang->id}}" class="form-control" hidden></textarea>
                            </td>

                            {{-- <td>
                                <div id="div{{$databarang->id}}">
                                    <div style="display: none;">
                                        <textarea id="ket{{$databarang->id}}" class="form-control"></textarea>
                                        <button class="btn-info"><i class="fa fa-save"></i></button>
                                    </div>

                                </div>
                            </td> --}}
                        </tr>
                        <script>
                            function displayResult(buah){
                                var ket = document.getElementById("ket<?php echo $databarang->id ?>").value;
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

</div>
