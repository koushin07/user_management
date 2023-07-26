<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end">

                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'new-contact')" class="font-bold  text-base m-4 bg-green-700 text-white p-2 rounded hover:bg-green-800">New Contact</button>
                <x-modal name="new-contact" focusable>
                    <form method="POST" action="{{ route('user.store') }}" class="p-6 text-start">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="contact_number" :value="__('Contact Number')" />
                            <x-text-input id="contact_number" class="block mt-1 w-full" type="number" name="contact_number" :value="old('contact_number')" required autofocus autocomplete="contact_number" />
                            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                        </div>



                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-modal>

            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    First Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Contact
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Actions
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as  $user)


                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->username }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->first_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->address }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->contact_number }}
                                </td>
                                <td class="px-6 py-4 text-">
                                    <button x-data="" class="text-blue-700"
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-update.{{ $user->id }}')">
                                        {{ __('edit') }}</button>
                                    <x-modal name="confirm-user-update.{{ $user->id }}" focusable>
                                        <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}" class="p-6 text-start">
                                            @method('PUT')
                                            @csrf
                                            <h1 class="text-4xl font-semibold ">{{ $user->username }}</h1c>

                                            <!-- Name -->
                                            <div class="mt-6">
                                                <x-input-label for="username" :value="__('Username')" />
                                                <x-text-input id="username"  class="block mt-1 w-full" type="text" name="username" value="{{ $user->username }}" required autofocus autocomplete="username" />
                                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="first_name" :value="__('First Name')" />
                                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $user->first_name }}" required autofocus autocomplete="first_name" />
                                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="last_name" :value="__('Last Name')" />
                                                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $user->last_name }}" required autofocus autocomplete="last_name" />
                                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="address" :value="__('Address')" />
                                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $user->address }}" required autofocus autocomplete="address" />
                                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="contact_number" :value="__('Contact Number')" />
                                                <x-text-input id="contact_number" class="block mt-1 w-full" type="number" name="contact_number" value="{{ $user->contact_number }}" required autofocus autocomplete="contact_number" />
                                                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                                            </div>



                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class="block mt-1 w-full"
                                                                type="password"
                                                                name="password"
                                                                 autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>


                                            <div class="flex items-center justify-end mt-4 gap-2">

                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>
                                                <x-primary-button >
                                                    {{ __('update') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </x-modal>

                                    <span>/</span>
                                    <button x-data="" class="text-red-600" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion.{{ $user->id }}')">
                                        delete
                                    </button>
                                    <x-modal name="confirm-user-deletion.{{ $user->id }}" focusable>
                                        <form method="post" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="p-6">
                                            @csrf
                                            @method('delete')

                                            <h2 class="text-lg font-medium text-gray-900">
                                                {{ __('Are you sure you want to delete your account?') }}
                                            </h2>





                                            <div class="mt-6 flex justify-center">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ml-3">
                                                    {{ __('Delete Account') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
