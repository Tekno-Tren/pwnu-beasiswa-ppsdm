@php
    $files = array_filter(explode(',', $getState()));
@endphp

@if (!empty($files))
    <ul class="space-y-1">
        @foreach ($files as $file)
            @php
                $filename = basename(trim($file));
                $url = url('public/storage/' . $filename);
            @endphp
            <li>
                <a 
                    href="{{ $url }}" 
                    target="_blank" 
                    class="text-primary-600 underline"
                >
                    {{ $filename }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <span class="text-gray-500 italic">Tidak ada file</span>
@endif
