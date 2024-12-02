<style>
    .radiogroup {
        padding: 48px 64px;
        border-radius: 16px;
        background: #0b0b0a;
        box-shadow:
            4px 4px 4px 0px #d1d9e6 inset,
            -4px -4px 4px 0px #ffffff inset;
    }


    .state {
        position: absolute;
        top: 0;
        right: 0;
        opacity: 1e-5;
        /* pointer-events: none; */
    }

    .label {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        color: #000000;
    }

    .text {
        margin-left: 16px;
        opacity: .6;
        transition: opacity .2s linear, transform .2s ease-out;
    }

    .indicator {
        position: relative;
        border-radius: 50%;
        height: 20px;
        width: 20px;

        overflow: hidden;
    }

    .indicator::before,
    .indicator::after {
        content: '';
        position: absolute;
        top: 10%;
        left: 10%;
        height: 80%;
        width: 80%;
        border-radius: 50%;
    }

    .indicator::before {
        box-shadow:
            -4px -2px 4px 0px #171818,
            4px 2px 8px 0px #685f5f;
    }

    .indicator::after {
        background-color: #ece5e5;
        box-shadow:
            -4px -2px 4px 0px #a13333,
            4px 2px 8px 0px #1953b0;
        transform: scale3d(1, 1, 1);
        transition: opacity .25s ease-in-out, transform .25s ease-in-out;
    }

    .state:checked~.label .indicator::after {
        /* transform: scale3d(#ef1111) translate3d(#ef1111, 80%, 0); */
        background-color: #04d9ffee;
        /* opacity: 0; */
    }

    /* .state:focus~.label .text {
        transform: translate3d(8px, 0, 0);
        opacity: 1;
    } */

    /* .label:hover .text {
        opacity: 1;
    } */
</style>
<div class="bg-white tm-block">
    <div class="row">
        <div class="col-12">
            <h2 class="tm-block-title">Form Peminjaman Barang</h2>
        </div>
    </div>
    <hr>
    <form action="{{ route('simpan_peminjaman_barang_user') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="">Kategori Peminjaman</label>
                <select class="form-control" name="kategori_req" id=""
                    required>
                    <option value="">Pilihan</option>
                    <option value="MCU">MCU</option>
                    <option value="Event">Event</option>
                    <option value="Oprasional Pelayanan">Oprasional Pelayanan</option>

                </select>
            </div>
            <div class="col-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" name="deskripsi_req" id="" cols="30" rows="10" required></textarea>
                <input type="text" name="nip" id="" value="{{ $user }}" hidden>
                <input type="text" name="cabang" id="" value="{{ $cabang }}" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 col-sm-4">
                {{-- <button type="submit" class="btn btn-primary">Update
            </button> --}}
            </div>
            <div class="col-12 col-sm-8 tm-btn-right">
                <button type="submit" class="btn btn-success">Simpan
                </button>
            </div>
        </div>
    </form>
</div>
