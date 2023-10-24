<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('List of registred users') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Menage roles and accounts of registered users') }}
                        </p>
                    </header>
                    {{-- table --}}
                    <div class="relative overflow-x-auto mt-4">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-sm uppercase bg-gray-600 text-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Surname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b bg-gray-800 border-gray-400">
                                        <td class="px-6 py-4 w-1/3 font-medium text-base text-gray-700">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 w-1/3 font-medium text-base text-gray-700">
                                            {{ $user->surname }}
                                        </td>
                                        <td class="px-6 w-1/3 font-medium text-base text-gray-700">
                                            @can('create-ticket')
                                                <div class="flex justify-start">
                                                    @if ($user->hasRole('controller'))
                                                        <form class="mr-3 max-w-sm" method="POST"
                                                            action="{{ route('user.assignAdmin', ['user_id' => $user->id]) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="focus:outline-none uppercase text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-3 py-2 ">Make
                                                                admin</button>
                                                            <input type="hidden" name="name"
                                                                value="{{ $user->name }}">
                                                            <input type="hidden" name="surname"
                                                                value="{{ $user->surname }}">
                                                        </form>
                                                    @endif
                                                    @if ($user->hasRole('admin'))
                                                        <form class="mr-3 max-w-sm" method="POST"
                                                            action="{{ route('user.assignController', ['user_id' => $user->id]) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="focus:outline-none uppercase text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-sm px-3 py-2 ">Make
                                                                controller</button>
                                                            <input type="hidden" name="name"
                                                                value="{{ $user->name }}">
                                                            <input type="hidden" name="surname"
                                                                value="{{ $user->surname }}">
                                                        </form>
                                                    @endif
                                                    <form class="max-w-sm" method="POST"
                                                        action="{{ route('user.destroy', ['user_id' => $user->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-700 hover:text-white uppercase border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1 py-1 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                                            onclick="return confirm('Are you sure you want delete this user?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" class="w-7">
                                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </button>
                                                        <input type="hidden" name="name" value="{{ $user->name }}">
                                                        <input type="hidden" name="surname" value="{{ $user->surname }}">
                                                    </form>
                                                </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
