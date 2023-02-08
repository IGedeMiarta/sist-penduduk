  <table id="zero-conf" class="display" style="width:100%">
      <thead>
          <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              <th>Tanggal Datang</th>
              <th>Ketereangan</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($table as $tab => $t)
              <tr>
                  <td>
                      {{ $tab + 1 }}
                  </td>
                  <td>{{ $t->nik }}</td>
                  <td>{{ $t->nama }}</td>
                  <td>{{ date('d-m-Y', strtotime($t->tgl_datang)) }}</td>
                  <td>{{ $t->keterangan }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
