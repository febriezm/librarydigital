<x-layout>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
        <div class="flex h-full">
      
             <!-- sidebar -->
        <div
        class="ml-[-100%] fixed z-10 top-0 pb-3 px-2 w-full shadow-md flex flex-col justify-between h-screen border-r text-gray-700 bg-gray-100 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">

        <div class="flex items-center w-full px-3 mt-3" href="#"> <img src="{{ URL('images/log.png') }}"
                class="h-16 mr-2" alt="Logo"> <span
                class="text-black self-center text-md font-bold whitespace-nowrap">Petugas</span>
        </div>
        <div class="w-full px-2">
            <div class="flex flex-col items-center w-full mt-3 border-t border-gray-300">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300"
                    href="{{ route('petugas.dashboard') }}">
                    <svg class="h-6 w-6" height="24" viewBox="0 0 24 24" width="24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Dasboard</span>
                </a>

                <a class="flex items-center w-full h-12 px-3 mt-2 hover:bg-gray-300 rounded" href="{{ route('petugas.buku') }}">
                    <svg class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 4H5a1 1 0 1 1 0-2h11V1a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1h-7v8l-2-2-2 2V4z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Data Buku</span>
                </a>

                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="{{ route('petugas.peminjaman') }}">
                    <svg class="h-6 w-6" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M559.7 392.2l-135.1 99.51C406.9 504.8 385 512 362.1 512H15.1c-8.749 0-15.1-7.246-15.1-15.99l0-95.99c0-8.748 7.25-16.02 15.1-16.02l55.37 .0238l46.5-37.74c20.1-16.1 47.12-26.25 74.12-26.25h159.1c19.5 0 34.87 17.37 31.62 37.37c-2.625 15.75-17.37 26.62-33.37 26.62H271.1c-8.749 0-15.1 7.249-15.1 15.1s7.25 15.1 15.1 15.1h120.6l119.7-88.17c17.8-13.19 42.81-9.342 55.93 8.467C581.3 354.1 577.5 379.1 559.7 392.2z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Data Peminjaman</span>
                </a>
            </div>
        </div>

        <div class="flex flex-col items-center w-full mt-2 border-t border-gray-300"> 
            <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="{{ route('petugas.jenis') }}"> 
              <svg enable-background="new 0 0 32 32" height="32px" id="svg2" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="category"><polygon points="20,20 20,12 12,12 12,14 8,14 8,10 10,10 10,2 2,2 2,10 6,10 6,26 12,26 12,30 20,30 20,22 12,22 12,24.001 8,24    8,16 12,16 12,20  "/></g>
              </svg>
              <span class="text-sm font-medium">Kategori Buku</span>
            </a> 
              </div>

        <a class="flex items-center justify-center px-5 w-64 h-16 mt-auto rounded-md bg-red-500 hover:bg-red-400"
            href="{{ route('petugas.logout') }}">
            <svg class="text-white w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-2 text-sm font-medium text-white">Log Out</span>
        </a>

    </div>
      
          <!-- Main content -->
          <div class="h-full ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
              
            <div class="sticky shadow-sm z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="px-5 flex items-center justify-between space-x-4 2xl:container">
                    <div class="text-2xl font-bold flex items-center lg:ml-2.5">
                        <span class="text-[#00264A] mt-1 self-center whitespace-nowrap">Pustakalaya.com</span>
                    </div>
                </div>
            </div>
      
               <div class="flex px-7 mt-5 items-center justify-between">
                <h2 class="font-semibold text-xl">Add Books</h2>
            </div>
    
            <div class="mt-4 px-7" x-data="{ imageUrl: '/storage/noimage.png' }">
                <form enctype="multipart/form-data" action="{{ route('petugas.store') }}" method="post"
                    class="flex gap-8">
                    @csrf
    
                    <div class="w-1/2 mb-10">
                        <img :src="imageUrl" class="rounded-md w-full h-full" />
                    </div>
    
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="foto" class="mb-2 block text-base font-medium text-[#07074D]">
                                Picture
                            </label>
                            <input accept="image/*" value="{{ old('foto') }}" type="file" name="foto"
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
                            <input value="{{ old('judul') }}" type="text" name="judul" id="judul"
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
                            <input value="{{ old('penulis') }}" type="text" name="penulis" id="penulis"
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
                            <input value="{{ old('penerbit') }}" type="text" name="penerbit" id="penerbit"
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
                            <input value="{{ old('th_terbit') }}" type="number" name="th_terbit" id="th_terbit"
                                placeholder="Tahun Terbit"
                                class="@error('th_terbit') is-invalid @enderror rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full"
                                required />
                            @error('th_terbit')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="mb-5">
                            <label for="kategoris" class="mb-2 block text-base font-medium text-[#07074D]">
                                Kategori Buku
                            </label>
                            <select name="kategoris[]" id="kategoris"
                                placeholder="Kategori Buku" multiple='multiple'
                                class="rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md w-full select-multiple" required>
                            @foreach ($kategoris as $item)
                            <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
                            @endforeach
                            </select>
                        </div>
    
                            <button
                                class="hover:shadow-form w-full rounded-md bg-green-500 hover:bg-green-400 py-3 px-8 text-base font-semibold text-white outline-none">
                                Submit
                            </button>
    
                                <a class="flex justify-center tracking-wide mt-3 mb-10 hover:shadow-form border border-green-500 w-full rounded-md bg-gray-100 hover:bg-gray-200 py-3 px-8 text-base font-semibold text-black outline-black" href="{{ route('petugas.buku') }}">
                                    Back
                                </a>
    
                </form>
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
      