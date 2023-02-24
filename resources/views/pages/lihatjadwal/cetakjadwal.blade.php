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
  <h1 align="center">Seluruh Matakuliah</h1>

  <table id="customers">
    <tr style="text-align: center;">
      <th>Kode Mata Kuliah</th>
      <th>Mata kuliah</th>
      <th>Sks</th>
      <th>Mutu</th>
      <th>Bobot</th>

    </tr>
    </thead>
    <tbody>
      @foreach($data as $key => $value)

      <tr style="text-align: center;">

        <td>{{$value->kode_mk}}</td>
        <td>{{$value->nama}}</td>
        <td>{{$value->sks}}</td>
        <td>{{$value->mutu}}</td>
        <td>{{$value->bobot}}</td>
      </tr>

      @endforeach
  </table>

</body>

</html>