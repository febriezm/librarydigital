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

           <div class="flex px-7 mt-3 mb-3 items-center justify-end">
            <a href="{{ route('peminjaman.cetak') }}" target="_blank">
                <button class="bg-[#00264A] hover:bg-[#00264a8c] text-white px-7 py-2 rounded-md font-semibold">Print Data</button>
            </a>
        </div>

          <x-peminjaman-table :peminjaman='$peminjaman'></x-peminjaman-table>
          
      </div>
    </div>
  
  </x-layout>
  