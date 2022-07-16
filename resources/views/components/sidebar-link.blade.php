@php
    $class ='mt-2 hover:text-blue-500';
    $class .= request()->fullUrl()==$attributes['href']?' text-blue-500':' text-gray-600';
@endphp

<div>
    <a {{$attributes->merge(['class'=>$class])}}>
        {{$slot}}
    </a>
</div>
