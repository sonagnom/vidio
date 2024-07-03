<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @foreach ($arr as $ar)
                    <p><a href="{{route('myvid', $ar->id)}}">Название:</a>{{$ar->title}} <span>Описание:</span>{{$ar->description}}</p>
                    <p><span>Дата добавления:</span>{{$ar->created_at}} <span>Категории:</span>{{$ar->name}}</p>
                    <img src="{{'image' . '/' . $ar->imageSRC}}" alt="fgh" width="500px">
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
