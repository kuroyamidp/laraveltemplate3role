<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0444aa;
            color: white;
        }
        .header {
  display: flex;
  justify-content: space-between;
}

h5 {
  text-align: left;
  margin-top: -50px;
  margin-left: 100px;
}

img {
  margin-top: -50px;
}


     
    </style>
</head>

<body>
<div class="header">
  <img src="image/LOGO ROBOT.jpg" width="100px">
</div>
<h5>Universitas PGRI Semarang<br><small>Informatika | Rekayasa Perangkat Lunak</small></h5>


    <h1 style="text-align: center;">Matakuliah Semester Ini</h1>

    <table id="customers">
        <tr style="text-align: center;">
            <th>No</th>
            <th style="text-align: center;">Mata Kuliah</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Waktu</th>
        </tr>
        @php
        $i = 1; // Inisialisasi variabel $i dengan nilai 1
        @endphp
        @foreach($data as $key => $value)
        @if($value->semester == Auth::user()->mahasiswa['semester_berjalan'])

        <tr style="text-align: center;">
            <td width="1%">{{ $i }}</td>
            <td>{{ $value->matkul['matkul'] }}</td>
            <td> SEMESTER {{ $value->semester }}</td>
            <td>{{ucfirst($value->hari) }}|{{ $value->jam }}</td>
        </tr>
        @php
        $i++; // Tambah nilai variabel $i setiap kali data semester 5 ditampilkan
        @endphp
        @endif
        @endforeach
    </table>

</body>

</html>