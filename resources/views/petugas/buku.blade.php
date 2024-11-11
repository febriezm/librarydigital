<x-layout>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="flex h-auto">

        <!-- sidebar -->
        <div
            class="ml-[-100%] fixed z-10 top-0 pb-3 px-2 w-full shadow-md flex flex-col justify-between h-screen border-r text-gray-700 bg-gray-100 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">

            <div class="flex items-center w-full px-3 mt-3" href="#"> <img src="{{ URL('images/log.png') }}"
                    class="h-16 mr-2" alt="Logo"> <span
                    class="text-black self-center text-md font-bold whitespace-nowrap">Petugas</span>
            </div>
            <div class="w-full px-2">
                <div class="flex flex-col items-center w-full mt-3 border-t border-gray-300">
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300"
                        href="{{ route('petugas.dashboard') }}">
                        <svg class="h-6 w-6" height="24" viewBox="0 0 24 24" width="24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Dasboard</span>
                    </a>

                    <a class="flex items-center w-full h-12 px-3 mt-2 bg-gray-400 hover:bg-gray-300 rounded" href="{{ route('petugas.buku') }}">
                        <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Data Buku</span>
                    </a>

                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="{{ route('petugas.peminjaman') }}">
                        <svg class="h-6 w-6" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M559.7 392.2l-135.1 99.51C406.9 504.8 385 512 362.1 512H15.1c-8.749 0-15.1-7.246-15.1-15.99l0-95.99c0-8.748 7.25-16.02 15.1-16.02l55.37 .0238l46.5-37.74c20.1-16.1 47.12-26.25 74.12-26.25h159.1c19.5 0 34.87 17.37 31.62 37.37c-2.625 15.75-17.37 26.62-33.37 26.62H271.1c-8.749 0-15.1 7.249-15.1 15.1s7.25 15.1 15.1 15.1h120.6l119.7-88.17c17.8-13.19 42.81-9.342 55.93 8.467C581.3 354.1 577.5 379.1 559.7 392.2z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Data Peminjaman</span>
                    </a>
                </div>
            </div>
            
            <div class="flex flex-col items-center w-full mt-2 border-t border-gray-300"> 
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="{{ route('petugas.jenis') }}"> 
                  <svg enable-background="new 0 0 32 32" height="32px" id="svg2" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="category"><polygon points="20,20 20,12 12,12 12,14 8,14 8,10 10,10 10,2 2,2 2,10 6,10 6,26 12,26 12,30 20,30 20,22 12,22 12,24.001 8,24    8,16 12,16 12,20  "/></g>
                  </svg>
                  <span class="text-sm font-medium">Kategori Buku</span>
                </a> 
                  </div>

            <a class="flex items-center justify-center px-5 w-64 h-16 mt-auto rounded-md bg-red-500 hover:bg-red-400"
                href="{{ route('petugas.logout') }}">
                <svg class="text-white w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-2 text-sm font-medium text-white">Log Out</span>
            </a>

        </div>


        <!-- Main content -->
        <div class="h-full ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

            <div class="sticky shadow-sm z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="px-5 flex items-center justify-between space-x-4 2xl:container">
                    <div class="text-2xl font-bold flex items-center lg:ml-2.5">
                        <span class="text-[#00264A] mt-1 self-center whitespace-nowrap">Pustakalaya.com</span>
                    </div>
                </div>
            </div>
            
          @if (Session::has('success'))
          <x-alertsuccess>
            {{ Session::get('success') }} 
          </x-alertsuccess>
           @endif

            <div class="flex px-6 mt-3 items-center justify-between">
                <form action="" method="get">
                    <div class="flex px-6 mt-3 items-center justify-between">
                        <div class="relative w-auto group">
                            <select name="namakategori" id="namakategori"
                                class="rounded-md border border-gray-300 bg-white py-3 px-3 text-base font-normal text-[#00264A] outline-none focus:border-[#00264A] focus:shadow-md w-full select-multiple">
                                <option value="">Select Kategori</option>
                                @foreach ($kategoris as $item)
                                    <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="ml-1 px-2 py-3 font-semibold">
                            <svg class="h-6 w-6" height="512" viewBox="0 0 512 512" width="512"
                                xmlns="http://www.w3.org/2000/svg">
                                <title />
                                <path
                                    d="M456.69,421.39,362.6,327.3a173.81,173.81,0,0,0,34.84-104.58C397.44,126.38,319.06,48,222.72,48S48,126.38,48,222.72s78.38,174.72,174.72,174.72A173.81,173.81,0,0,0,327.3,362.6l94.09,94.09a25,25,0,0,0,35.3-35.3ZM97.92,222.72a124.8,124.8,0,1,1,124.8,124.8A124.95,124.95,0,0,1,97.92,222.72Z" />
                            </svg>
                        </button>
                    </div>
                </form>
                <a href="{{ route('petugas.create') }}">
                    <button class="bg-green-500 hover:bg-green-400 text-white px-7 py-2 rounded-md font-semibold">Add</button>
                </a>
            </div>

            <div class="mt-5 mx-5 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 border-b border-gray-600">
                        <th class="px-2 py-3">No.</th>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Penulis</th>
                        <th class="px-4 py-3">Penerbit</th>
                        <th class="px-4 py-3">Tahun Terbit</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      @foreach ($books as $book)
                      <tr class="text-gray-700 text-center">
                        <td class="px-4 py-3 text-sm border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                              <div class="relative h-20 w-20 sm:mb-0 mb-3">
                                  <img src="{{ url('storage/' . $book->foto) }}" alt="pic" draggable="false" class=" w-20 h-20 object-cover">
                              </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border">{{ $book->judul }}</td>
                        <td class="px-4 py-3 text-sm border">{{ $book->penulis }}</td>
                        <td class="px-4 py-3 text-sm border">{{ $book->penerbit }}</td>
                        <td class="px-4 py-3 text-sm border">{{ $book->th_terbit }}</td>
                        <td class="px-4 py-3 text-sm border {{ $book->status == 'In stock' ? 'text-green-500' : 'text-red-500' }}">{{ $book->status }}</td>
                        <td class="text-sm border">
                        <a href="{{ route('petugas.edit', $book) }}">
                            <button type="submit" class="px-7 py-2 rounded-md font-semibold">
                              <svg class="text-orange-600" height="18px" version="1.1" viewBox="0 0 18 18" width="18px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-213.000000, -129.000000)"><g id="create" transform="translate(213.000000, 129.000000)">
                                  <path d="M0,14.2 L0,18 L3.8,18 L14.8,6.9 L11,3.1 L0,14.2 L0,14.2 Z M17.7,4 C18.1,3.6 18.1,3 17.7,2.6 L15.4,0.3 C15,-0.1 14.4,-0.1 14,0.3 L12.2,2.1 L16,5.9 L17.7,4 L17.7,4 Z" id="Shape"/></g></g></g>
                              </svg>
                            </button>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

        </div>
    </div>

</x-layout>
