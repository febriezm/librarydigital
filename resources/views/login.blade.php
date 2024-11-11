<x-layout>

<!-- image logo -->
<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
      <div class="flex-1 bg-[#00264A] text-center hidden lg:flex">
        <div x-data="{ openSettings: false }" class="absolute left-12 mt-4 rounded">
          <button class="border border-gray-400 tracking-wide p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20" title="Settings">
              <a href="{{ route('welcome') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12,9.059V6.5c0-0.256-0.098-0.512-0.293-0.708C11.512,5.597,11.256,5.5,11,5.5s-0.512,0.097-0.707,0.292L4,12l6.293,6.207  C10.488,18.402,10.744,18.5,11,18.5s0.512-0.098,0.707-0.293S12,17.755,12,17.5v-2.489c2.75,0.068,5.755,0.566,8,3.989v-1  C20,13.367,16.5,9.557,12,9.059z"></path>
              </svg>
          </a>
          </button>
      </div>
        <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat transform transition duration-500 hover:scale-110">
            <img src="{{ URL('images/logo.png') }}" alt="">
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
                  <h1 class="text-3xl font-bold text-[#00264A] text-center">Welcome Everyone!</h1>
                  <h2 class="text-2xl font-extralight text-gray-500 text-center">Please enter your details to continue.</h2>
                    <div class="my-12 border-b text-center">

                        <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Or sign in with e-mail
                        </div>
                    </div>

                    <!-- form login -->
                    <div class="mx-auto max-w-xs">
                      <form class="" action="{{ route('account.authenticate') }}" method="post">
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

                        <button type="submit" class="mt-5 tracking-wide font-semibold bg-[#00264A] text-white w-full py-4 rounded-lg hover:bg-[#00264a8c] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                Sign In
                        </button>
                      </form>

                      <p class="mt-10 text-center text-sm text-gray-500">
                        Don't Have an Account?
                        <a href="{{ route('account.register') }}" class="font-semibold leading-6 text-[#00264A] hover:text-[#00264a8c]">Sign Up</a>
                      </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>

<x-footer></x-footer>