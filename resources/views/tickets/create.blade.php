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
                    <div class="bg-gray-100 p-8 w-96  mx-auto rounded-lg shadow-lg">
                        <h1 class="text-2xl text-center font-semibold mb-4">Create New Ticket</h1>

                        <form action="{{ route('ticket.store') }}" method="POST" class="grid justify-content-center">
                            @csrf
                            <div class="mb-3">
                                <label for="owner_name" class="block text-gray-700 text-sm font-bold mb-1">Owner
                                    Name</label>
                                <input type="text" id="owner_name" name="owner_name"
                                    class="w-80 p-2 border rounded-lg  @error('owner_name') border border-danger  @enderror"
                                    placeholder="Enter owner name" value="{{ old('owner_name') }}">
                                @error('owner_name')
                                    <p class="text-danger text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="owner_surname" class="block text-gray-700 text-sm font-bold mb-1">Owner
                                    Surname</label>
                                <input type="text" id="owner_surname" name="owner_surname"
                                    class="w-80  p-2 border rounded-lg  @error('owner_surname') border border-danger  @enderror"
                                    placeholder="Enter owner surname" value="{{ old('owner_surname') }}">
                                @error('owner_surname')
                                    <p class="text-danger text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-1">Price</label>
                                <input type="text" id="price" name="price"
                                    class="w-80  p-2 border rounded-lg  @error('price') border border-danger  @enderror"
                                    placeholder="Enter ticket price in RSD" value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3 grid justify-content-center">
                                <button type="submit"
                                    class="bg-blue-500 text-white p-2 w-48 rounded-lg hover:bg-blue-600 transition duration-200">Create</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
