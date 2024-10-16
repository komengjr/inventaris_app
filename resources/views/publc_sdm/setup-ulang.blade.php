<div class="row tm-mt-big" >
    <div class="col-12 mx-auto tm-login-col">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12 text-center">
                    <i class="fas fa-3x fa-tachometer-alt tm-site-icon text-center"></i>
                    <h2 class="tm-block-title mt-3">Halaman Masuk LOG</h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <form action="index.html" method="post" class="tm-login-form">
                        <div class="input-group">
                            <label for="username"
                                class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Cabang</label>
                            <select name="cabang" class="form-control" id="cabang">
                                <option value="PA">Pontianak</option>
                            </select>
                        </div>
                        <div class="input-group mt-3">
                            <label for="password"
                                class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">NIP</label>
                            <input name="nip" type="text" class="form-control validate" id="nip"
                                 required>
                        </div>
                        <div class="input-group mt-3">
                            <button type="button" id="button-masuk-log-sdm" class="btn btn-primary d-inline-block mx-auto">Masuk</button>
                        </div>
                        <div class="input-group mt-3">
                            <p><em>Gunakan Nip Untuk Masuk Halaman</em></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            icon: 'fa fa-info-circle',
            continueDelayOnInactiveTab: false,
            position: 'center top',
            showClass: 'bounceIn',
            hideClass: 'bounceOut',
            sound: false,
            width: 400,
            msg: 'NIP Yang anda Masukan tidak ditemukan'
        });
    });
</script>
