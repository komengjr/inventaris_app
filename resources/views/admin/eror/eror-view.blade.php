
<table class="styled-table m-0" id="data-table98" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 2%;">No</th>
            <th style="width: 10%;">Date</th>
            <th>Eror</th>
        </tr>
    </thead>
    <tbody>
        @php

        @endphp
        @for ($i = 0; $i < count($data); $i++)
            <tr>
                <td style="width: 2%;">{{$i+1}}</td>
                <td style="width: 10%;">{{$data[$i]['date']}}</td>
                <td>{{$data[$i]['text']}}</td>
            </tr>
        @endfor
    </tbody>
</table>
<script>
     $('#data-table98').DataTable();
</script>
