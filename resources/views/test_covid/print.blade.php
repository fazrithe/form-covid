<!DOCTYPE html>
<html>
<head>
    <title>Online SK - MurniCare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <style>
        body{
            font-size: 22px;
        }
    </style>
</head>
<body>
    <table style="width:100%">
        <tr>
            <td style="width:30%"><img src="{{ asset('logo.png') }}" style="width: 200px; height: 70px"></td>
            <td style="width:40%"></td><td style="width:30%"><font color="#0390fc">Where Quality of Life Counts!</font></td>
        </tr>
    </table>
    <table style="width:100%">
        <tr>
            <td style="width:100%" align="center"><b>HASIL PEMERIKSAAN {{ $dataMethod['method'] }}</b></td>
        </tr>
        <tr>
            <td style="width:100%" align="center">{{ $dataMethod['method'] }}<i> TEST RESULT</i></td>
        </tr>
    </table>
    <br>
    <table style="width:100%">
        <tr>
            <td style="width:25%">NOMOR REGISTER<br><em>Reg. Number</em></td><td style="width:5%">:</td><td style="width:20%">{{$data['id']}}</td><td style="width:30%">JENIS KELAMIN<br><em>Gender</em></td><td style="width:5%">:</td><td style="width:15%">{{$data['gender']}}</td>
        </tr>
        <tr>
            <td>NAMA<br><em>Name</em></td><td>:</td><td>{{$data['name']}}</td><td>TANGGAL SAMPLING<br><em>Sampling Date</em></td><td>:</td><td>{{ \Carbon\Carbon::parse($data['sampling_date'])->format('d-m-Y')}}</td>
        </tr>
        <tr>
            <td>TANGGAL LAHIR<br><em>Date of Birth</em></td><td>:</td><td>{{ \Carbon\Carbon::parse($data['date_of_birth'])->format('d-m-Y')}}</td><td>WAKTU PEMERIKSAAN<br><em>Time of Test</em></td><td>:</td><td>{{$data['time_of_test']}}</td>
        </tr>
        <tr>
            <td>NIK/PASSPORT<br><em>National ID/Passport</em></td><td>:</td><td>{{$data['nik']}}</td><td>LOKASI PEMERIKSAAN<br><em>Checkpoint</em></td><td>:</td><td>{{$data['checkpoint']}}</td>
        </tr>
        <tr>
            <td>ALAMAT<br><em>Address</em></td><td>:</td><td>{{$data['address']}}</td><td></td><td></td><td></td>
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
            <td style="width:30%" align="center">JENIS PEMERIKSAAN<br><em>Test Name</em></td><td style="width:20%" align="center">HASIL<br><em>Result</em></td><td style="width:20%" align="center">NILAI RUJUKAN<br><em>Normal Range</em></td><td style="width:30%" align="center">METODE<br><em>Method</em></td>
        </tr>
        <tr>
            <td style="width:30%" align="center">{{ $dataMethod['test_name'] }}</td><td style="width:20%" align="center">{{ $dataMethod['result'] }}</td><td style="width:20%" align="center">{{ $dataMethod['normal_range'] }}</td><td style="width:30%" align="center">{{ $dataMethod['method'] }}</td>
        </tr>
    </table>
    <br>
<label>Catatan (<i>Note</i>):</label><br>
<table style="width:100%">
    <tr>
        <td style="width:5%"></td><td style="width:5%" valign="top">-</td><td style="width:90%">Hasil ini hanya menggambarkan kondisi saat pengambilan spesimen.
            <br><em>This result only describes the conditions at the time of specimen collection.</em>
        </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%" valign="top">-</td><td style="width:90%">Hasil tes negatif tidak menghilangkan kemungkinan infeksi SARS-COV-2 dan harus dikonfirmasi dengan Test PCR.
        <br>
        <em>Negative results do not eliminate the possibility of SARS-COV-2 infection and should be confirmed by PCR Test.</em>
        </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%" valign="top">-</td><td style="width:90%">Hasil tes positif tidak menutup kemungkinan koinfeksi  dengan pathogen lain.<br>
            <em>Positive test results do not rule out co-infections with other pathogens.</em>
            </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%" valign="top">-</td><td style="width:90%">Jika timbul gejala klinis, silahkan menghubungi  Dokter/ Fasilitas Kesehatan terdekat.<br>
            <em>If clinical symptoms arise, please seek help to the nearest doctor/health facility.</em>
            </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%" valign="top">-</td><td style="width:90%">Tetap jalankan dan patuhi protokol kesehatan untuk mencegah penularan Covid-19 dan lakukan pemeriksaan ulang sesuai rekomendasi dokter.<br>
            <em>Please maintain health protocols to prevent Covid-19 transmission and take re-test based on doctor’s recommendation.</em>
            </td>
    </tr>
</table>
<br>
<?php $qrcode = url('view_result/'.$data['id'])  ?>
<table style="width:100%">
    <tr>
        <td style="width:20%" align="center">Scan QR For Verification</td><td style="width:40%" align="center"></td><td style="width:40%">Hormat Kami, <br>Sincerely,</td>
    </tr>
    <tr>
        <td style="width:20%" align="center">{!! QrCode::size(100)->generate($qrcode); !!}</td><td style="width:40%" align="center"></td><td style="width:40%"><img src="{{ asset('signature/'.$data->user->signature) }}" style="width: 200px; height: 70px"><br> @if(!empty($data->user->name)){{ $data->user->name }}@endif<br>General Practitioner</td>
    </tr>
</table>
<br>
<font size="2px">
<table style="width:100%">
    <tr>
        <td>
            <img src="{{ asset('theme1/images/footer_.png') }}" style="width: 1200px; height: 120px">
        </td>
    </tr>
</table>
</body>
</html>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    window.print();
});
</script>
