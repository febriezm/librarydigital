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

           @if (Session::has('error'))
                <x-alerterror>
                    {{ Session::get('error') }}
                </x-alerterror>
            @endif

           <div class="flex px-7 mt-3 mb-3 items-center justify-between">
            <h2 class="font-bold text-xl ml-6 mb-3 mt-5">Kategori Buku</h2>
                <button onclick="openModal()" class="bg-green-500 hover:bg-green-400 text-white px-7 py-2 rounded-md font-semibold">Add</button>
        </div>

            <div class="mt-5 mx-5 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 border-b border-gray-600">
                        <th class="px-2 py-3">No.</th>
                        <th class="px-4 py-3">Nama Kategori</th>
                        <th class="px-4 py-3">Action</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      @foreach ($kategoribukus as $kategoribuku)
                      <tr class="text-gray-700 text-center">
                        <td class="text-sm border">{{ $loop->iteration }}</td>
                        <td class="text-ms font-semibold border">{{ $kategoribuku->namakategori }}</td>
                        <td class="text-sm border">
                            <form action="{{ route('kategori.destroy', $kategoribuku) }}" method="post"
                            class="gap-8 mt-2">
                            @method('delete')
                            @csrf
                            <button type="submit" class="text-white px-7 py-2 rounded-md font-semibold">
                              <svg class="text-red-500" height="18px" version="1.1" viewBox="0 0 14 18" width="14px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-299.000000, -129.000000)"><g id="delete" transform="translate(299.000000, 129.000000)">
                                <path d="M1,16 C1,17.1 1.9,18 3,18 L11,18 C12.1,18 13,17.1 13,16 L13,4 L1,4 L1,16 L1,16 Z M14,1 L10.5,1 L9.5,0 L4.5,0 L3.5,1 L0,1 L0,3 L14,3 L14,1 L14,1 Z" id="Shape"/></g></g></g>
                              </svg>
                            </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
           
      </div>
    </div>

    <!--Modal-->

<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
style="background: rgba(0,0,0,.7);">
<div
    class="border border-[#00264a8c] modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
    <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Add Category Book's</p>
            <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
        </div>
        <!--Body-->
        <div class="my-5">
            <form enctype="multipart/form-data" action="{{ route('kategori.store') }}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="namakategori" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nama Kategori
                    </label>
                    <input type="text" name="namakategori" id="namakategori" placeholder="Nama Kategori"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                
        </div>
        <!--Footer-->
        <div>
            <button
                class="hover:shadow-form rounded-md bg-green-500 hover:bg-green-400 py-3 px-8 text-base font-semibold text-white outline-none">
                Submit
            </button>
        </div>
    </form>
    </div>
</div>
</div>

<!-- component -->
<style>
.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}

.animated.faster {
    -webkit-animation-duration: 500ms;
    animation-duration: 500ms;
}

.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
}

.fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }

    to {
        opacity: 0;
    }
}
</style>

<script>
const modal = document.querySelector('.main-modal');
const closeButton = document.querySelectorAll('.modal-close');

const modalClose = () => {
    modal.classList.remove('fadeIn');
    modal.classList.add('fadeOut');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 500);
}

const openModal = () => {
    modal.classList.remove('fadeOut');
    modal.classList.add('fadeIn');
    modal.style.display = 'flex';
}

for (let i = 0; i < closeButton.length; i++) {

    const elements = closeButton[i];

    elements.onclick = (e) => modalClose();

    modal.style.display = 'none';

    window.onclick = function (event) {
        if (event.target == modal) modalClose();
    }
}
</script>
  
  </x-layout>
  