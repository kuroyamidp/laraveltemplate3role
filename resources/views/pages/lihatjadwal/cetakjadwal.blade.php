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

<h1 align="center">Seluruh Matakuliah</h1>

<table id="customers">
  <tr>
  <th>No</th>
    <th>Mata Kuliah</th>
    <th>Rincian Mata Kuliah</th>
  </tr>
  @foreach($data as $key => $value)
      
      <tr style="text-align: center;">
          <td width="1%">{{$key + 1}}</td>
          <td>{{$value->nama}} [ {{$value->kode_mk}} ]</td>
          <td>
              <li>SKS : {{$value->sks}}</li>
              <li>Mutu : {{$value->mutu}}</li>
              <li >Bobot :{{$value->bobot}} </li>
             
          </td>
      </tr>
     
@endforeach
</table>

</body>
</html>


