<x-layout>
  
  <x-navbar></x-navbar>

   <!-- alert success -->
   @if (Session::has('success'))
   <x-alertsuccess>
   {{ Session::get('success') }} 
   </x-alertsuccess>
   @endif

  <section class="z-10 py-8 mb-5 font-serif">
    <div class="flex flex-col md:flex-row items-center max-w-6xl px-6 mx-auto">
      <div class="w-full md:w-1/2">
        <h1 class="text-black text-7xl font-semibold leading-none tracking-tighter">
          Welcome to <br><span class="text-[#00264A]">Pustakalaya, <br></span> Library Digital
        </h1>
      </div>
      <div class="w-full md:w-1/2">
        <img src="{{ URL('images/book.png') }}" class="g-image">
      </div>
    </div>
  </section>


</x-layout>

<x-footer></x-footer>