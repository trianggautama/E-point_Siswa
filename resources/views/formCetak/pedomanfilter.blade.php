<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:100px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 18%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 72%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 4px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:65%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .isi{
         padding:10px;
     }
    </style>
</head>
<body>
    <div class="header">
            <div class="logo">
                    <img  class="pemko" src="images/logo.png">
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">KEMENTRIAN AGAMA </h3>
                <h3 style="margin:0px; text-transform:uppercase;">MADRASAH IBTIDAIYAH NEGERI 3 TANAH LAUT KABUPATEN TANAH LAUT</h3>
                <p style="margin:0px;">Jl. Padang Raya No. 25 Pabahanan Kec. Pelaihari Kab. Tanah Laut Telp. (0512) 23153</p>
                <p style="margin:0px;">Email : minpabahanan@yahoo.co.id</p>
            </div>
            <br>
    </div>
    <hr style="margin-top:1px;">
    <div class="container">
        <div class="isi">
            <h2 style="text-align:center;">DATA PEDOMAN  @if($data->first()->status == 1) PELANGGARAN @else PRESTASI @endif POIN </h2>
            <table id="dataTable" class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pedoman</th>
                                    <th>uraian</th>
                                    <th>Bobot Poin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_pedoman}}</td>
                                    <td>{{$d->uraian}}</td>
                                    <td> @if($d->status == 1)
                                            <p class="text-danger"> -{{$d->bobot_point}} Poin</p>
                                        @else
                                            <p class="text-primary"> +{{$d->bobot_point}} Poin</p>
                                        @endif</td>
                                    <td>
                                        @if($d->status == 1)
                                            <p class="text-danger"> Pelanggaran</p>
                                        @else
                                            <p class="text-primary"> Prestasi</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      <br>
                      <br>
                      <div class="ttd">
                        <p style="margin:0px"> Pabahanan,{{$tgl}}</p>
                       <h6 style="margin:0px">Mengetahui</h6>
                      <h5 style="margin:0px">Kepala Madrasah Ibtidayah Negeri 3 Tanah Laut </h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline; margin:0px">Jamiatul Jannah, S.Pd.I</h5>
                      <h5 style="margin:0px">NIP. 19630311 199002 2 001</h5>
                      </div>
                    </div>
             </div>
         </body>
</html>