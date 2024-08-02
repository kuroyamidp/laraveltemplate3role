<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pelajaran</title>
    <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-bottom: 20px;
        }

        .header img {
            position: absolute;
            left: 0;
            height: 100px;
            /* Sesuaikan tinggi logo sesuai kebutuhan */
        }

        .header h4 {
            text-align: center;
            margin: 0;
            padding: 0 50px;
            /* Sesuaikan padding untuk memastikan teks berada di tengah */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="header">
        <h4>
            PEMERINTAH PROVINSI JAWA TENGAH<br>
            DINAS PENDIDIKAN DAN KEBUDAYAAN<br>
            SEKOLAH MENENGAH KEJURUAN NEGERI 5 KENDAL
        </h4>
        <h5 style="text-align: center;">Gg. Bogosari, Bogosari, Tambahrejo, Kec. Pagerruyung, Kabupaten Kendal, Jawa Tengah 51361</h5>
        <hr>
    </div>
    <h2 style="text-align: center;">Laporan Pembelajaran</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Ruang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dos as $val)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $val->matkul }}</td>
                <td>{{ $currentDay }}</td>
                <td>{{ $val->start }}</td>
                <td>{{ $val->progdi }}</td>
                <td>{{ $val->kelas }}</td>
                <td>{{ $val->dosen }}</td>
                <td>{{ $val->ruang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Keterangan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keterangan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td style="text-align: center;">
                    @if($item->image)
                    <img src="{{ storage_path('app/public/' . $item->image) }}" style="max-width: 100px; max-height: 100px;">
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Absensi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Status</th>
                <th>Hari</th>
                <!-- <th>Longitude</th>
                <th>Latitude</th> -->
                <!-- <th>Gambar</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $absen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $absen->mahasiswa }}</td>
                <td>
                    @if($absen->status_absensi == 0)
                    <span class="badge badge-danger">Alpha</span>
                    @elseif($absen->status_absensi == 1)
                    <span class="badge badge-primary">Masuk</span>
                    @elseif($absen->status_absensi == 2)
                    <span class="badge badge-primary">Ijin</span>
                    @else
                    <span class="badge badge-danger">Sakit</span>
                    @endif
                </td>
                <td>{{ $absen->hari }}</td>
                <!-- <td>{{ $absen->longitude }}</td>
                <td>{{ $absen->latitude }}</td> -->
                <!-- <td style="text-align: center;">
                    @if($absen->image)
                    <img src="{{ url('Image/'.$absen->image) }}" alt="Image-{{ $absen->mahasiswa_id }}" style="width: 50px; height: 50px;">
                    @else
                    -
                    @endif
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>