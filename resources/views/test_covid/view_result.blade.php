<!DOCTYPE html>
<html>
<head>
    <title>Online SK - MurniCare</title>
</head>
<body>
    <table style="width:100%">
        <tr>
            <td style="width:30%"><img src="{{ asset('theme1/images/logo.png') }}" style="width: 200px; height: 70px"></td>
            <td style="width:40%"></td><td style="width:30%"><font color="#0390fc">Where Quality of Life Counts!</font></td>
        </tr>
    </table>
    <table style="width:100%">
        <tr>
            <td style="width:100%" align="center"><b>HASIL PEMERIKSAAN {{ $dataMethod['method'] }}</b></td>
        </tr>
        <tr>
            <td style="width:100%" align="center">{{ $dataMethod['method'] }}<i>Test Result</i></td>
        </tr>
    </table>
    <br>
    <table style="width:100%">
        <tr>
            <td style="width:25%">NOMOR REGISTER</td><td style="width:5%">:</td><td style="width:20%">{{$data['id']}}</td><td style="width:30%">JENIS KELAMIN</td><td style="width:5%">:</td><td style="width:15%">{{$data['gender']}}</td>
        </tr>
        <tr>
            <td>NAMA</td><td>:</td><td>{{$data['name']}}</td><td>TANGGAL SAMPLING</td><td>:</td><td>{{ \Carbon\Carbon::parse($data['sampling_date'])->format('d-m-Y')}}</td>
        </tr>
        <tr>
            <td>TANGGAL LAHIR</td><td>:</td><td>{{ \Carbon\Carbon::parse($data['date_of_birth'])->format('d-m-Y')}}</td><td>WAKTU PEMERIKSAAN</td><td>:</td><td>{{$data['time_of_test']}}</td>
        </tr>
        <tr>
            <td>NIK/PASSPORT</td><td>:</td><td>{{$data['nik']}}</td><td>LOKASI PEMERIKSAAN</td><td>:</td><td>{{$data['checkpoint']}}</td>
        </tr>
        <tr>
            <td>ADDRESS</td><td>:</td><td>{{$data['address']}}</td><td></td><td></td><td></td>
        </tr>
    </table>
    <table style="width:100%">
        <tr>
            <td style="width:100%" align="center">**HASIL AKHIR**</td>
        </tr>
        <tr>
            <td style="width:100%" align="center"><i>(Final Result)</i></td>
        </tr>
    </table>
    <table style="width:100%" border="1" cellspacing="0">
        <tr>
            <td style="width:30%" align="center">JENIS PEMERIKSAAN</td><td style="width:20%" align="center">HASIL</td><td style="width:20%" align="center">NILAI RUJUKAN</td><td style="width:30%" align="center">METODE</td>
        </tr>
        <tr>
            <td style="width:30%" align="center">{{ $dataMethod['test_name'] }}</td><td style="width:20%" align="center">{{ $dataMethod['result'] }}</td><td style="width:20%" align="center">{{ $dataMethod['normal_range'] }}</td><td style="width:30%" align="center">{{ $dataMethod['method'] }}</td>
        </tr>
    </table>
    <br>

</body>
</html>

