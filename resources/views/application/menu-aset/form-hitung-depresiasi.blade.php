<table id="data-aset" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700">
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Persentase Penyusutan</th>
            <th class="text-end">Pengurangan</th>
            <th class="text-end">Penyusutan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @for ($i = 0; $i < $hitung; $i++)
            <tr>
                <td>{{ $no++ }}</td>

                <td>{{ $data[$i] }}</td>
                <td class="text-center">{{ substr($persen, 0, 4) }} %</td>
                <td class="text-end">@currency($pengurangan)</td>
                <td class="text-end">@currency($hargaperolehan[$i])</td>

            </tr>
        @endfor
    </tbody>
</table>
<div class="row pt-4">
    <div class="col-12">
        <button class="btn btn-falcon-danger float-end" id="button-fix-data-aset" data-code="{{ $code }}"
            data-id="{{ $id }}"><span class="fas fa-save"></span> Simpan</button>
    </div>
</div>
<script>
    new DataTable('#data-aset', {
        responsive: true
    });
</script>
