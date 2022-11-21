@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-uppercase">
                Form Data
                </div>
                <div class="card-body">
                <form id="wizard-validation-form" action="#">
                    <div>
                    <h3>FR.APL.01</h3>
                    <section>
                        <h4>Bagian 1 :  Rincian Data Pemohon Sertifikasi </h4>
                        <p>Pada bagian ini,  cantumlan data pribadi, data pendidikan formal serta data pegawaian anda pada saat ini.</p>
                        <h5>A. Data Pribadi</h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="userName2">Nama lengkap </label>
                                    <input class="required form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-6">
                                    <label for="password2">No. KTP/NIK/Paspor</label>
                                    <input id="password2" name="password" type="text" class="required form-control" />
                                </div>
                            </div>
                       
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="confirm2">Tempat / tgl. Lahir</label>
                                    <div class="row">
                                        <div class="col-6"><input id="confirm2" name="confirm" type="text" class="required form-control" /></div>
                                        <div class="col-6"><input id="confirm2" name="confirm" type="date" class="required form-control" /></div>
                                    </div>
                                   
                                    
                                </div>
                                <div class="col-6">
                                    <label for="confirm2">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="icheck-material-primary">
                                                <input type="checkbox" id="user-checkbox1" checked="">
                                                <label for="user-checkbox1">Laki Laki</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="icheck-material-primary">
                                                <input type="checkbox" id="user-checkbox1" checked="">
                                                <label for="user-checkbox1">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="userName2">Kebangsaan </label>
                                    <input class="required form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-6">
                                    <label for="password2">Alamat Rumah</label>
                                    <textarea name="" class="form-control" id="" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="userName2">Nama lengkap </label>
                                    <input class="required form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-6">
                                    <label for="password2">No. KTP/NIK/Paspor</label>
                                    <input id="password2" name="password" type="text" class="required form-control" />
                                </div>
                            </div>
                       
                        </div>

                        <div class="form-group">
                        <label class="col-lg-12 control-label">(*) Mandatory</label>
                        </div>
                    </section>
                    <h3>Step 2</h3>
                    <section>
                        <div class="form-group">
                        <label for="name2"> First name *</label>
                        <input
                            id="name2"
                            name="name"
                            type="text"
                            class="required form-control"
                        />
                        </div>
                        <div class="form-group">
                        <label for="surname2"> Last name *</label>
                        <input
                            id="surname2"
                            name="surname"
                            type="text"
                            class="required form-control"
                        />
                        </div>

                        <div class="form-group">
                        <label for="email2">Email *</label>
                        <input
                            id="email2"
                            name="email"
                            type="text"
                            class="required email form-control"
                        />
                        </div>

                        <div class="form-group">
                        <label for="address2">Address </label>
                        <input
                            id="address2"
                            name="address"
                            type="text"
                            class="form-control"
                        />
                        </div>

                        <div class="form-group">
                        <label class="col-lg-12 control-label"
                            >(*) Mandatory</label
                        >
                        </div>
                    </section>
                    <h3>Step 3</h3>
                    <section>
                        <div class="form-group">
                        <div class="col-lg-12">
                            <ul class="list-unstyled w-list">
                            <li>First Name : Jonathan</li>
                            <li>Last Name : Smith</li>
                            <li>Emial: jonathan@example.com</li>
                            <li>Address: 123 Your City, Cityname.</li>
                            </ul>
                        </div>
                        </div>
                    </section>
                    <h3>Step Final</h3>
                    <section>
                        <div class="form-group">
                        <div class="col-lg-12">
                            <div class="icheck-material-white">
                            <input
                                id="acceptTerms-2"
                                name="acceptTerms2"
                                type="checkbox"
                                class="required"
                            />
                            <label for="acceptTerms-2"
                                >I agree with the Terms and Conditions.</label
                            >
                            </div>
                        </div>
                        </div>
                    </section>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i> Data Table Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Gambar</th>
                                        <th>Qr Code</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Gambar</th>
                                        <th>Qr Code</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection