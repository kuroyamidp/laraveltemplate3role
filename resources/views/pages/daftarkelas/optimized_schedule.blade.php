@extends('layouts.main')

@section('content')

<div class="modal fade" id="confirmChangesModal" tabindex="-1" role="dialog" aria-labelledby="confirmChangesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Gunakan modal-lg untuk membuat modal lebih besar -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmChangesModalLabel">Jadwal Berhasil Di Optimalkan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="text-align: center;">Berikut Adalah Perubahan Jadwal Yang Telah Di Lakukan:</p>
                <div class="table-responsive"> <!-- Gunakan table-responsive untuk memastikan tabel dapat digulir jika terlalu besar -->
                    <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Kode Kelas</th>
                            <!-- <th>Mata Kuliah</th>
                            <th>Program Studi</th> -->
                            <th>Ruang</th>
                            <th>Dosen</th>
                            <th>Waktu</th>
                            <th>Hari</th>
                            <!-- <th>Kelas</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($changes as $change)
                        <tr class="text-center">
                            <td>{{ $change['kode_kelas'] }}</td>
                            <!-- <td>{{ $change['makul_id'] }}</td>
                            <td>{{ $change['progdi_id'] }}</td> -->
                            <td>{{ $change['ruang'] }}</td>
                            <td>{{ $change['dosen_name'] }}</td> <!-- Tampilkan nama dosen -->
                            <td>{{ $change['waktu'] }}</td>
                            <td>{{ $change['hari'] }}</td>
                            <!-- <td>{{ $change['semester'] }}</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <a href="{{route('daftar-kelas.index')}}" class="btn btn-secondary" >Kembali</a>
                <form action="{{ route('save-changes') }}" method="POST">
                    @csrf
                    <input type="hidden" name="changes" value="{{ json_encode($changes) }}">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#confirmChangesModal').modal('show');
    });
</script>

@endsection