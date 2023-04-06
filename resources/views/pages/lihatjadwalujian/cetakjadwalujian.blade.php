<!DOCTYPE html>
<html>

<head>
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
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
  <h1 align="center">Jadwal Ujian</h1>

  <table id="customers">
    <tr style="text-align: center;">
      <th>No</th>
      <th>Mata kuliah</th>
      <th>Ruang</th>
      <th>Dosen</th>
      <th>Jam</th>
      <th>Tanggal Ujian</th>

    </tr>
    </thead>
    <tbody>
      @php
        $no=1
      @endphp
      @foreach ($data as $v)
        <tr style="text-align: left;">
            <td width="1%">{{$no++}}</td>
            <td>{{$v->matkul}}</td>
            <td>{{$v->ruang}}</td>
            <td>{{$v->dosen}}</td>
            <td>{{$v->jam}}</td>
            <td>{{$v->tanggal}}</td>
        </tr>
      @endforeach
  </table>

</body>

</html>