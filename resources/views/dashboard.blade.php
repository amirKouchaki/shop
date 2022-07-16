<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-sidebar>
        <x-main-container>
            <x-panel>
                <div>
                    <div class="max-w-2xl mx-auto  sm:px-6 lg:max-w-7xl lg:px-8">
                        <h2 class="sr-only">Products</h2>
                        <div
                            class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @if($products->isNotEmpty())
                                @foreach($products as $product)
                                    @can('is_admin')
                                        <a href="/admins/products/{{$product->slug}}/edit" class="group">
                                            @endcan
                                            @can('is_employee')
                                                <a href="/employees/products/{{$product->slug}}/orders/create"
                                                   class="group">
                                                    @endcan
                                                    <div>
                                                        <div
                                                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                                            <img src="{{asset('storage/'.$product->avatar)}}"
                                                                 alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                                                 class=" w-400 object-center object-cover group-hover:opacity-75" style="aspect-ratio:1; height: 192px;">

                                                        </div>
                                                        <div class="align-text-bottom">
                                                            <h3 class="mt-4 text-md text-gray-700 font-bold">
                                                                {{$product->name}}
                                                            </h3>
                                                            <p class="mt-3 text-sm font-medium text-gray-900">
                                                                {{$product->price.' '.$product->currency}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                        </a>
                                    @endforeach
                                @else
                                        <div class=" col-span-full font-bold">
                                        sorry!! there seems to be no products available at this time
                                        </div>
                                @endif
                                <!-- More products... -->
                        </div>
                    </div>
                </div>
            </x-panel>
        </x-main-container>
    </x-sidebar>
    @if(session()->has('success'))
        <div
            x-data="{show : true}"
            x-init="setTimeout(() => show= false,4000)"
            x-show="show"
            class="fixed bottom-3 right-4 px-4 py-2 bg-blue-500 text-sm rounded-xl">{{session()->get('success')}}</div>
    @endif

</x-app-layout>
