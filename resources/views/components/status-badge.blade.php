@if ($status === 'Aktif')
    <span class="inline-flex items-center border border-green-200 bg-green-50 px-2.5 py-1 text-xs font-medium text-green-700">
        Aktif
    </span>
@else
    <span class="inline-flex items-center border border-red-200 bg-red-50 px-2.5 py-1 text-xs font-medium text-red-700">
        Tidak Aktif
    </span>
@endif
