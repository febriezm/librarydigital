<x-layout>

<!--Hero Landing Page-->
<div class="w-screen h-screen overflow-hidden relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:left-0 before:z-10 before:opacity-30">
  <img src="{{ URL('images/pic.jpg') }}" draggable="false" class="absolute top-0 left-0 min-h-full ob" alt="">
  <div class="relative z-20 max-w-screen-lg mx-auto grid grid-cols-12 h-full items-center">
    <div class="col-span-6">
      <span class="uppercase text-white text-xs font-bold mb-2 block">If not now, when will it be</span>
      <h1 class="text-white font-extrabold text-5xl mb-8">Pustakalaya provides various types of books you need</h1>
      <p class="text-stone-100 text-base">
        A website-based digital library that makes it easier for users to borrow a book and of course for free without having to spend money.
      </p>
      <a href="{{ route('account.login') }}">
      <button class="mt-8 text-white uppercase py-4 text-base font-light px-10 border border-white hover:bg-white hover:bg-opacity-10">Get started</button>
    </a>
    </div>
  </div>
</div>


  <form action="" method="get">
    <div class="flex px-7 mt-6 items-center justify-between">
        <div class="w-auto group">
          <select name="namakategori" id="namakategori" class="rounded-md border border-gray-300 py-3 px-3 text-base font-normal text-[#00264A] outline-none focus:border-[#00264A] focus:shadow-md w-full select-multiple">
            <option value="">Select Kategori</option>
            @foreach ($kategoris as $item)
                <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
            @endforeach
          </select>
      </div>
        <!--search bar -->
        <div hidden class="md:block">
            <div class="relative flex items-center text-[#00264A] focus-within:text-[#00264A]">
                <button class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
                <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 35.997 36.004">
                    <path id="Icon_awesome-search" data-name="search" d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z"></path>
                </svg>
                </button>
                <input type="text" name="judul" id="judul" autocomplete="off" placeholder="Search book's title" class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-[#00264A] outline-none border border-gray-300 focus:border-[#00264A] transition">
            </div>
        </div>
    </div>
</form>

    <div class="min-h-screen bg-gradient-to-tr flex justify-center items-center mb-10">
      <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-4 gap-5 space-y-4 md:space-y-5">
        @foreach ($books as $book)
        <div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
          <div class="relative">
            <img src="{{ url('storage/' . $book->foto) }}" class="h-96 w-full object-cover" draggable="false"/>
            <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">{{ $book->th_terbit }}</p>
            <p class="absolute bottom-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-lt-lg rounded-br-lg">
              @foreach ($book->kategoris as $kategori)
                {{ $kategori->namakategori }},
              @endforeach
            </p>
          </div>
          <a href="{{ route('account.login') }}">
          <h1 class="mt-4 text-gray-800 text-xl font-bold cursor-pointer">{{ $book->judul }}</h1>
        </a>
          <div class="my-4">
            <div class="flex space-x-1 items-center">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.1,2.9c-1.1-1.1-3-1.1-4.2,0l-8.1,7.9c-0.7,0.7-1.2,1.6-1.4,2.6L7,15.6c-0.1,0.3,0,0.7,0.3,0.9    c0.2,0.2,0.4,0.3,0.7,0.3c0.1,0,0.1,0,0.2,0l2.2-0.4c1-0.2,1.9-0.7,2.6-1.4L21.1,7C21.7,6.5,22,5.7,22,4.9    C22,4.1,21.7,3.4,21.1,2.9z M11.7,13.5c-0.4,0.4-1,0.7-1.6,0.8l-0.8,0.2l0.2-0.7c0.1-0.6,0.4-1.1,0.9-1.6l6.2-6.1l1.4,1.3    L11.7,13.5z M19.7,5.6L19.3,6l-1.4-1.3l0.4-0.4C18.5,4.1,18.8,4,19,4c0.3,0,0.5,0.1,0.7,0.3C19.9,4.5,20,4.7,20,4.9    C20,5.1,20,5.4,19.7,5.6z"/><path d="M20,9.9c-0.6,0-1,0.4-1,1V16c0,1.7-1.3,3-3,3H8c-1.7,0-3-1.3-3-3V8c0-1.7,1.3-3,3-3h5c0.6,0,1-0.4,1-1s-0.4-1-1-1H8    C5.2,3,3,5.2,3,8v8c0,2.8,2.2,5,5,5h8c2.8,0,5-2.2,5-5v-5.1C21,10.4,20.6,9.9,20,9.9z" />
                </svg>
              </span>
              <p>{{ $book->penulis }}</p>
            </div>
            <div class="flex space-x-1 items-center">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </span>
              <p>{{ $book->penerbit }}</p>
            </div>
             <div class="flex space-x-1 justify-end">
              <p class="text-base font-medium {{ $book->status == 'In stock' ? 'text-green-500' : 'text-red-500' }}">{{ $book->status }}</p> 
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
   
<x-footer></x-footer>

</x-layout>