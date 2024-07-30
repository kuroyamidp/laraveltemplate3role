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

        .compact {
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 2px;
        }

        .row .label {
            min-width: 150px;
            font-weight: bold;
        }

        .row .value::before {
            content: ": ";
            margin-right: 5px;
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
    </div>
    <h2 style="text-align: center;">LAPORAN PEMBELAJARAN</h2>
    @foreach($dos as $val)
    <div class="compact">
        <div class="row">
            <div class="label">No</div>
            <div class="value">{{ $loop->iteration }}</div>
        </div>
        <div class="row">
            <div class="label">Nama Guru</div>
            <div class="value">{{ $val->dosen }}</div>
        </div>
        <div class="row">
            <div class="label">Nama Mata Pelajaran</div>
            <div class="value">{{ $val->matkul }}</div>
        </div>
        <div class="row">
            <div class="label">Jam</div>
            <div class="value">{{ $val->start }}</div>
        </div>
        <div class="row">
            <div class="label">Jurusan</div>
            <div class="value">{{ $val->progdi }}</div>
        </div>
        <div class="row">
            <div class="label">Kelas</div>
            <div class="value">{{ $val->kelas }}</div>
        </div>
        <div class="row">
            <div class="label">Hari</div>
            <div class="value">{{ $currentDay }}</div>
        </div>
        <div class="row">
            <div class="label">Ruang</div>
            <div class="value">{{ $val->ruang }}</div>
        </div>
    </div>
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
    @endforeach
</body>

</html>
