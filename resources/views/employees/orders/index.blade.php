<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 leading-tight">
            Shopping Cart
        </h2>
    </x-slot>
    <x-sidebar>
        <x-main-container>
            <x-panel>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <x-admin.employees-table-headers :headers="['name','quantity','price','added at']"/>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="{{asset('storage/'.$order->product->avatar)}}"
                                                             alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{$order->product->name}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm pl-5 text-gray-900">{{$order->quantity}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              {{$order->product->price * $order->quantity.' '.$order->product->currency}}
                                            </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{date('Y-m-d',strtotime($order->created_at))}}
                                            </td>
                                            <td class="flex px-6 py-8 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form
                                                    action="{{route('employees.orders.index')}}/{{$order->product_id}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ml-4 text-red-600 hover:text-red-900">
                                                        delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- More people... -->
                                    </tbody>
                                </table>
                                <form action="{{route('employees.masterFacts.store')}}" method="POST">
                                    @csrf
                                    <div class="my-4 ml-4 ">
                                        <x-label class="ml-2 font-bold text-blue-500" for="customer_id">
                                            customer
                                        </x-label>
                                        <select class="rounded-2xl mt-1" name="customer_id" id="customer_id">
                                            @foreach($customers as $customer)
                                                <option
                                                    value="{{$customer->id}}">
                                                    {{$customer->first_name.' '.$customer->last_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-button :disabled="$orders->count()==0?'disabled ':''">finish shopping</x-button>
                                    </div>
                                </form>
                            </div>
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
