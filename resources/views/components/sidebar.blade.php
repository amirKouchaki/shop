<div class="lg:flex lg:p-8 sm:p-6 mx-auto max-w-7xl">
    <aside class=" flex-shrink-0 lg:w-56 sm:w-full">
        <x-panel>
            <h2 class="font-bold text-md border-b border-gray-500 px-2">links</h2>
            <ul class="leading-8 py-3 px-2">
                {{--TODO--}}
                @can('is_employee')
                    <x-sidebar-link href="{{route('employees.dashboard')}}">dashboard</x-sidebar-link>
                    <x-sidebar-link href="{{route('employees.orders.index')}}">shopping cart</x-sidebar-link>
                    <x-sidebar-link href="{{route('employees.masterFacts.index')}}">factors</x-sidebar-link>
                @endcan
                @can('is_admin')
                    <x-sidebar-link href="{{route('admins.dashboard')}}" >dashboard</x-sidebar-link>
                    <x-sidebar-link href="{{route('admins.products.create')}}">add product</x-sidebar-link>
                    <x-sidebar-link href="{{route('admins.register.create')}}">register employee</x-sidebar-link>
                    <x-sidebar-link href="{{route('admins.employees.index')}}">employees list</x-sidebar-link>
                @endcan


            </ul>
        </x-panel>
    </aside>
    {{$slot}}
</div>
