<x-app-layout>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-4 gap-4">
                @foreach ($arr as $ar)
                <div>
                    
                <a href="{{route('videos', $ar->id)}}" class='text-sm sm:text-lg'> {{$ar->title}}</a> <br>
               
                    <img src="{{'image' . '/' . $ar->imageSRC}}" alt="fgh" width="500px" class='rounded-xl'>
                    <a href="{{route('videos', $ar->id)}}" class='text-sm sm:text-lg'>Описание: {{$ar->description}}</a>
                </div>
                
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
