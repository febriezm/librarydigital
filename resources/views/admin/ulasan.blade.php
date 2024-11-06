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

          <div class="flex px-7 mt-3 mb-3 items-center justify-between">
            <h2 class="font-bold text-xl ml-6 mb-3 mt-5">Book's Review</h2>
        </div>
          
         <!-- table -->
         <div class="mt-5 mx-5 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 border-b border-gray-600">
                    <th class="px-2 py-3">No.</th>
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Book's</th>
                    <th class="px-4 py-3">Review's</th>
                    <th class="px-4 py-3">Rate</th>
                    <th class="px-4 py-3">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  @foreach ($ulasan as $item)
                  <tr class="text-gray-700 text-center">
                    <td class="px-4 py-3 text-sm border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold text-black">{{ $item->user->username }}</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ $item->book->judul }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $item->ulasan }}</td>
                    <td class="px-4 py-3 text-sm border">{{ $item->rating }}</td>
                    <td class="text-sm border">
                    <form action="{{ route('ulasan.destroy', $item) }}" method="post"
                    class="gap-8 mt-2">
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
    </div>
  
  </x-layout>
  