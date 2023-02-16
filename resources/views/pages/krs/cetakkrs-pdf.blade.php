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
    <th>Jadwal ID</th>
    <th>Semester</th>
  </tr>
  @foreach ($data as $v)
  <tr>
    <td>{{$v->mahasiswa_id}}</td>
    <td>{{($v->jadwal_id)}}</td>
    <td>{{$v->semester}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


