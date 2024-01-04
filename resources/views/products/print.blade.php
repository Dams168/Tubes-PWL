<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Print</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>List Product Mini Market</h2>
    <p>Nama Cabang : {{ $selectedBranchName }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stock</th>
                <th>Harga</th>
                <th>Nama Cabang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->nama_barang }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>{{ $product->harga_jual }}</td>
                    <td>{{ $product->branch->nama_cabang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
