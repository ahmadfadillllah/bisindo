<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url:"{{route('dashboard.product.index')}}",
                },
                columns: [
                    { data: 'DT_RowIndex', name:'DT_RowIndex', with:'5%'},
                    { data: 'name', name: 'name' },
                    { data: 'category.name', name: 'category.name' },
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
                <a href="{{ route('dashboard.product.create') }}" class="px-4 py-2 font-bold btn btn-primary">
                    + Create product
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kategori</th>
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
