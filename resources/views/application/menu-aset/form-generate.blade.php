@if ($text == 1)
    <div class="row light">
        <div class="col-sm-12 col-lg-12 mb-12">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-title">Berhasil Generated Code Depresiasi</div>
                    <p class="card-text">{{ $code }}</p>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row light">
        <div class="col-sm-12 col-lg-12 mb-12">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <div class="card-title">Gagal Generated Code Depresiasi</div>
                    <p class="card-text">Error</p>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    setTimeout(() => {
        location.reload();
    }, 1000);
</script>
