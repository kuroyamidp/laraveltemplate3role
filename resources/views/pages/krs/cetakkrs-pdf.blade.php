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
  width: 100px;
  margin-top: 10px;
}


     
    </style>
</head>

<body>
<div class="header">
  <img src="image/LOGO ROBOT.jpg">
</div>
<h5>STMIK-AKI-PATI<br><small>{{Auth::user()->mahasiswa['progdi']}} |  
  Jl. Kamandowo No. 13, Pati Kidul, Kec. Pati, Kab. Pati, Jawa Tengah </small></h5>
<h1 align="center">KRS Mahasiswa</h1>

<table id="customers">
  <tr>
  <th>Nisn Mahasiswa</th>
    <th>Nama Mahasiswa</th>
    <th>Nama Matkul</th>
    <th>Semester</th>
  </tr>
  @foreach ($krs as $v)
  <tr>
    <td>{{$v->nim}}</td>
    <td>{{($v->nama)}}</td>
    <td style="text-align: justify;">
      @foreach($v->daftar_jadwal as $d)
      <li>{{$d->matkul["matkul"]}}|{{$d->jam}}</li>
      @endforeach
    </td>
    
    <td>{{$v->semester}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>

