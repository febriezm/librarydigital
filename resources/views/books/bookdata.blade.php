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
  
           <div class="flex px-6 mt-3 items-center justify-between">
            <form action="" method="get">
              <div class="flex px-6 mt-3 items-center justify-between">
                  <div class="relative w-auto group">
                    <select name="namakategori" id="namakategori" class="rounded-md border border-gray-300 bg-white py-3 px-3 text-base font-normal text-[#00264A] outline-none focus:border-[#00264A] focus:shadow-md w-full select-multiple">
                      <option value="">Select Kategori</option>
                      @foreach ($kategoris as $item)
                          <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
                      @endforeach
                    </select>
                </div>
                <button class="ml-1 px-2 py-3 font-semibold">
                  <svg class="h-6 w-6" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><title/>
                    <path d="M456.69,421.39,362.6,327.3a173.81,173.81,0,0,0,34.84-104.58C397.44,126.38,319.06,48,222.72,48S48,126.38,48,222.72s78.38,174.72,174.72,174.72A173.81,173.81,0,0,0,327.3,362.6l94.09,94.09a25,25,0,0,0,35.3-35.3ZM97.92,222.72a124.8,124.8,0,1,1,124.8,124.8A124.95,124.95,0,0,1,97.92,222.72Z"/>
                  </svg>
                </button>
              </div>
            </form>
            <a href="{{ route('books.create') }}">
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
                  <td class="px-4 py-3 text-sm border">{{ $book->status }}</td>
                  <td class="text-sm border">
                  <a href="{{ route('books.edit', $book) }}">
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
  