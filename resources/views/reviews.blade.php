<x-layout>

    <x-navbar></x-navbar>

    <!-- component -->
    <div class="mx-10 mb-10 mt-10 md:px-4 md:grid md:grid-cols-2 lg:grid-cols-2 gap-5 space-y-4 md:space-y-5">
      @foreach ($ulasan as $item)
      <div class="bg-white max-w-xl rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
        <img src="{{ url('storage/' . $item->book->foto) }}" class="w-20 h-20 items-center justify-center font-bold text-white">
        <div class="mt-4">
          <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">{{ $item->book->judul }}</h1>
          <div class="flex mt-2">
          {{ $item->rating }}
          </div>
          <p class="mt-4 text-md text-gray-600">{{ $item->ulasan }}</p>
          <div class="flex justify-between items-center">
            <div class="mt-4 flex items-center space-x-4 py-6">
              <div class="">
                <img class="w-12 h-12 rounded-full" src="{{ url('user/' . $item->user->foto) }}" alt="foto" />
              </div>
              <div class="text-sm font-semibold">{{ $item->user->username }}</div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="py-4 px-7">
      {{ $ulasan->links() }}
  </div>

</x-layout>

<x-footer></x-footer>
