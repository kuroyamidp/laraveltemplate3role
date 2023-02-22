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
    </style>
</head>

<body>

    <h1 align="center">Matakuliah Semester Ini</h1>

    <table id="customers">
        <tr style="text-align: center;">
            <th>No</th>
            <th style="text-align: center;">Mata Kuliah</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Jam</th>
            <th style="text-align: center;">Hari</th>
        </tr>
        @php
        $i = 1; // Inisialisasi variabel $i dengan nilai 1
        @endphp
        @foreach($data as $key => $value)
        @if($value->semester == 5)

        <tr style="text-align: center;">
            <td width="1%">{{ $i }}</td>
            <td>{{ $value->matkul['matkul'] }}</td>
            <td> SEMESTER {{ $value->semester }}</td>
            <td>{{ $value->jam }}</td>
            <td class="text-center">HARI {{ $value->hari }}</td>
        </tr>
        @php
        $i++; // Tambah nilai variabel $i setiap kali data semester 5 ditampilkan
        @endphp
        @endif
        @endforeach
    </table>

</body>

</html>