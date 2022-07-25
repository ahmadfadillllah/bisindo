<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Product &raquo; {{ $product->name }} &raquo; video
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url:"{{route('dashboard.product.vidio.index', $product->id)}}",
                },
                columns: [
                    { data: 'DT_RowIndex', name:'DT_RowIndex', with:'5%'},
                    { data: 'url', name: 'url' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-9 lg:px-8">
            <div class="mb-10">
            <a href="{{ route('dashboard.product.vidio.create', $product->id) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded shadow-lg">
                    + Create Category
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center;"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
