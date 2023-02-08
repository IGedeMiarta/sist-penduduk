 <table id="zero-conf" class="display" style="width:100%">
     <thead>
         <tr>
             <th>No</th>
             <th>Nama</th>
             <th>Jenis Kel</th>
             <th>Tempat, Tanggal Lahir</th>
             <th>Agama</th>
             <th>Warganegara</th>
             {{-- <th>Opsi</th> --}}
         </tr>
     </thead>
     <tbody>
         @foreach ($table as $tab => $t)
             <tr>
                 <td>{{ $tab + 1 }}</td>
                 <td>{{ $t->nama }}</td>
                 <td>{{ $t->penduduk->jenkel() }}</td>
                 <td>{{ $t->penduduk->ttl() }}</td>
                 <td>{{ $t->penduduk->Agama->nama }}</td>
                 <td>{!! $t->penduduk->kewarganegaraan !!}</td>
             </tr>
         @endforeach
     </tbody>
 </table>
