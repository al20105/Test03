<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '課題管理システム') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <script>
        window.onload = function() {
            $('#TaskShow').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var name = button.data('name');
                var date = button.data('date');
                var time = button.data('time');
                var memo = button.data('memo');
                if (memo=="null") memo = "";
                var tags = button.data('tags').split(',');

                var modal = $(this);
                modal.find('#show-name').text(name);
                modal.find('#show-date').text(date);
                modal.find('#show-time').text(time);
                modal.find('#show-memo').text(memo);

                var ele = document.getElementById("show-tag");
                while( ele.firstChild ) {
                    ele.removeChild( ele.firstChild );
                }

                if (tags[0]!="") {
                    for(var i=0;i<tags.length;i++){
                        var ary=document.createElement("div");
                        ary.setAttribute("type","text");
                        ary.setAttribute("style","display:inline-block; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;");
                        ele.appendChild(ary);
                        var tag=document.createTextNode(tags[i]);
                        ary.appendChild(tag);
                    }
                }
            })


            $('#TaskEdit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var id = button.data('id'); //data-* の値を取得
                var name = button.data('name');
                var date = button.data('date');
                var time = button.data('time');
                var memo = button.data('memo');
                if (memo=="null") memo = "";
                var tags = button.data('tags').split(',');

                var modal = $(this);
                modal.find('.modal-body input#edit-id').val(id);
                modal.find('.modal-body input#edit-name').val(name);
                modal.find('.modal-body input#edit-date').val(date);
                modal.find('.modal-body input#edit-time').val(time);
                modal.find('.modal-body input#edit-memo').val(memo);
                
                var ele = document.getElementById("edit-tag");
                while( ele.firstChild ) {
                    ele.removeChild( ele.firstChild );
                } 

                if (tags[0]!="") {
                    for(var i=0;i<tags.length;i++){
                        var ary=document.createElement("input");
                        ary.setAttribute("class","inputs");
                        ary.setAttribute("type","text");
                        ary.setAttribute("name","tags[]");
                        ary.setAttribute("value",tags[i]);
                        ele.appendChild(ary);
                        var ary=document.createElement("button");
                        ary.setAttribute("class","input_delete_button");
                        ary.setAttribute("type","button");
                        var del = document.createTextNode("削除");
                        ary.appendChild(del);
                        ele.appendChild(ary);
                        var br = document.createElement("br");
                        ele.appendChild(br);
                    }
                }
            })

            $('#TagEdit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tags = button.data('tags').split(',');
                
                var ele = document.getElementById("tag-edit-list");
                while( ele.firstChild ) {
                    ele.removeChild( ele.firstChild );
                } 

                if (tags[0]!="") {
                    for(var i=0;i<tags.length;i++){
                        var ary=document.createElement("div");
                        ary.setAttribute("class","button_wrap");
                        ary.setAttribute("type","text");
                        ary.setAttribute("data-toggle","modal");
                        ary.setAttribute("data-target","#TagUpdate");
                        ary.setAttribute("data-tag",tags[i]);
                        ary.setAttribute("data-dismiss","modal")
                        ele.appendChild(ary);
                        var tag=document.createTextNode(tags[i]);
                        ary.appendChild(tag);
                    }
                } else {
                    var none = document.createTextNode("タグが見つかりませんでした(._.)");
                    ele.appendChild(none);
                }
            })

            $('#TagUpdate').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tag = button.data('tag');

                var modal = $(this);
                modal.find('.modal-body input#modal-tag').val(tag);
                modal.find('#tag-name').text(tag);
            })

            $('#TagDelete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tags = button.data('tags').split(',');
                
                var ele = document.getElementById("tag-delete-list");
                while( ele.firstChild ) {
                    ele.removeChild( ele.firstChild );
                } 

                if (tags[0]!="") {
                    for(var i=0;i<tags.length;i++){
                        var ary=document.createElement("div");
                        ary.setAttribute("class","button_wrap");
                        ary.setAttribute("type","text");
                        ary.setAttribute("data-toggle","modal");
                        ary.setAttribute("data-target","#TagDestroy");
                        ary.setAttribute("data-tag",tags[i]);
                        ele.appendChild(ary);
                        var tag=document.createTextNode(tags[i]);
                        ary.appendChild(tag);
                    }
                } else {
                    var none = document.createTextNode("タグが見つかりませんでした(._.)");
                    ele.appendChild(none);
                }
            })

            $('#TagDestroy').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tag = button.data('tag');

                var modal = $(this);
                modal.find('.modal-body input#modal-tag').val(tag);
                modal.find('#tag-name').text(tag);
            })
        };

        $(function() {
            // 追加ボタンを押されたら、新しい入力欄と削除ボタンを追加
            $(document).on('click', '#input_add_button', function() {
                $(".add_to").last().append(
                '<div><input type="text" class="inputs" name="tags[]"><button class="input_delete_button" type="button">削除</button></div>');        
            });
            $(document).on('click', '#input_add_button_2', function() {
                $(".add_to_2").last().append(
                '<div><input type="text" class="inputs" name="tags[]"><button class="input_delete_button" type="button">削除</button></div>');        
            });
            
            // 削除ボタンを押されたら、自身の親要素(削除ボタンと入力欄)を削除
            $(document).on('click', '.input_delete_button', function() {        
                $(this).parent().remove();       
            });    
        });

        function deletePost(e) {
            // 課題削除確認
            'use strict';
            if(confirm('本当に削除していいですか?')){
                document.getElementById('form_' + e.dataset.id).submit();
            }
        }

    </script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', '課題管理システム') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('form.link.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('form.link.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form id="edit-form" action="{{ route('auth.edit') }}" method="GET">
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <input type="submit" class="dropdown-item" value="アカウント情報編集">
                                    </form>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('form.link.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
