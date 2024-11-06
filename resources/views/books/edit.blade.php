<x-layout>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
            <h2 class="font-bold text-xl">Edit Books</h2>

            <form action="{{ route('books.destroy', $books) }}" method="post"
            class="flex gap-8 mt-5">
            @method('delete')
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-400 text-white px-7 py-2 rounded-md font-semibold">Delete</button>
            </form>

        </div>

        <div class="mt-4 px-7" x-data="{ imageUrl: '/storage/{{ $books->foto }}' }">
            <form enctype="multipart/form-data" action="{{ route('books.update', $books) }}" method="post"
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
                        <input accept="image/*" value="{{ old('foto', $books->foto) }}" type="file" name="foto"
                            id="foto" placeholder="Picure"
                            class="@error('foto') is-invalid @enderror py-3 px-6 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] w-full"
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        @error('foto')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="judul" class="mb-2 block text-base font-medium text-[#07074D]">
                            Judul
                        </label>
                        <input value="{{ old('judul', $books->judul) }}" type="text" name="judul" id="judul"
                            placeholder="Judul"
                            class="@error('judul') is-invalid @enderror rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full"
                            required />
                        @error('judul')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="penulis" class="mb-2 block text-base font-medium text-[#07074D]">
                            Penulis
                        </label>
                        <input value="{{ old('penulis', $books->penulis) }}" type="text" name="penulis" id="penulis"
                            placeholder="Penulis"
                            class="@error('penulis') is-invalid @enderror rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full"
                            required />
                        @error('penulis')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="penerbit" class="mb-2 block text-base font-medium text-[#07074D]">
                            Penerbit
                        </label>
                        <input value="{{ old('penerbit', $books->penerbit) }}" type="text" name="penerbit" id="penerbit"
                            placeholder="Penerbit"
                            class="@error('penerbit') is-invalid @enderror rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full"
                            required />
                        @error('penerbit')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="th_terbit" class="mb-2 block text-base font-medium text-[#07074D]">
                            Tahun Terbit
                        </label>
                        <input value="{{ old('th_terbit', $books->th_terbit) }}" type="number" name="th_terbit" id="th_terbit"
                            placeholder="Tahun Terbit"
                            class="@error('th_terbit') is-invalid @enderror rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full"
                            required />
                        @error('th_terbit')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="currentKategori" class="mb-2 block text-base font-medium text-[#07074D]">
                           Current Kategori
                        </label>
                        <h1 class="rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full">
                            @foreach ($books->kategoris as $kategori)
                                {{ $kategori->namakategori }},
                            @endforeach
                        </h1>
                    </div>

                    <div class="mb-5">
                        <label for="kategoris" class="mb-2 block text-base font-medium text-[#07074D]">
                            Kategori Buku
                        </label>
                        <select name="kategoris[]" id="kategoris"
                            placeholder="Kategori Buku" multiple='multiple'
                            class="rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full select-multiple">
                        @foreach ($kategoris as $item)
                        <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
                        @endforeach
                        </select>
                    </div>

                        <button
                            class="hover:shadow-form w-full rounded-md bg-green-500 hover:bg-green-400 py-3 px-8 text-base font-semibold text-white outline-none">
                            Update
                        </button>

                            <a class="flex justify-center mt-3 mb-10 tracking-wide hover:shadow-form border border-green-500 w-full rounded-md bg-gray-100 hover:bg-gray-200 py-3 px-8 text-base font-semibold text-black outline-black" href="{{ route('books.bookdata') }}">
                                Back
                            </a>

            </form>
        </div>
    </div>
  
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
  </script>
  
  </x-layout>
  