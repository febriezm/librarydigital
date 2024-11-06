<!-- sidebar -->
<div class="ml-[-100%] fixed z-10 top-0 pb-3 px-2 w-full shadow-md flex flex-col justify-between h-screen border-r text-gray-700 bg-gray-100 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">

    <div class="flex items-center w-full px-3 mt-3" href="#"> <img src="{{ URL('images/log.png') }}" class="h-16 mr-2"
            alt="Logo"> <span class="text-black self-center text-md font-bold whitespace-nowrap">Administrator</span>
    </div>

    <div class="w-full px-2">
        <div class="flex flex-col items-center w-full mt-3 border-t border-gray-300"> 
          <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300"
                href="{{ route('admin.dashboard') }}"> 
                <svg class="h-6 w-6" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"/>
                </svg>
                <span class="ml-2 text-sm font-medium">Dasboard</span> 
              </a> 
              
              <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300"
                href="{{ route('users.userdata') }}"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-gray-800">
                  <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-2 text-sm font-medium">Data User</span> 
              </a> 
              
              <a class="flex items-center w-full h-12 px-3 mt-2 hover:bg-gray-300 rounded"
                href="{{ route('books.bookdata') }}"> 
                <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z"/>
                </svg>
                <span class="ml-2 text-sm font-medium">Data Buku</span> 
              </a> 
              
              <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" 
              href="{{ route('peminjaman.peminjaman') }}"> 
                <svg class="h-6 w-6" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                  <path d="M559.7 392.2l-135.1 99.51C406.9 504.8 385 512 362.1 512H15.1c-8.749 0-15.1-7.246-15.1-15.99l0-95.99c0-8.748 7.25-16.02 15.1-16.02l55.37 .0238l46.5-37.74c20.1-16.1 47.12-26.25 74.12-26.25h159.1c19.5 0 34.87 17.37 31.62 37.37c-2.625 15.75-17.37 26.62-33.37 26.62H271.1c-8.749 0-15.1 7.249-15.1 15.1s7.25 15.1 15.1 15.1h120.6l119.7-88.17c17.8-13.19 42.81-9.342 55.93 8.467C581.3 354.1 577.5 379.1 559.7 392.2z"/>
                </svg>
                <span class="ml-2 text-sm font-medium">Data Peminjaman</span> 
              </a> 
            </div>

        <div class="flex flex-col items-center w-full mt-2 border-t border-gray-300"> 
          <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="{{ route('kategori.kategoridata') }}"> 
            <svg enable-background="new 0 0 32 32" height="32px" id="svg2" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="category"><polygon points="20,20 20,12 12,12 12,14 8,14 8,10 10,10 10,2 2,2 2,10 6,10 6,26 12,26 12,30 20,30 20,22 12,22 12,24.001 8,24    8,16 12,16 12,20  "/></g>
            </svg>
            <span class="text-sm font-medium">Kategori</span>
          </a> 

          <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="{{ route('admin.ulasan') }}"> 
            <svg class="h-6 w-6" data-name="Layer 21" height="24" id="Layer_21" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><title/><rect height="10" width="3" x="2" y="10"/>
              <path d="M19,9H14V4a1,1,0,0,0-1-1H12L7.66473,8.37579A3.00021,3.00021,0,0,0,7,10.259V18a2,2,0,0,0,2,2h6.43481a2.99991,2.99991,0,0,0,2.69037-1.67273L21,12.5V11A2,2,0,0,0,19,9Z"/>
            </svg>
                <span class="ml-2 text-sm font-medium">Ulasan Buku</span> 
              </a> 
            </div>
        </div> 
        
    <a class="flex items-center justify-center px-5 w-64 h-16 mt-auto rounded-md bg-red-500 hover:bg-red-400"
        href="{{ route('admin.logout') }}"> 
        <svg class="text-white w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg> 
        <span class="ml-2 text-sm font-medium text-white">Log Out</span> 
      </a>

</div>
