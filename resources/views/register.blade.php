<x-layout>

<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            
          <!-- head tittle -->
            <div class="flex flex-col items-center">
                <div class="w-full flex-1 mt-8">
                  <h1 class="text-3xl font-bold text-[#00264A] text-center">Create Account</h1>
                  <h2 class="text-2xl font-extralight text-gray-500 text-center">Fill in your identity details</h2>
                    <div class="my-12 border-b text-center">
                        <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Or sign up with e-mail
                        </div>
                    </div>

                    <!-- form register -->
                    <div class="mx-auto max-w-xs">
                      <form class="" enctype="multipart/form-data" action="{{ route('account.processRegister') }}" method="post">
                        @csrf

                        <input accept="image/*" value="{{ old('foto') }}" type="file" name="foto"
                          id="foto" placeholder="Picure"
                          class="@error('foto') is-invalid @enderror py-3 px-6 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] w-full"
                          @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                      @error('foto')
                          <p class="invalid-feedback">{{ $message }}</p>
                      @enderror

                        <input class="w-full px-8 py-4 rounded-lg font-medium @error('username') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                          id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Username" />
                            @error('username')
                              <p class="border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                            @enderror

                        <input class="w-full px-8 py-4 rounded-lg font-medium @error('email') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                          id="email" name="email" type="text" value="{{ old('email') }}" placeholder="Email" />
                            @error('email')
                              <p class="iborder-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                            @enderror

                        <input class="w-full px-8 py-4 rounded-lg font-medium @error('password') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                          id="password" name="password" type="password" placeholder="Password" />
                            @error('password')
                              <p class="border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                            @enderror

                            <input class="w-full px-8 py-4 rounded-lg font-medium @error('password_confirmation') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                          id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" />
                          @error('password_confirmation')
                          <p class="border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                        @enderror

                        <input class="w-full px-8 py-4 rounded-lg font-medium @error('namalengkap') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                         id="namalengkap" name="namalengkap" value="{{ old('namalengkap') }}" type="text" placeholder="Nama Lengkap" />
                         @error('namalengkap')
                         <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                          @enderror

                          <textarea rows="4" name="alamat" id="alamat" placeholder="Alamat"
                          class="w-full resize-none mt-5 rounded-md @error('alamat') is-invalid @enderror border border-gray-200 bg-gray-200 py-3 px-6 text-base font-medium text-black outline-none focus:border-gray-400 focus:shadow-md"
                             required>{{ old('alamat') }}</textarea>
                         @error('deskripsi')
                            <p class="invalid-feedback border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                           @enderror
          

                        <button type="submit" class="mt-5 tracking-wide font-semibold bg-[#00264A]  text-white w-full py-4 rounded-lg hover:bg-[#00264a8c] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                Sign Up
                        </button>

                        <a href="{{ route('account.login') }}" class="mt-3 tracking-wide font-semibold bg-white  text-[#00264A] w-full py-4 rounded-lg border border-[#00264A] hover:bg-gray-300 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                Back
                        </a>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- image logo -->
        <div class="flex-1 bg-[#00264A] text-center hidden lg:flex">
          <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat transform transition duration-500 hover:scale-110">
              <img src="{{ URL('images/logo.png') }}" alt="">
          </div>
      </div>
    </div>
</div> 

</x-layout>

<x-footer></x-footer>