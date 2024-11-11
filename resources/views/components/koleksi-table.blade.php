<!-- card  -->
@foreach ($koleksipribadi as $koleksi)
<div
    class="relative min-h-auto bg-white border rounded-lg shadow-lg dark:bg-[#00264A] dark:border-[#00264a8c] transform transition duration-500 hover:scale-105">
    <div class="absolute top-3 right-3 rounded-full bg-[#00264A] text-white  w-6 h-6 text-center">
        {{ $loop->iteration }}
    </div>
    <div class="p-2 flex justify-center">
        <a href="{{ route('account.books') }}">
            <img class="rounded-md h-96" draggable="false"
            src="{{ url('storage/' . $koleksi->book->foto) }}"
            loading="lazy">
        </a>
    </div>
    <div class="px-4 pb-3">
        <div>

            <a href="{{ route('account.books') }}">
                <h5
                    class="text-xl font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 text-gray-900 dark:text-white ">
                    {{ $koleksi->book->judul }}
                </h5>
            </a>

            <p class="antialiased text-gray-600 dark:text-gray-400 text-sm break-all">
                {{ $koleksi->user->username }}
             </p>
            
        </div>
    </div>
</div>
@endforeach