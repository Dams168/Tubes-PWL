<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Transaksi</h2>
    <div class="filter-info">
        <p>Tanggal Awal : {{ $startDate ?? '-' }}</p>
        <p>Tanggal Akhir : {{ $endDate ?? '-' }}</p>
        <p>Cabang : {{ $selectedBranchName ?? 'Semua Cabang' }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Nama Cabang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->product->nama_barang }}</td>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>{{ $transaction->jumlah }}</td>
                    <td>{{ $transaction->subtotal }}</td>
                    <td>{{ $transaction->branch->nama_cabang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
