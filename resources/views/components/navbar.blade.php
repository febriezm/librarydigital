<!-- component -->
<header class="header sticky z-10 top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">
    <!-- logo -->
    <h1 class="w-3/12">
        <img class="w-20 h-auto" src="{{ URL('images/log.png') }}" alt="">
    </h1>

    <!-- navigation -->
    <nav class="nav font-semibold text-lg">
        <ul class="flex items-center">
            <li class="p-4 border-b-2 border-[#00264A] border-opacity-0 hover:border-opacity-100 hover:text-bg-[#00264A] duration-200 cursor-pointer">
              <a href="{{ route('account.dashboard') }}" @if(request()->route()->uri == 'dashboard') class='active' @endif>Dashboard</a>
            </li>
            <li class="p-4 border-b-2 border-[#00264A] border-opacity-0 hover:border-opacity-100 hover:text-bg-[#00264A] duration-200 cursor-pointer">
              <a href="{{ route('account.books') }}" @if(request()->route()->uri == 'booklist') class='active' @endif>Books</a>
            </li>
            <li class="p-4 border-b-2 border-[#00264A] border-opacity-0 hover:border-opacity-100 hover:text-bg-[#00264A] duration-200 cursor-pointer">
              <a href="{{ route('account.borrow') }}" @if(request()->route()->uri == 'borrow') class='active' @endif>Borrow</a>
            </li>
            <li class="p-4 border-b-2 border-[#00264A] border-opacity-0 hover:border-opacity-100 hover:text-bg-[#00264A] duration-200 cursor-pointer">
              <a href="{{ route('account.reviews') }}">Reviews</a>
            </li>
        </ul>
    </nav>

    <!-- buttons --->
    <div class="w-3/12 flex justify-end">
        <div class="group relative items-center space-x-4">
            <div class="flex items-center justify-between bg-white px-4">
                <a class="menu-hover my-2 py-2 text-base font-medium text-black lg:mx-4" onClick="">
                    {{ Auth::user()->username }}
                </a>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </div>
    
            <div
                class="invisible absolute w-36 z-50 flex flex-col bg-gray-100 py-1 px-1 shadow-xl group-hover:visible">
    
                <a class="flex items-center w-36 h-9 rounded-lg hover:bg-gray-300" href="{{ route('account.profile') }}">
                    <button class="flex justify-center my-2 space-x-1 py-1 font-semibold md:mx-2">
                        <svg class="w-6=4 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                          </svg>                          
                        <span class="text-gray-500">Profile</span>
                    </button>
                  </a>
    
                <a class="flex items-center w-36 h-9 rounded-lg hover:bg-red-300" href="{{ route('account.logout') }}">
                    <button class="flex justify-center my-2 space-x-1 py-1 font-semibold md:mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path class="text-red-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="text-red-500">Log Out</span>
                    </button>
                  </a>
                
            </div>
        </div>
    </div>
</header>