<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @hasrole("owner")
                    <label for="filterCabang">Pilih Cabang :</label>
                    <select id="filterCabang" onchange="filterProducts()" class="bg-white dark:bg-gray-800">
                        <option value="">Semua Cabang</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->nama_cabang }}</option>
                        @endforeach
                    </select>
                    @endhasrole
                    <input type="hidden" id="selectedBranch" value="">
                    <x-primary-button onclick="printProducts()">Cetak PDF</x-primary-button>
                    <x-table>
                        <x-slot name="header">
                            <tr class="py-10">
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Nama Cabang</th>
                            </tr>
                        </x-slot>
                        @foreach ($products as $product)
                            @if (auth()->user()->hasRole('owner') || (auth()->user()->hasRole('manager') && auth()->user()->belongsToBranch($product->branch->id)))
                                <tr class="product-row" data-cabang="{{ $product->branch->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->nama_barang }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>{{ $product->harga_jual }}</td>
                                    <td>{{ $product->branch->nama_cabang }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterProducts() {
            let cabangId = document.getElementById('filterCabang').value;
            document.getElementById('selectedBranch').value = cabangId;
            let productRows = document.getElementsByClassName('product-row');
            for (let i = 0; i < productRows.length; i++) {
                let row = productRows[i];
                let rowCabang = row.getAttribute('data-cabang');

                if (cabangId === '' || cabangId === rowCabang) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        function printProducts() {
        let selectedBranch = '';

        @if (auth()->user()->hasRole('manager'))
            selectedBranch = {{ auth()->user()->branches->first()->id ?? 'null' }};
        @else
            selectedBranch = document.getElementById('filterCabang').value;
        @endif

        let printRoute = "{{ route('product.print') }}?cabang_id=" + selectedBranch;
        window.open(printRoute);
    }
    </script>
</x-app-layout>
