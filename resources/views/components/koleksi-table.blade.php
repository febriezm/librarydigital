<!-- card  -->
@foreach ($koleksipribadi as $koleksi)
<div
    class="relative min-h-auto bg-white border rounded-lg shadow-lg dark:bg-[#00264A] dark:border-[#00264a8c] transform transition duration-500 hover:scale-105">
    <div class="absolute top-3 right-3 rounded-full bg-[#00264A] text-white  w-6 h-6 text-center">
        {{ $loop->iteration }}
    </div>
    <div class="p-2 flex justify-center">
        <a href="#">
            <img class="rounded-md h-96" draggable="false"
            src="{{ url('storage/' . $koleksi->book->foto) }}"
            loading="lazy">
        </a>
    </div>
    <div class="px-4 pb-3">
        <div>
            <p class="antialiased text-gray-600 dark:text-gray-400 text-sm break-all">
                {{ $koleksi->user->username }}
             </p>

            <a href="{{ route('account.books') }}">
                <h5
                    class="text-xl font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 text-gray-900 dark:text-white ">
                    {{ $koleksi->book->judul }}
                </h5>
            </a>
            <div class="mt-6 mb-2 p-0">
                <button onclick="openModal()" class="w-full p-1 border rounded-lg flex justify-center items-center font-bold cursor-pointer hover:underline">
                  <span class="text-base text-white">Return</span>
                </button>
              </div>
            
        </div>
    </div>
</div>
@endforeach

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