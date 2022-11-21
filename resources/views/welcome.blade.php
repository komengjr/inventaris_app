<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="{{ asset('assets/css/bootstrap5.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




<style>
    .card-footer, .progress {
        display: none;
    }
</style>

<body>

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8" id="inputdata">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Upload Video</h5>
                </div>

            {{-- <form action="{{ url('simpandata', []) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label  class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Jdudul Video">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Kategori</label>
                        <select name="kategori" id="" class="form-control">
                            <option value="K_001">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="progress mt-3" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>
                </div>

                <div class="card-footer p-4" >
                    {{-- <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video> --}}
                    <img src="" id="videoPreview" alt="" style="width: 100%; height: auto">
                </div>
                <div class="card-footer p-4" >
                    <input id="link" type="text" name="link" class="form-control" value=""> <br>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form> --}}
            <div id="upload-container" class="text-center">
                {{-- <button id="browseFile" class="btn btn-primary">Pilih Video</button> --}}
                <input type="file" name="" id="browseFile">
            </div>
            <hr>
            @if(session()->has('alert-success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="alert-icon contrast-alert">
                    <i class="fa fa-check"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong>Success!</strong>  {{ session()->get('alert-success') }}</span>
                    </div>
                </div>
            @endif
            </div>

        </div>
        <div class="col-md-12 pt-4">
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Title</th>
                            <th>deskripsi</th>
                            <th width="150">option</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($video as $video)

                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$video->name}}</td>
                            <td>{{$video->deskripsi}}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-url="{{ route('showdata',['id' => $video->id])}}" id="showdata"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-warning btn-sm" type="button" data-url="{{ route('editvideo',['id' => $video->id])}}" id="editvideo"><i class="fa fa-pencil"></i></button>
                                <a href="{{ url('hapusdata', ['id'=>$video->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>

                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
{{-- <script src="{{ asset('assets/js/jQuery.min.js') }}" ></script> --}}

<!-- Bootstrap JS Bundle with Popper -->
{{-- <script src="{{ asset('assets/js/bootstrap5-bundle.min.js') }}" ></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.1.1/script.min.js" integrity="sha512-oM6Bv767uUJZcy+SqCTP2rkHtKlivWNQ5+PPhhDwkY8FtNj4bq1xvNCB9NB3WkBa1KiY7P5a7/yfSONl5TYSPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Resumable JS -->
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: '{{ route('files.upload.large') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['jpg','png'],
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile').hide();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');

    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-info');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', ` ${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>


<script>
    $(document).ready(function(){
        $(document).on('click', '#editvideo', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            $('#inputdata').html("<br><br><br><img src='../cdn0/pu.gif'  style='display: block; margin: auto;'>");
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data){
                $('#inputdata') .html(data);
            })
            .fail(function(){
                $('#inputdata').html('<i class="fa fa-info-sign"></i> Something went wrong, Please try again...');
            });
        });
    });

    $(document).ready(function(){
        $(document).on('click', '#showdata', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            $('#inputdata').html("<br><br><br><img src='../cdn0/pu.gif'  style='display: block; margin: auto;'>");
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data){
                $('#inputdata') .html(data);
            })
            .fail(function(){
                $('#inputdata').html('<i class="fa fa-info-sign"></i> Something went wrong, Please try again...');
            });
        });
    });
</script>
</body>
</html>
