<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span>Список всех категорий</span>
            @foreach ($arrcat as $arrcatval)
                <p>{{$arrcatval->name}}</p>
                <form method="post" action="{{route('deletecat', $arrcatval->id)}}">
                    @method('DELETE')
                    @csrf
                    <input type="text" value="{{$arrcatval->id}}" name="id" hidden>
                    <button type="submit">Удалить категорию</button>
                </form>
            @endforeach

            <form method="POST" action="{{ route('admin.cat') }}">
                @csrf
                <input type="text" placeholder="Название категории" name="namecat" required>
                <button type="submit">Добавить категорию</button>
            </form>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($arr as $ar)
                        <p><a href="{{route('videos', $ar->id)}}">Название:</a>{{$ar->title}}
                            <span>Описание:</span>{{$ar->description}}
                        </p>
                        <img src="{{'image/' . $ar->imageSRC}}" alt="fgh" width="500px">
                        <form method='post' action="{{route('editvideo')}}">
                        <input type="text" value="{{$ar->id}}" hidden name="id_vid">
                        @method('PUT')
                            @csrf
                            <select name="status">
                                <option value="none">без ограничений</option>
                                <option value="breach">нарушение</option>
                                <option value="shadowBan">теневой бан</option>
                                <option value="ban">бан</option>
                            </select>
                            <button type="submit">Отправить</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>