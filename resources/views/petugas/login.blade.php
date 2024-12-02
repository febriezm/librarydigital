<x-layout>

    <!-- image logo -->
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
          <div class="flex-1 bg-[#00264A] text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat transform transition duration-500 hover:scale-110">
              <img src="{{ URL('images/logo.png') }}">
            </div>
        </div>
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="flex flex-col items-center">

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
    
                    <!-- head tittle -->
                    <div class="w-full flex-1 mt-8">
                      <h1 class="text-4xl font-bold text-[#00264A] text-center">Welcome Back!</h1>
                      <h2 class="text-2xl font-extralight text-gray-500 text-center">Petugas</h2>
                        <div class="my-12 border-b text-center">
    
                            <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                              To set up data please sign in.
                            </div>
                        </div>
    
                        <!-- form login -->
                        <div class="flex items-center mx-auto max-w-xs">
                          <form class="" action="{{ route('petugas.authenticate') }}" method="post">
                            @csrf
                            <input class="w-full px-8 py-4 rounded-lg font-medium @error('username') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                              id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Username" />
                                @error('username')
                                  <p class="border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                                @enderror
    
                            <input class="w-full px-8 py-4 rounded-lg font-medium @error('password') is-invalid @enderror bg-gray-200 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                              id="password" name="password" type="password" placeholder="Password" />
                                @error('password')
                                  <p class="border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</p>
                                @enderror
    
                            <button type="submit" class="mt-5 tracking-wide font-semibold bg-[#00264A]  text-white w-full py-4 rounded-lg hover:bg-[#00264a8c] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    Sign In
                            </button>
    
                            <p class="mt-10 text-center text-base text-gray-500">
                              To Log In As a User?
                              <a href="{{ route('account.login') }}" class="font-semibold leading-6 text-[#00264A] hover:text-[#00264a8c]">Here</a>
                            </p>
    
                          </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </x-layout>
    
    <x-footer></x-footer>