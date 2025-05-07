<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 60px;
            max-height: 60px;
        }
    </style>
</head>
<body>
    <h2>Data Dosen</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Dosen</th>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosen as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->id_dosen }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama_dosen }}</td>
                <td>{{ $item->jk_dosen }}</td>
                <td>{{ $item->nama_prodi }}</td>
                <td>
                    @if($item->foto_dosen)
                        <img src="{{ public_path('foto_dosen/' . $item->foto_dosen) }}" alt="Foto Dosen">
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
