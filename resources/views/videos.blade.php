<x-app-layout>








<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @foreach ($arr as $ar)
        <div>
            <p><a>Название:</a>{{$ar->title}} <span>Описание:</span>{{$ar->description}} Канал:{{$name}}
                Категория:{{$category_name}}</p>
            <p>{{$time}}</p>

            <video width="800" controls="controls" class='rounded-xl'>
                <source src="{{asset('video') . '/' . $ar->videoSRC}}"
                    type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            </video>
            @if(Auth::check())
                <form method="post" action="{{route('like')}}">
                    @csrf
                    <input type="text" value="{{$ar->id}}" name="id_like" hidden>
                    <button type="submit">Лайк</button>
                    <span>{{$likes}}</span>
                </form>

                <form method='post' action="{{route('dislike')}}">
                    @csrf
                    <input type="text" value="{{$ar->id}}" hidden name="id_dislike">
                    <button type="submit">Дизлайк</button>
                    <span>{{$dislike}}</span>
                </form>

                <form method='post' action="{{route('comments')}}">
                    @csrf
                    <input type="text" value="{{$ar->id}}" hidden name="video_id">
                    <span>Оставьте комментарий</span>
                    <textarea name="text" required maxlength="255"></textarea>
                    <button>Отпрваить</button>
                </form>
            @endif

            <div>
                <span>Комментарии</span>
                @foreach ($comments as $comment)
                    <div>
                        <div class="w-[800px] text-1xl break-words">{{$comment->name}}:{{$comment->text}}</div>
                        @if (Auth::check())
                            @if ($comment->user_id == Auth::user()->id)


                                <div class="inline-flex">
                                    <div>
                                        <x-dropdown align="left" width="30">
                                            <x-slot name="trigger">
                                                <button>
                                                    <div class="ms-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <form method="post" action="{{route('editcomment')}}">
                                                    @csrf
                                                    <input type="text" value="{{$comment->id}}" name="editid" hidden>
                                                    <input type="text" value="{{$comment->text}}" name="editcom">
                                                    <button type="submit">Редактировать</button>
                                                </form>

                                                <form action="{{route('deletecomment')}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="text" value="{{$comment->id}}" name="editid" hidden>
                                                    <button type="submit">Удалить</button>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                </div>



                            @endif
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
                </div>
            </div>
        </div>
    </div>


















   
</x-app-layout>