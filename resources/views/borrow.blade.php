<x-layout>

    <x-navbar></x-navbar>

    <!-- alert success -->
    @if (Session::has('success'))
        <x-alertsuccess>
            {{ Session::get('success') }}
        </x-alertsuccess>
    @endif

    <!-- alert error -->
    @if (Session::has('error'))
        <x-alerterror>
            {{ Session::get('error') }}
        </x-alerterror>
    @endif

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="relative py-3 sm:max-w-xl sm:mx-auto mb-40 mt-20">
        <div class="absolute inset-0 bg-[#00264A] shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
        </div>
        <div class="text-white relative px-4 py-10 bg-[#00264a8c] shadow-lg sm:rounded-3xl sm:p-20">

            <div class="text-center pb-6">
                <h1 class="text-3xl">Borrowing Books</h1>

                <p class="text-gray-300">
                    Fill in the following data to borrow a book.
                </p>
            </div>

            <form action="{{ route('account.store') }}" method="post">
                @csrf
                <select
                    class="shadow mb-4 appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="user_id" id="user_id">
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->username }}</option>
                </select>

                <select
                    class="box shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="book_id" id="book_id" required>
                    <option value="">Select Title Book's</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                    @endforeach
                </select>

                <div class="flex justify-between mt-4">
                    <input
                        class="shadow bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" value="Send ➤">

                </div>
            </form>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.box').select2();
        });
    </script>
</x-layout>

<x-footer></x-footer>
