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

           <div class="flex px-7 mt-6 items-center justify-between">
            <!--search bar -->
            <form action="" method="get">
                <div hidden class="md:block">
                    <div class="relative flex mr-5 items-center text-gray-400 focus-within:text-[#00264A]">
                        <button class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
                        <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 35.997 36.004">
                            <path id="Icon_awesome-search" data-name="search" d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z"></path>
                        </svg>
                        </button>
                        <input type="text" name="username" id="username" autocomplete="off" placeholder="Search username" class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-[#00264A] transition">
                    </div>
                </div>
            </form>
            <a href="{{ route('users.create') }}">
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
                  <th class="px-4 py-3">Username</th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Nama Lengkap</th>
                  <th class="px-4 py-3">Alamat</th>
                  <th class="px-4 py-3">Role</th>
                  <th class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($users as $user)
                <tr class="text-gray-700 text-center">
                  <td class="px-4 py-3 text-sm border">{{ $loop->iteration }}</td>
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                        <div class="relative h-20 w-20 sm:mb-0 mb-3">
                            <img src="{{ URL('user/' . $user->foto) }}" alt="pic" draggable="false" class=" w-20 h-20 object-cover rounded-full">
                        </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-ms font-semibold border">{{ $user->username }}</td>
                  <td class="px-4 py-3 text-sm border">{{ $user->email }}</td>
                  <td class="px-4 py-3 text-sm border">{{ $user->namalengkap }}</td>
                  <td class="px-4 py-3 text-sm border">{{ $user->alamat }}</td>
                  <td class="px-4 py-3 text-sm border">{{ $user->role }}</td>
                  <td class="text-sm border">
                  <a href="{{ route('users.edituser', $user) }}">
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
  