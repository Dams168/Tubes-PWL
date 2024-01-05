<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 ">
                            <label for="startDate" class="mr-2">Tanggal Awal : </label>
                            <input type="date" id="startDate" class="bg-white dark:bg-gray-800" >

                            <label for="endDate" class="ml-4 mr-2">Tanggal Akhir : </label>
                            <input type="date" id="endDate" class="bg-white dark:bg-gray-800">

                            @hasrole("owner")
                            <label for="filterCabang" class="ml-4 mr-2">Pilih Cabang : </label>
                            <select id="filterCabang" onchange="filterTransactions()" class="bg-white dark:bg-gray-800">
                                <option value="">Semua Cabang</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->nama_cabang }}</option>
                                @endforeach
                            </select>
                            @endhasrole

                            {{-- <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="filterTransactions()">Search</button> --}}
                            <input type="hidden" id="cabangId" value="">
                            <x-primary-button onclick="filterTransactions()">Search</x-primary-button>
                        </div>
                        <input type="hidden" id="selectedBranch" value="">
                        <x-primary-button  onclick="printTransactions()">Cetak PDF</x-primary-button>
                    </div>

                    <x-table>
                        <x-slot name="header">
                            <tr class="py-10">
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Nama Cabang</th>
                            </tr>
                        </x-slot>
                        @foreach ($transactions as $transaction)
                            @if (auth()->user()->hasRole('owner') || (auth()->user()->hasRole('manager') && auth()->user()->belongsToBranch($transaction->branch->id)))
                                <tr class="transaction-row" data-tanggal="{{ $transaction->tanggal_transaksi }}" data-cabang="{{ $transaction->branch->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->product->nama_barang }}</td>
                                    <td>{{ $transaction->tanggal_transaksi }}</td>
                                    <td>{{ $transaction->jumlah }}</td>
                                    <td>{{ $transaction->subtotal }}</td>
                                    <td>{{ $transaction->branch->nama_cabang }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterTransactions() {
        let startDate = document.getElementById('startDate').value;
        let endDate = document.getElementById('endDate').value;

        let cabangId = '';

        @if (auth()->user()->hasRole('manager'))
            cabangId = '{{ auth()->user()->branches->first()->id ?? '' }}';
        @else
            cabangId = document.getElementById('filterCabang').value;
        @endif

        let transactionRows = document.getElementsByClassName('transaction-row');
        for (let i = 0; i < transactionRows.length; i++) {
            let row = transactionRows[i];
            let rowTanggal = row.getAttribute('data-tanggal');
            let rowCabang = row.getAttribute('data-cabang');

            if (
                (startDate === '' || rowTanggal >= startDate) &&
                (endDate === '' || rowTanggal <= endDate) &&
                (cabangId === '' || cabangId === rowCabang)
            ) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        }
    }

        function printTransactions() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        let selectedBranch = '';

        @if (auth()->user()->hasRole('manager'))
            selectedBranch = '{{ auth()->user()->branches->first()->id ?? '' }}';
        @else
            selectedBranch = document.getElementById('filterCabang').value;
        @endif

        const printUrl = `{{ route('transaction.print') }}?start_date=${startDate}&end_date=${endDate}&cabang_id=${selectedBranch}`;
        window.open(printUrl);
    }
    </script>
</x-app-layout>
