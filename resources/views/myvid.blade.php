<x-app-layout>



    @foreach ($arr as $ar)
        <div>
            <p><a>Название:</a>{{$ar->title}} <span>Описание:</span>{{$ar->description}} Канал:{{$name}}
                Категория:{{$category_name}}</p>
            <video width="800" controls="controls">
                <source src="{{asset('storage/video') . '/' . $ar->videoSRC}}"
                    type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            </video>
            @if(Auth::check())
                <span>Лайки</span>
                <span>{{$likes}}</span>
                <span>Дизлайки</span>
                <span>{{$dislike}}</span>

            @endif
            <p>Изменение данных</p>

            <form action="{{'myvid' . $ar->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{$ar->id}}" hidden name="id">
                <p>Название</p>
                <input type="text" name="name" placeholder="Название" required maxlength="255" value="{{$ar->title}}">
                <p>Описание</p>
                <input type="text" name="desc" placeholder="Описание" maxlength="255" value="{{$ar->description}}">
                <p>Файл видео</p>
                <input type="file" name="vid" required>
                <p>Файл превью</p>
                <input type="file" name="img" required>
                <p>Выберите категорию</p>
                <select name="category">
                    @foreach ($catarr as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit">Обновить</button>
            </form>


        </div>
    @endforeach
</x-app-layout>