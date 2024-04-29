<button type="button" @click="open = false" x-data='{open: true}' x-show="open" x-transition.duration.300ms
        class="fixed right-4 top-4 z-50 rounded-md bg-red-500 px-4 py-2 text-white transition hover:bg-red-600">
    {{--    <div class="flex items-center space-x-2">--}}
    {{--        <span class="text-3xl"><i class="bx bx-check"></i></span>--}}
    <p class="font-bold">{{$message}}</p>
    {{--    </div>--}}
</button>
