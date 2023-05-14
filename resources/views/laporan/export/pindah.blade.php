    <table id="zero-conf" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Pindah</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Ketereangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $t)
                <tr>
                    <td>{{ $t->penduduk->nik }}</td>
                    <td>{{ $t->penduduk->nama }}</td>
                    <td>{{ date('d-m-Y', strtotime($t->tgl_pindah)) }}</td>
                    <td>{{ $t->penduduk->nama_ayah }}</td>
                    <td>{{ $t->penduduk->nama_ibu }}</td>
                    <td>{{ $t->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
