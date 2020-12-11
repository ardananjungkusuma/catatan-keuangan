<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Catatan Keuangan">
    <meta name="author" content="Ardan Anjung Kusuma">

    <title>Cetak Catatan Keuangan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body onload="window.print();window.onafterprint=function(){ window.close();}">
    <br><br>
    <center>
        <h5>Laporan @yield('title_content')</h5>
    </center><br><br>
    <h6>
        Nama Pengguna : {{ auth()->user()->name }} <br>
        Tanggal Dicetak : {{ date('d-m-y') }}
    </h6>
    @yield('content')

</body>

</html>