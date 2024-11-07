<x-layout>

  <div class="flex h-auto">

    @include('partials.sidebar')
    

    <!-- Main content -->
    <div class="h-full ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        
        @include('partials.header')
        
   
        @if (Session::has('success'))
        <x-alertsuccess>
          {{ Session::get('success') }} 
        </x-alertsuccess>
         @endif

        <div class="mt-14 px-5">
          <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
              <a href="{{ route('books.bookdata') }}">
              <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z"/>
                </svg> 
              </div>
            </a>
              <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Data Buku</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $book_count }}</h4>
              </div>
            </div>
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
              <a href="{{ route('peminjaman.peminjaman') }}">
              <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                <svg class="h-6 w-6" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                  <path d="M204.8 230.4c-10.6-14.1-30.7-17-44.8-6.4-14.1 10.6-17 30.7-6.4 44.8l38.1 50.8c4.8 6.4 4.1 15.3-1.5 20.9l-12.8 12.8c-6.7 6.7-17.6 6.2-23.6-1.1L64 244.4V96c0-17.7-14.3-32-32-32S0 78.3 0 96v218.4c0 10.9 3.7 21.5 10.5 30l104.1 134.3c5 6.5 8.4 13.9 10.4 21.7 1.8 6.9 8.1 11.6 15.3 11.6H272c8.8 0 16-7.2 16-16V384c0-27.7-9-54.6-25.6-76.8l-57.6-76.8zM608 64c-17.7 0-32 14.3-32 32v148.4l-89.8 107.8c-6 7.2-17 7.7-23.6 1.1l-12.8-12.8c-5.6-5.6-6.3-14.5-1.5-20.9l38.1-50.8c10.6-14.1 7.7-34.2-6.4-44.8-14.1-10.6-34.2-7.7-44.8 6.4l-57.6 76.8C361 329.4 352 356.3 352 384v112c0 8.8 7.2 16 16 16h131.7c7.1 0 13.5-4.7 15.3-11.6 2-7.8 5.4-15.2 10.4-21.7l104.1-134.3c6.8-8.5 10.5-19.1 10.5-30V96c0-17.7-14.3-32-32-32z"/>
                </svg>
              </div>
            </a>
              <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Data Peminjaman</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $peminjaman_count }}</h4>
              </div>
            </div>
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
              <a href="{{ route('kategori.kategoridata') }}">
              <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-teal-600 to-teal-400 text-white shadow-teal-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                <svg enable-background="new 0 0 32 32" height="32px" id="svg2" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="category"><polygon points="20,20 20,12 12,12 12,14 8,14 8,10 10,10 10,2 2,2 2,10 6,10 6,26 12,26 12,30 20,30 20,22 12,22 12,24.001 8,24    8,16 12,16 12,20  "/></g>
                </svg>
              </div>
            </a>
              <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Kategori</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $kategoribuku_count }}</h4>
              </div>
            </div>
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
              <a href="{{ route('admin.ulasan') }}">
              <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-purple-600 to-purple-400 text-white shadow-purple-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                <svg class="h-6 w-6" data-name="Layer 21" height="24" id="Layer_21" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><title/><rect height="10" width="3" x="2" y="10"/>
                  <path d="M19,9H14V4a1,1,0,0,0-1-1H12L7.66473,8.37579A3.00021,3.00021,0,0,0,7,10.259V18a2,2,0,0,0,2,2h6.43481a2.99991,2.99991,0,0,0,2.69037-1.67273L21,12.5V11A2,2,0,0,0,19,9Z"/>
                </svg>
              </div>
            </a>
              <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Ulasan Buku</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $ulasanbuku_count }}</h4>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-14 px-5">
          <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-1">
            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
              <a href="{{ route('users.userdata') }}">
              <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-gray-800">
                  <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                </svg>
              </div>
            </a>
              <div class="p-4 text-right">
                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Data User</p>
                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $user_count }}</h4>
              </div>
            </div>
          </div>
        </div>
        
        <x-peminjaman-table :peminjaman='$peminjaman'></x-peminjaman-table>
        
    </div>
  </div>

</x-layout>
