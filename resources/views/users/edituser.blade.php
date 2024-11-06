<x-layout>

  <div class="flex h-full">

    @include('partials.sidebar') 
    

    <!-- Main content -->
    <div class="h-full ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        
        @include('partials.header')
        
   
        @if (Session::has('success'))
        <x-alertsuccess>
          {{ Session::get('success') }} 
        </x-alertsuccess>
         @endif

         <div class="flex px-7 mt-2 items-center justify-between">
          <h2 class="font-bold text-xl">Edit Account</h2>

          <form action="{{ route('users.destroy', $users) }}" method="post"
          class="flex gap-8 mt-5">
          @method('delete')
          @csrf
          <button type="submit" class="bg-red-500 hover:bg-red-400 text-white px-7 py-2 rounded-md font-semibold">Delete</button>
          </form>

      </div>

      <div class="mt-4 px-7" x-data="{ imageUrl: '/user/{{ $users->foto }}'}">
          <form enctype="multipart/form-data" action="{{ route('users.update', $users) }}" method="post"
              class="flex gap-8">
              @method('put')
              @csrf

              <div class="w-1/2 mb-10">
                  <img :src="imageUrl" class="rounded-md w-full h-full" />
              </div>

              <div class="w-1/2">
                  <div class="mb-5">
                      <label for="foto" class="mb-2 block text-base font-medium text-[#07074D]">
                          Picture
                      </label>
                      <input accept="image/*" value="{{ old('foto', $users->foto) }}" type="file" name="foto"
                          id="foto" placeholder="Picure"
                          class="@error('foto') is-invalid @enderror py-3 px-6 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] w-full"
                          @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                      @error('foto')
                          <p class="invalid-feedback">{{ $message }}</p>
                      @enderror
                  </div>

                  <input class="w-full px-8 py-4 rounded-lg font-medium @error('username') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                  id="username" name="username" type="text" value="{{ old('username', $users->username) }}" placeholder="Username" required/>
                    @error('username')
                      <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                    @enderror

                    <input class="w-full px-8 py-4 rounded-lg font-medium @error('email') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                  id="email" name="email" type="text" value="{{ old('email', $users->email) }}" placeholder="Email" required/>
                    @error('email')
                      <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                    @enderror

                <input class="w-full px-8 py-4 rounded-lg font-medium @error('namalengkap') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                id="namalengkap" name="namalengkap" type="text" value="{{ old('namalengkap', $users->namalengkap) }}" placeholder="Nama Lengkap" required/>
                @error('namalengkap')
                <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
              @enderror
  
              <textarea rows="4" name="alamat" id="alamat" placeholder="Alamat"
                  class="w-full resize-none mt-5 rounded-md @error('alamat') is-invalid @enderror border border-gray-200 bg-gray-200 py-3 px-6 text-base font-medium text-black outline-none focus:border-gray-400 focus:shadow-md"
                     required>{{ old('alamat', $users->alamat) }}</textarea>
                 @error('deskripsi')
                    <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                   @enderror
  
                <select class="w-full px-8 py-4 mb-5 rounded-lg font-medium @error('role') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                  name="role" id="role" >
                  <option value="{{ old('role', $users->role) }}">user</option>
                  <option value="{{ old('role', $users->role) }}">petugas</option>
                  </select>
                  @error('role')
                  <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                @enderror
  
                      <button
                          class="hover:shadow-form w-full rounded-md bg-green-500 hover:bg-green-400 py-3 px-8 text-base font-semibold text-white outline-none">
                          Update
                      </button>

                      <a href="{{ route('users.userdata') }}" class="mt-3 mb-10 tracking-wide font-semibold text-base bg-white  text-green-500 w-full py-4 rounded-lg border border-green-500 hover:bg-gray-300 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                        Back
                    </a>

          </form>
      </div>
  </div>

    </div>
  </div>

</x-layout>
