<button type="button" @click="open = false" x-data='{open: true}' x-show="open" x-transition.duration.300ms
        class="absolute right-4 bottom-11 z-50 rounded-md px-4 py-2 text-black shadow bg-white  transition hover:bg-gray-100">
    <div class="flex items-center space-x-2">
        <img width="20" height="20" src="https://img.icons8.com/material-two-tone/24/info-popup.png" alt="info-popup"
             class="opacity-70"/>
        <p class="font-bold mb-0">{{$message}}</p>
    </div>
</button>
