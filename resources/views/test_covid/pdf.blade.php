<!DOCTYPE html>
<html>
<head>
    <title>Murnicare</title>
</head>
<body>
    <table>
        <tr>
            <td><img src="{{ public_path('logo.png') }}" style="width: 200px; height: 70px"></td>
        </tr>
    </table>
    <br>
    <table style="width:100%">
        <tr>
            <td style="width:25%">NOMOR REGISTER</td><td style="width:5%">:</td><td style="width:20%">{{$id}}</td><td style="width:30%">JENIS KELAMIN</td><td style="width:5%">:</td><td style="width:15%">{{$gender}}</td>
        </tr>
        <tr>
            <td>NAMA</td><td>:</td><td>{{$name}}</td><td>TANGGAL SAMPLING</td><td>:</td><td>{{$sampling_date}}</td>
        </tr>
        <tr>
            <td>TANGGAL LAHIR</td><td>:</td><td>{{$date_of_birth}}</td><td>WAKTU PEMERIKSAAN</td><td>:</td><td>{{$time_of_test}}</td>
        </tr>
        <tr>
            <td>NIK/PASSPORT</td><td>:</td><td>{{$nik}}</td><td>LOKASI PEMERIKSAAN</td><td>:</td><td>{{$checkpoint}}</td>
        </tr>
        <tr>
            <td>ADDRESS</td><td>:</td><td>{{$address}}</td><td></td><td></td><td></td>
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
            <td style="width:30%" align="center">{{ $test_name }}</td><td style="width:20%" align="center">{{ $result }}</td><td style="width:20%" align="center">{{ $normal_range }}</td><td style="width:30%" align="center">{{ $method }}</td>
        </tr>
    </table>
    <br>
<label>Catatan (<i>Note</i>):</label><br>
<table style="width:100%">
    <tr>
        <td style="width:5%"></td><td style="width:5%">-</td><td style="width:90%">Hasil ini hanya menggambarkan kondisi saat pengambilan spesimen.
            This result only describes the conditions at the time of specimen collection.</td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%">-</td><td style="width:90%">Hasil tes negatif tidak menghilangkan kemungkinan infeksi SARS-COV-2 dan harus dikonfirmasi dengan Test PCR.
        <br>
        Negative results do not eliminate the possibility of SARS-COV-2 infection and should be confirmed by PCR Test.
        </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%">-</td><td style="width:90%">Hasil tes positif tidak menutup kemungkinan koinfeksi  dengan pathogen lain.<br>
            Positive test results do not rule out co-infections with other pathogens.
            </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%">-</td><td style="width:90%">Jika timbul gejala klinis, silahkan menghubungi  Dokter/ Fasilitas Kesehatan terdekat.<br>
            If clinical symptoms arise, please seek help to the nearest doctor/health facility.
            </td>
    </tr>
    <tr>
        <td style="width:5%"></td><td style="width:5%">-</td><td style="width:90%">Tetap jalankan dan patuhi protokol kesehatan untuk mencegah penularan Covid-19 dan lakukan pemeriksaan ulang sesuai rekomendasi dokter.<br>
            Please maintain health protocols to prevent Covid-19 transmission and take re-test based on doctor’s recommendation.
            </td>
    </tr>
</table>
<br>
<?php $qrcode = url('view_pdf/'.$id)  ?>
<table style="width:100%">
    <tr>
        <td style="width:20%" align="center">Scan QR For Verification</td><td style="width:40%" align="center"></td><td style="width:40%">Hormat Kami, <br>Sincerely,</td>
    </tr>
    <tr>
        <td style="width:20%" align="center"><img src="data:image/png;base64, {{ base64_encode(QrCode::size(100)->generate($qrcode)) }} "></td><td style="width:40%" align="center"></td><td style="width:40%">dr. Oktovia Berlian Kemalaningsih<br>General Practitioner</td>
    </tr>
</table>
<br>
<table style="width:100%" border="1" cellspacing="0">
    <tr>
        <td style="width:100%"><b>PT Murni Medika Solusindo</b><br>Jl. Lkr. Luar Barat No.1, RT.8/RW.6, Duri Kosambi, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11750
            Phone: (021) 584-1060
            info@murnicare.com<br><br>
            <b>MurniCare Clinic</b><br>
Rukan Taman Meruya Blok M No 89 - 92, Jakarta Barat 11620
        </td>
    </tr>
</table>
</body>
</html>

