<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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

<h1 align="center">KRS Mahasiswa</h1>

<table id="customers">
  <tr>
    <th>Mahasiswa ID</th>
    <th>Nama Mahasiswa</th>
    <th>Nama Matkul</th>
    <th>Semester</th>
  </tr>
  @foreach ($krs as $v)
  <tr>
    <td>{{$v->mahasiswa_id}}</td>
    <td>{{($v->nama)}}</td>
    <td>
      @foreach($v->daftar_jadwal as $d)
      <li>{{$d->matkul["matkul"]}}</li>
      @endforeach
    </td>
    <td>{{$v->semester}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


