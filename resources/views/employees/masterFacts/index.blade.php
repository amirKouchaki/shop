<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 leading-tight">
            factors
        </h2>
    </x-slot>
    <x-sidebar>
        <x-main-container>
            <div class="px-6">
                <x-factor-panel>
                    @if($factors->isNotEmpty())
                        @foreach($factors as $key => $factor)
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-3">
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        factor
                                    </h3>
                                </div>
                                <div class="border-t border-gray-200">
                                    <dl>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Customer's Full name
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$factor->customer->first_name.' '.$factor->customer->last_name}}
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                price before discount
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$factor->sum_price}}
                                            </dd>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                discount
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$factor->discount.'  '.$factor->detail_facts->first()->product->currency}}
                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Total after discount
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{--TODO add currency to masterFact--}}
                                                {{$factor->end_price.'  '.$factor->detail_facts->first()->product->currency}}
                                            </dd>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                description
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$factor->description}}

                                            </dd>
                                        </div>
                                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                ordered at
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{--TODO add currency to masterFact--}}
                                                {{$factor->created_at}}
                                            </dd>
                                        </div>
                                        <!--order_items-->
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div
                                                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead class="bg-gray-50">
                                                            <x-admin.employees-table-headers
                                                                :headers="['name','quantity','price']"/>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200">
                                                            @foreach($factor->detail_facts as $factorRow)
                                                                <tr>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div class="flex items-center">
                                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                                <img class="h-10 w-10 rounded-full"
                                                                                     src="{{asset('storage/'.$factorRow->product->avatar)}}"
                                                                                     alt="">
                                                                            </div>
                                                                            <div class="ml-4">
                                                                                <div
                                                                                    class="text-sm font-medium text-gray-900">
                                                                                    {{$factorRow->product->name}}
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div
                                                                            class="text-sm pl-5 text-gray-900">{{$factorRow->quantity}}</div>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              {{$factorRow->product->price * $factorRow->quantity.' '.$factorRow->product->currency}}
                                            </span>

                                                                </tr>
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </dl>
                                </div>
                            </div>
                        @endforeach
                    @else
                        there seems to be no factors available right now!!
                    @endif
                </x-factor-panel>
                <div class="my-5">
                    {{ $factors->links()}}
                </div>
            </div>
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
