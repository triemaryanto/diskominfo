<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h1>Struk Pembayaran Menara</h1>
    </div>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Menara</th>
            <th>Jatuh Tempo</th>
            <th>Tarif</th>
            <th>Status</th>
            <th>Tanggal Bayar </th>
        </tr>
        @php
        $no=1;
        @endphp

        @foreach ($data as $index => $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->name_menara }}</td>
            <td>{{ $row->bulan }}/{{ $row->tahun }}</td>
            <td>{{ $row->tarif }}</td>
            <td>{{ $row->status }}</td>
            <td>{{ \Carbon\Carbon::parse($row->updated_at)->now() }}</td>

        </tr>
        @endforeach
    </table>

</body>

</html>