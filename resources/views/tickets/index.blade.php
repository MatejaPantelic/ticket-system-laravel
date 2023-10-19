<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-gray-100 p-8 w-1/3 mx-auto mt-8 rounded-lg shadow-lg">
                        <h1 class="text-2xl font-semibold mb-4">Check Ticket Status</h1>
                      
                        <form action="#" method="POST">
                          @csrf
                      
                          <div class="mb-4">
                            <label for="ticketNumber" class="block text-gray-700 text-sm font-bold mb-2">Ticket Number</label>
                            <input
                              type="text"
                              id="ticketNumber"
                              name="ticketNumber"
                              class="w-full p-2 border rounded-lg"
                              placeholder="Enter your ticket number"
                              required
                            >
                          </div>
                      
                          <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-200">Check</button>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
