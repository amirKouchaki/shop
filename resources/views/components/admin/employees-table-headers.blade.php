@props(['headers'])
@foreach($headers as $header)
<th scope="col"
    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
    {{ucwords($header)}}
</th>
@endforeach
<th scope="col" class="relative px-6 py-3">
    <span class="sr-only">Edit</span>
</th>
