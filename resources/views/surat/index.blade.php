<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Surat {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #666;
            text-shadow: 1px 1px 0px #fff;
            background: #ffffff;
            border: #ccc 1px solid;
            border-collapse: collapse;
        }

        table th {
            padding: 15px 35px;
            border-left: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            background: #c4c4c4;
        }

        table th:first-child {
            border-left: none;
        }

        table tr {
            text-align: center;
            padding-left: 20px;
        }

        table td:first-child {
            text-align: left;
            padding-left: 20px;
            border-left: 0;
        }

        table td {
            padding: 15px 35px;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }

        table tr:last-child td {
            border-bottom: 0;
        }

        table tr:last-child td:first-child {
            -moz-border-radius-bottomleft: 3px;
            -webkit-border-bottom-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        table tr:last-child td:last-child {
            -moz-border-radius-bottomright: 3px;
            -webkit-border-bottom-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        table tr:hover td {
            background: #f2f2f2;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
            background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }

        .table-borderless td,
        .table-berderless th {
            border: 0;
        }

        img {
            width: 75px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        img.kiri {
            float: left;
            margin: 5px;
        }

        img.kanan {
            float: right;
            margin: 5px;
        }

        p.kecil {
            line-height: 70%;
        }

        html {
            font-family: times new roman;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table table-borderless table-condensed table-hover" width="100%">
            <tr>
                <td width="13%" align="center"><img src="{{ asset('logo.jpg') }}"></td>
                <td width="74%" align="center">
                    <p class="kecil">
                        <font size="5" face="">PEMERINTAH KABUPATEN KAIMANA<br> <br>
                            DISTRIK
                            KAIMANA <br> <br><b>KELURAHAN KROOY</b></font>
                    </p>
                </td>
                <td width="13%" align="center"><img src=""></td>
            </tr>
        </table>
        <table class="table table-borderless table-condensed table-hover" width="100%">
            <h5 class="text-center text-decoration-underline">SURAT KETERANGAN</h5>
            <h5 class="text-center ">Nomor: ....../....../...... /</h5>
            <br>
            <br>
            <p>
                Yang bertanda tangan dibawah ini Kepala Lurah Krooy Kabupaten Kaimana menerangakan bahwa:
            </p>
            <div class="user-info">
                <p> 1. &ensp; Nama &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&nbsp; : {{ $nama ?? '' }}
                    <br>
                    &ensp; &ensp;&nbsp;Tepat Tempat/Tanggal Lahir &nbsp; : {{ $ttl ?? '' }}<br>
                    &ensp; &ensp;&nbsp;Agama&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&nbsp; :
                    {{ $agama ?? '' }} <br>
                    &ensp; &ensp;&nbsp;Pekerjaan&emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp;&nbsp; &nbsp;:
                    {{ $pekerjaan ?? '' }}
                    <br>
                    &ensp; &ensp;&nbsp;Jenis Kelamin &emsp; &emsp; &emsp; &emsp;&emsp;&emsp;&nbsp;:
                    {{ $jenkel ?? '' }} <br>
                    {{-- &ensp; &ensp;&nbsp;Alamat&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;&nbsp; :
                    {{ $alamat ?? '' }} <br> --}}

                </p>
                {{-- 1. Nama : Lorem ipsum dolor sit amet.
                Tempat/Tanggal Lahir : lorem, 10 19 2921
                Jeni Kelamin : Lorem.
                Agama : Lorem.
                Pekerjaan : Lorem, ipsum dolor.
                Status Perkawinan : Lorem, ipsum.
                Alamat : Lorem ipsum dolor sit amet. --}}
            </div>
            <p>
                Adalah benar-benar warga RT ................... Kelurahan Krooy dengan ini memberikan keterangan bahwa
                yang bersangkutan hendak mengurus
            </p>
            <ol class="mt-n1">
                <li>Kartu Keluarga</li>
                <li>Kartu Tanda Penduduk (KTP)</li>
                <li>Surat Keterangan Kelurahan</li>
                <li>Surat Keterangan Nikah</li>
                <li>Surat Keterangan Usaha/Domisili Usaha</li>
                <li>Surat Keterangan Domisili Biasa</li>
                <li>Surat Keterangan Pindah</li>
                <li>Surat Keterangan Tidak Mampu</li>
                <li>Surat Keterangan Kematian</li>
                <li>Surat Keterangan Kepemilikan Tanah/Pelepasan Tanah</li>
                <li>...................................................</li>
                <li>...................................................</li>
            </ol>
            <p>Demikian urat Keterangan ini dibuat untuk dapat dipergunakan sesuai keperluannya</p>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <p align="left">
                        <font size="4" face="times new roman">
                            Kaimana, <?php echo date('d M Y '); ?><br>
                            LURAH KROOY <br>
                            <br><br>
                            Farid Lamuasa
                        </font>

                    </p>
                </div>


            </div>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
