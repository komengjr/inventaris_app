
<table class="styled-table m-0" id="data-table98" style="width: 100%;">
    <thead>
        <tr>
            <td>No</td>
            <td>Date</td>
            <td>Eror</td>
        </tr>
    </thead>
    <tbody>
        @php

        @endphp
        @for ($i = 0; $i < count($data); $i++)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$data[$i]['date']}}</td>
                <td>{{$data[$i]['text']}}</td>
            </tr>
        @endfor
    </tbody>
</table>
<script>
     $('#data-table98').DataTable();
</script>
