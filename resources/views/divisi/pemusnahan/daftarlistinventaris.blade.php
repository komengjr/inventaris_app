<style>
    #button-pilih-barang-maintenance:hover {
            /* display: flex; */
            color: rgb(55, 73, 74);
            padding: 2px;
            background-color: #c7c7c7;
            /* border-radius: 10%; */
            border: 1px solid #ff0202;
        }
</style>
    <div class="card mt-3">
        <div class="card-header">
            Daftar Pencarian Barang

        </div>

        <ul class="list-group list-group-flush" >
            @foreach ($data as $item)
                <li class="list-group-item" style="cursor: pointer;" style="border: 1px solid;" id="button-pilih-barang-pemusnahan" data-id="{{$item->id_inventaris}}">
                    <div class="media align-items-center">
                        <img src="https://via.placeholder.com/110x110" alt="user avatar"
                            class="customer-img rounded-circle">
                        <div class="media-body ml-3">
                            <h6 class="mb-0">
                                {{$item->nama_barang}} <small class="ml-4">08.34 AM</small>
                            </h6>
                            <p class="mb-0 small-font">
                                No Inventaris : {{$item->no_inventaris}} <br> Merek : {{$item->merk}} <br> Type : {{$item->type}}
                            </p>
                        </div>
                        <div class="star">
                           @currency($item->harga_perolehan)
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

