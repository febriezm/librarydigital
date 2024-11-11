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

                <a class="flex items-center w-full h-12 px-3 mt-2 hover:bg-gray-300 rounded" href="{{ route('petugas.buku') }}">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Data Buku</span>
                </a>

                <a class="flex items-center w-full h-12 px-3 mt-2 rounded bg-gray-400 hover:bg-gray-300" href="{{ route('petugas.peminjaman') }}">
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
  
             <div class="flex px-7 mt-3 mb-3 items-center justify-end">
              <a href="{{ route('petugas.cetak') }}" target="_blank">
                  <button class="bg-[#00264A] hover:bg-[#00264a8c] text-white px-7 py-2 rounded-md font-semibold">Print Data</button>
              </a>
          </div>
  
          <h2 class="flex justify-center font-bold text-xl mb-8 mt-5">Data Peminjaman Buku</h2>
          <div class="mt-5 mx-5 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 border-b border-gray-600">
                    <th class="px-2 py-3">No.</th>
                    <th class="px-4 py-3">Nama Lengkap</th>
                    <th class="px-4 py-3">Buku</th>
                    <th class="px-4 py-3">Tanggal Pinjam</th>
                    <th class="px-4 py-3">Tanggal Kembali</th>
                    <th class="px-4 py-3">Tanggal Dikembalikannya Buku</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Keterangan</th>
                    <th class="px-4 py-3">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  @foreach ($peminjaman as $item)
                  <tr class="text-gray-700 text-center">
                    <td class="px-4 py-3 text-sm border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border">
                      <div class="text-sm">
                          <p class="font-semibold text-black">{{ $item->user->namalengkap }}</p>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ $item->book->judul }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $item->tgl_pinjam }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $item->tgl_kembali }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $item->tgl_dikembalikan }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $item->status }}</td>
                    <td class="px-0 py-3 text-xs border">
                      <span class="px-4 py-1 font-semibold justify-center leading-tight rounded-sm {{ $item->tgl_dikembalikan == null ? 'bg-white' : ($item->tgl_kembali < $item->tgl_dikembalikan ? 'text-white bg-red-600' : 'text-white bg-green-600') }}">
                       {{ $item->tgl_dikembalikan == null ? 'Not Return' : ($item->tgl_kembali < $item->tgl_dikembalikan ? 'Over deadline' : 'On time') }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm border">
                        <form action="{{ route('peminjaman.delete', $item) }}" method="post"
                        class="flex gap-8 mt-2">
                        @method('delete')
                        @csrf
                        <button type="submit" class="text-white px-7 py-2 rounded-md font-semibold">
                          <svg class="text-red-500" height="18px" version="1.1" viewBox="0 0 14 18" width="14px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-299.000000, -129.000000)"><g id="delete" transform="translate(299.000000, 129.000000)">
                            <path d="M1,16 C1,17.1 1.9,18 3,18 L11,18 C12.1,18 13,17.1 13,16 L13,4 L1,4 L1,16 L1,16 Z M14,1 L10.5,1 L9.5,0 L4.5,0 L3.5,1 L0,1 L0,3 L14,3 L14,1 L14,1 Z" id="Shape"/></g></g></g>
                          </svg>
                        </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
            
        </div>
    
</x-layout>
      