<div>
  
  <h2 class="text-lg font-bold mb-4">All SKUs (Admin View)</h2>

    <table class="w-full text-left border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-2 py-1">UPC</th>
                <th class="border px-2 py-1">Brand</th>
                <th class="border px-2 py-1">Model</th>
                <th class="border px-2 py-1">Type</th>
                <th class="border px-2 py-1">Caliber</th>
                <th class="border px-2 py-1">Action</th>
                <th class="border px-2 py-1">Barrel Length</th>
                <th class="border px-2 py-1">Capacity</th>
                <th class="border px-2 py-1">MSRP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skus as $sku)
                <tr>
                    <td class="border px-2 py-1">{{ $sku->upc }}</td>
                    <td class="border px-2 py-1">{{ $sku->brand }}</td>
                    <td class="border px-2 py-1">{{ $sku->model }}</td>
                    <td class="border px-2 py-1">{{ $sku->type }}</td>
                    <td class="border px-2 py-1">{{ $sku->caliber }}</td>
                    <td class="border px-2 py-1">{{ $sku->action }}</td>
                    <td class="border px-2 py-1">{{ $sku->barrel_length }}</td>
                    <td class="border px-2 py-1">{{ $sku->capacity }}</td>
                    <td class="border px-2 py-1">${{ number_format($sku->msrp, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $skus->links() }}
    </div>
</div>