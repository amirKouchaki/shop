<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 leading-tight">
            buy {{$product->name}}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto">

        <div class="mt-5 p-3">
            <img class="mx-auto rounded-xl" src="{{asset('storage/'.$product->avatar)}}" alt="this did not work"
                 width="400px">
            <h3 class="text-center font-bold text-xl mt-10">{{$product->name }}</h3>
            <h4 class="text-center text-md mt-2">{{$product->price.' '.$product->currency}}</h4>

            <form action="{{route('employees.orders.store')}}" method="POST">
                @csrf
                <div class="text-center">
                    <x-label for="quantity" class="mt-4 font-bold text-md">quantity</x-label>

                    <x-input class="mt-4 border border-black py-1 px-3 ml-24" id="quantity" value="{{old('quantity')}}"
                             name="quantity" required autocomplete=""/>
                    <span class="ml-2">out of {{$product->in_stock}}</span>
                    @error('quantity')
                        <h3 class=" mt-2 text-xs text-red-500 font-bold">{{$message}}</h3>
                    @enderror
{{--                    TODO change--}}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="in_stock" value="{{$product->in_stock}}">

                </div>
                <div class="text-center">
                    <button type="submit"
                        class=" px-4 py-2 mt-4
                      bg-blue-300 border border-blue-600 rounded-md font-semibold text-xs
                        uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900
                         focus:outline-none focus:border-blue-900 focus:ring ring-blue-300
                          disabled:opacity-25 transition ease-in-out duration-150 text-blue-500">
                        submit
                    </button>
                </div>
            </form>
            {{--TODO this code is good for admin--}}
            {{--            <div class="flex mt-6">--}}
            {{--                <button form="deleteForm"--}}
            {{--                        class="inline-flex items-center px-4 py-2 ml-auto--}}
            {{--                          bg-red-300 border border-red-600 rounded-md font-semibold--}}
            {{--                           text-xs  uppercase tracking-widest hover:bg-red-700--}}
            {{--                            active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring--}}
            {{--                             ring-red-300 disabled:opacity-25 transition ease-in-out duration-150--}}
            {{--                              text-red-500">--}}
            {{--                    delete--}}
            {{--                </button>--}}
            {{--               --}}
            {{--            </div>--}}
        </div>


    </div>
</x-app-layout>
