<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Print Barcode</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
</head>
<style>
  @page { 
    margin-left : 25px;
    margin-top: 5px;
   }
body { margin: 0px; }
  p{
  padding: 0px;
	background: rgb(255, 255, 255);
  text-align: center;
	/* height: 80px; */
  font-size: 7px;
  text-size-adjust: auto;
  font-family: "Copperplate", "Courier New", Monospace;
	width: 85px;
	margin-top: 0px;
  margin-bottom: 10px;
}

</style>
<body >
    @foreach ($data as $data)
     
    @if ($data->kd_lokasi == "-")
        
    @else
      <div class="row" style="border: dotted;width: 85px; height: 95px;">
                
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(85)->errorCorrection('H')->generate(url('view', []).'/'.substr($data->kd_inventaris,0,2).'/'.$data->kd_cabang.'/'.$data->kd_inventaris.'/'.$data->id)) !!}">
        <strong><p>{{$data->nama_barang}}</p></strong> 
      </div>
    @endif
       
    @endforeach     
       
    
</body>
</html>