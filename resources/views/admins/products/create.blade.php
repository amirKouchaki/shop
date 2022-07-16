<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 leading-tight">
            {{ __('Add A Product') }}
        </h2>
    </x-slot>
    <x-sidebar>
        <x-main-container>
            <x-panel>
                <form action="{{route('admins.products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- name -->
                    <div>
                        <x-label for="name" value="name"/>

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                 :value="old('name')"
                                 autofocus required/>
                    </div>
                    <!-- slug -->
                    <div class="mt-8">
                        <x-label for="slug" value="slug"/>

                        <x-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                 :value="old('slug')"
                                 autofocus required/>
                    </div>
                    <!-- in stock -->
                    {{--TODO default the in stock to 0 so this input can be optional--}}
                    <div class="mt-8">
                        <x-label for="in_stock" value="in_stock"/>
                        <x-input id="in_stock" class="block mt-1 w-full" type="text" name="in_stock"
                                 :value="old('in_stock')"
                                 autofocus required/>
                    </div>
                    <!-- currency -->

                    {{-- TODO convert to select --}}
                    <div class="mt-8">
                        <x-label for="currency" value="currency"/>
                        <x-input id="currency" class="block mt-1 w-full" type="text" name="currency"
                                 :value="old('currency')"
                                 autofocus required/>
                    </div>
                    <!-- price -->
                    <div class="mt-8">
                        <x-label for="price" value="price"/>
                        <x-input step=".01" id="price" class="block mt-1 w-full" type="text" name="price"
                                 :value="old('price')"
                                 autofocus required/>
                    </div>
                    <!-- avatar -->
                    <div class="mt-8">
                        <x-label for="avatar" value="avatar"/>
                        <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar"
                                 autofocus required/>
                    </div>
                    <x-button class="mt-8 bg-blue-500">
                        add
                    </x-button>

                    <!-- validation errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                </form>
            </x-panel>
        </x-main-container>
    </x-sidebar>

</x-app-layout>

