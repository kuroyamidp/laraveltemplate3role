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
<h5>STMIK-AKI-PATI<br><small>Informatika | Rekayasa Perangkat Lunak</small></h5>
<h1 align="center">Daftar Wisuda Mahasiswa</h1>

<table id="customers">
    <th>Nama</th>
    <th>NPM</th>
    <th>Tanggal Ajukan Wisuda</th>
    <th>Jam</th>
</tr>
  @foreach ($data as $v)
  <tr>
    <td>{{$v->mahasiswa}}</td>
    <td>{{$v->npm}}</td>
    <td>{{$v->tanggal_sidang}}</td>
    <td>{{$v->jam}}</td>  
  </tr>
  @endforeach
</table>

</body>
</html>


