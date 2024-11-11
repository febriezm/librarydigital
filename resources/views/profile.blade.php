<x-layout>

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

    <div class="bg-gray-200 p-8 mb-10">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div x-data="{ openSettings: false }" class="absolute left-12 mt-4 rounded">
                <button class="border border-gray-400 tracking-wide p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20" title="Settings">
                    <a href="{{ route('account.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12,9.059V6.5c0-0.256-0.098-0.512-0.293-0.708C11.512,5.597,11.256,5.5,11,5.5s-0.512,0.097-0.707,0.292L4,12l6.293,6.207  C10.488,18.402,10.744,18.5,11,18.5s0.512-0.098,0.707-0.293S12,17.755,12,17.5v-2.489c2.75,0.068,5.755,0.566,8,3.989v-1  C20,13.367,16.5,9.557,12,9.059z"></path>
                    </svg>
                </a>
                </button>
            </div>
            <div class="w-full h-[250px]">
                <img src="{{ URL('images/bg.jpg') }}" class="w-full h-full rounded-tl-lg rounded-tr-lg" draggable="false">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <img src="{{ URL('user/' . Auth::user()->foto) }}" class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">{{ Auth::user()->username }}</p>
                    <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </div>
                <p class="text-base text-gray-700">{{ Auth::user()->namalengkap }}</p>
                <p class="text-base text-gray-700">{{ Auth::user()->email }}</p>
                <p class="text-gray-700">{{ Auth::user()->alamat }}</p>
            </div>
        </div>

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <span class="flex justify-between mt-4 p-0">
                        <h4 class="flex justify-start text-xl text-gray-900 font-bold">History Of Borrowed Book's</h4>
                        <button onclick="openModal()" class="bg-[#00264A] hover:bg-[#00264a8c] text-white px-7 py-2 rounded-md font-semibold">
                          <span class="text-base">Return Book</span>
                        </button>
                      </span>
                    <div class="h-full flex w-full justify-center items-center p-2">

                        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-4 md:p-2 xl:p-5">
                    
                            <!-- card  -->
                            <x-koleksi-table :koleksipribadi='$koleksipribadi'></x-koleksi-table>
                            
                        </div>
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
                <p class="text-2xl font-bold">Return Book's</p>
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
                <form action="{{ route('components.koleksi-table') }}" method="post">
                    @csrf
                        <select
                                class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                name="user_id" id="user_id">
                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->username }}</option>
                        </select>
        
                        <select
                                class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                name="book_id" id="book_id" required>
                                <option value="">Select Title Book's</option>
                                @foreach ($koleksipribadi as $koleksi)
                                    <option value="{{ $koleksi->book->id }}">{{ $koleksi->book->judul }}</option>
                                @endforeach
                        </select>
                    
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button type="submit"
                    class="focus:outline-none px-4 bg-[#00264A] p-3 ml-3 rounded-lg text-white hover:bg-[#00264a8c]">Confirm</button>
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