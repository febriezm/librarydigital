<x-layout>
  
  <x-navbar></x-navbar>

   <!-- alert success -->
   @if (Session::has('success'))
   <x-alertsuccess>
   {{ Session::get('success') }} 
   </x-alertsuccess>
   @endif

   <div class="w-full h-auto bg-no-repeat bg-cover bg-center bg-[url('https://assets3.thrillist.com/v1/image/3125034/1200x600/scale;;webp=auto;jpeg_quality=85.jpg')]">
   <div class="w-[90%] mx-auto h-full flex items-center justify-between py-10">
       <div class="lg:w-fit">
           <div
               class="sm:text-6xl xs:text-5xl text-left text-white font-serif font-extrabold">
               <h1>Get</h1>
               <h1>In</h1>
               <h1 class="bg-black/30 text-white rounded-sm px-1 shadow-sm shadow-white/50">Knowledge</h1>
               <h1>Today</h1>
           </div>
       </div>

       <div>
           <ul class="text-3xl text-white">
            <a href="https://github.com/febriezm" target="_blank">
               <li class="flex justify-center items-center p-1 bg-black/40 rounded-full">
                   <ion-icon name="logo-github"></ion-icon>
               </li>
              </a>
              <a href="#">
               <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                   <ion-icon name="logo-linkedin"></ion-icon>
               </li>
              </a>
              <a href="#">
                <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                    <ion-icon name="logo-twitter"></ion-icon>
                    </ion-icon>
                </li>
               </a>
               <a href="https://www.facebook.com/profile.php?id=100010023106891" target="_blank">
                <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                    <ion-icon name="logo-facebook"></ion-icon>
                    </ion-icon>
                </li>
               </a>
              <a href="https://www.instagram.com/febriezm_" target="_blank">
               <li class="flex justify-center items-center p-1 bg-black/40 rounded-full mt-2">
                   <ion-icon name="logo-instagram"></ion-icon>
                   </ion-icon>
               </li>
              </a>
           </ul>
       </div>
   </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</x-layout>

<x-footer></x-footer>