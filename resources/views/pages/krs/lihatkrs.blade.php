<form method="POST" action="{{ route('krs.create') }}">
  @csrf
  <table>
      <thead>
          <tr>
              <th>Pilih</th>
              <th>Mata Kuliah</th>
              <th>Dosen</th>
              <th>Hari</th>
              <th>Jam</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($jdw as $hari => $jadwal)
              <tr>
                  <td></td>
                  <td colspan="4"><strong>{{ $hari }}</strong></td>
              </tr>
              @foreach ($jadwal as $data)
                  <tr>
                      <td><input type="checkbox" name="jadwal_id[]" value="{{ $data->id }}"></td>
                      <td>{{ $data->matkul->nama }}</td>
                      <td>{{ $data->dosen->nama }}</td>
                      <td>{{ $data->hari }}</td>
                      <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                  </tr>
              @endforeach
          @endforeach
      </tbody>
  </table>
  <button type="submit">Simpan</button>
</form>