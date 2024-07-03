<x-app-layout>
    <form action="{{route('pushvideos')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Название</p>
        <input type="text" name="name" placeholder="Название" required maxlength="255">
        <p>Описание</p>
        <input type="text" name="desc" placeholder="Описание" maxlength="255">
        <p>Файл видео</p>
        <input type="file" name="video" required>
        <p>Файл превью</p>
        <input type="file" name="image" required>
        <p>Выберите категорию</p>
        <select name="category">
             @foreach ($catarr as $value)
             <option value="{{$value->id}}">{{$value->name}}</option>
             @endforeach
        </select>
        <br>
        <button type="submit">Добавить</button>
    </form>
    </x-app-layout>