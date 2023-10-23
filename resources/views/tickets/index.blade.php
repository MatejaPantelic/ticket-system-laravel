<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-gray-100 p-8 w-1/2 mx-auto mt-8 rounded-lg shadow-lg">
                        <h1 class="text-2xl font-semibold mb-4">Check Ticket Status</h1>

                        <form action="{{ route('ticket.valid') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="ticket_number" class="block text-gray-700 text-sm font-bold mb-2">Ticket
                                    Number</label>
                                <input type="text" id="ticket_number" name="ticket_number"
                                    class="w-3/5 p-2 border rounded-lg  @error('ticket_number') border border-danger  @enderror"
                                    placeholder="Enter your ticket number" value="{{ old('ticket_number') }}">
                                <button type="submit"
                                    class="w-1/5 bg-blue-500 text-white ml-2 p-2 rounded-lg hover:bg-blue-600 transition duration-200">Check</button>
                                @error('ticket_number')
                                    <p class="text-danger text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </form>
                    </div>

                </div>

                <!-- component -->
                @isset($ticket)
                    <div class="flex flex-col items-center justify-center mb-5 bg-center">
                        <div class="max-w-md w-full h-full mx-auto z-10 bg-blue-900 rounded-3xl">
                            <div class="flex flex-col">
                                <div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
                                    <div class="flex-none sm:flex">
                                        <div class="flex-auto justify-evenly">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <h2 class="font-medium">PRICE</h2>
                                                </div>
                                                <div class="ml-auto text-blue-800">{{ $ticket->price }} rsd</div>
                                            </div>

                                            <div class="border-b border-dashed border-b-2 pt-4">
                                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                                            </div>
                                            <div class="flex justify-between p-5 text-sm">
                                                <div class="grid justify-items-start ">
                                                    <span class="text-sm">Ticket number</span>
                                                    <div class="font-semibold">{{ $ticket->ticket_number }} </div>

                                                </div>
                                                <div class="grid justify-items-end ">
                                                    <span class="text-sm">Created at</span>
                                                    <div class="font-semibold">{{ $ticket->created_at->todatestring() }}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex justify-between mb-4 px-5">
                                                <div class="grid justify-items-start ">
                                                    <span class="text-sm">Owner name</span>
                                                    <div class="font-semibold">{{ $ticket->owner_name }} </div>

                                                </div>
                                                <div class="grid justify-items-end ">
                                                    <span class="text-sm">Owner surname</span>
                                                    <div class="font-semibold">{{ $ticket->owner_surname }} </div>

                                                </div>
                                            </div>

                                            <div class="border-b border-dashed border-b-2 pt-3">
                                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                                            </div>

                                            <div class="flex flex-col pt-3 justify-center">
                                                <h6 class="font-bold text-center">
                                                    @if ($ticket->valid)
                                                        <span class="text-success">Ticket is VALID!</span>
                                                    @else
                                                        <span class="text-danger">Ticket is INVALID!</span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($ticket->valid)
                            <div class="m-4">
                                <form action="{{ route('ticket.check') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="ticket_number" value="{{ $ticket->ticket_number }}">
                                    <button type="submit"
                                        class="bg-red-500 text-white p-2 w-48 rounded-lg hover:bg-red-600 transition duration-200">Use
                                        the ticket</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
