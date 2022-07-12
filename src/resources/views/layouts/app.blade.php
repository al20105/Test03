<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--

    /*******************************************************************
    ***  File Name        : app.blade.php
    ***  Version        : V1.0
    ***  Designer        : 平佐 竜也
    ***  Date            : 2022.07.04
    ***  Purpose           : 一覧表示処理の継承用の関数等。
    ***
    *******************************************************************/
    /*
    *** Revision :
    *** V1.0 : 平佐 竜也, 2022.07.04
    */
    
    -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- 左上のtitle -->
    <title>{{ config('app.name', '課題管理システム') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <script>
        window.onload = function() // ウィンドウが読みこまれた時
        {
            $('#TaskShow').on('show.bs.modal', function (event) // 課題詳細表示のモーダルが呼び出された時
            {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var name = button.data('name'); // 課題名
                var date = button.data('date'); // 締め切り日
                var time = button.data('time'); // 締め切り時間
                var memo = button.data('memo'); // 詳細情報
                if (memo=="null") // memoが"null"の場合(エラー回避用)
                {
                    memo = "" // nullを代入
                };
                var tags = button.data('tags').split(','); // ,区切りの文字列からタグ名の配列を生成
                var modal = $(this); // 呼び出されたモーダルを取得
                modal.find('#show-name').text(name); // show-*に代入
                modal.find('#show-date').text(date);
                modal.find('#show-time').text(time);
                modal.find('#show-memo').text(memo);

                var ele = document.getElementById("show-tag"); // idを持つエレメントを取得(ここでは<div></div>)
                while( ele.firstChild ) // エレメントを初期化
                {
                    ele.removeChild( ele.firstChild );
                }

                if (tags[0]!="") // tagsがnullでない
                {
                    for(var i=0; i<tags.length; i++) // tagsをループ
                    {
                        var ary = document.createElement("div"); // <div></div>のノードを生成
                        ary.setAttribute("type","text"); // typeをtextに指定
                        ary.setAttribute("style","display:inline-block; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;"); // デザインを設定
                        ele.appendChild(ary); // エレメントの子ノードに設定
                        var tag = document.createTextNode(tags[i]); // タグのノードを生成
                        ary.appendChild(tag); // タグを更なる子ノードに設定
                    }
                }
            })


            $('#TaskEdit').on('show.bs.modal', function (event) // 課題編集のモーダルが呼び出された時
            {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var id = button.data('id'); // 課題id
                var name = button.data('name'); // 課題名
                var date = button.data('date'); // 締め切り日
                var time = button.data('time'); // 締め切り時間
                var memo = button.data('memo'); // 詳細情報
                if (memo=="null") // memoが"null"のときnullにする(エラー回避用)
                {
                    memo = "";
                }
                var tags = button.data('tags').split(','); // ,区切りの文章からタグの配列を生成

                var modal = $(this); // 呼び出されたモーダルを取得
                modal.find('.modal-body input#edit-id').val(id); // 課題idをinputタグに代入
                modal.find('.modal-body input#edit-name').val(name); // 課題名をinputタグに代入
                modal.find('.modal-body input#edit-date').val(date); // 締め切り日をinputタグに代入
                modal.find('.modal-body input#edit-time').val(time); // 締め切り時間をinputタグに代入
                modal.find('.modal-body input#edit-memo').val(memo); // 詳細情報をinputタグに代入
                
                var ele = document.getElementById("edit-tag"); // エレメントを取得
                while( ele.firstChild ) // エレメントを初期化
                {
                    ele.removeChild( ele.firstChild );
                } 

                if (tags[0]!="") // タグ群がnullでない
                {
                    for(var i=0; i<tags.length; i++) // タグ群をループ
                    {
                        var ary=document.createElement("input"); // inputフォームを生成
                        ary.setAttribute("class","inputs"); // classをinputsに設定
                        ary.setAttribute("type","text"); // typeを文章に設定
                        ary.setAttribute("name","tags[]"); // nameをtags[]に設定
                        ary.setAttribute("value",tags[i]); // 値をタグ名に設定
                        ele.appendChild(ary); // エレメントの子ノードに設定
                        var ary=document.createElement("button"); // 削除ボタンを生成
                        ary.setAttribute("class","input_delete_button"); // classを設定
                        ary.setAttribute("type","button"); // typeをボタンに設定
                        var del = document.createTextNode("削除"); // 「削除」のノードを生成
                        ary.appendChild(del); // 更なる子ノードに設定(<button>削除</button>)
                        ele.appendChild(ary); // エレメントの子ノードに設定
                        var br = document.createElement("br"); // 改行
                        ele.appendChild(br); // エレメントの子ノードに設定(~</button><br><input>~)
                    }
                }
            })

            $('#TagEdit').on('show.bs.modal', function (event) // タグ編集一覧のモーダルが呼び出された時
            {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tags = button.data('tags').split(','); // ,区切りの文章からタグの配列を生成
                var ele = document.getElementById("tag-edit-list"); // エレメントを取得
                while( ele.firstChild ) // エレメントを初期化
                {
                    ele.removeChild( ele.firstChild );
                } 

                if (tags[0]!="") // タグ群がnullでない
                {
                    for(var i=0; i<tags.length; i++) // タグ群をループ
                    {
                        var ary=document.createElement("div"); // <div></div>を生成
                        ary.setAttribute("class","button_wrap"); // classをボタンに設定
                        ary.setAttribute("type","text"); // typeを文章に設定
                        ary.setAttribute("data-toggle","modal"); // 呼び出されるものをモーダルに設定
                        ary.setAttribute("data-target","#TagUpdate"); // 呼び出されるモーダルのidを設定
                        ary.setAttribute("data-tag",tags[i]); // タグを代入
                        ary.setAttribute("data-dismiss","modal") //モーダルを閉じる
                        ele.appendChild(ary); // エレメントの子ノードに設定
                        var tag=document.createTextNode(tags[i]); // タグ名のノードを生成
                        ary.appendChild(tag); // 更なる子ノードに設定
                    }
                }
                else
                {
                    var none = document.createTextNode("タグが見つかりませんでした(._.)"); // タグ群がnull
                    ele.appendChild(none);
                }
            })

            $('#TagUpdate').on('show.bs.modal', function (event) // タグ編集のモーダルが呼び出された時
            {
                var button = $(event.relatedTarget); // モーダルを呼び出すときに使われたボタンを取得
                var tag = button.data('tag'); // タグを取得
                var modal = $(this); // 呼び出されたモーダルを取得
                modal.find('.modal-body input#modal-tag').val(tag); // タグ名を代入 
                modal.find('#tag-name').text(tag); // タグ名を表示
            })

            $('#TagDelete').on('show.bs.modal', function (event) // タグ削除確認のモーダルが呼び出された時
            {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tags = button.data('tags').split(','); // ,区切りの文字列からタグ名の配列を生成
                var ele = document.getElementById("tag-delete-list"); // エレメントを取得
                while( ele.firstChild ) // エレメントを初期化
                {
                    ele.removeChild( ele.firstChild );
                } 

                if (tags[0]!="") //タグ群がnullでない
                {
                    for(var i=0;i<tags.length;i++) //タグの配列をループ
                    {
                        var ary=document.createElement("div"); // <div></div>を生成
                        ary.setAttribute("class","button_wrap"); // classをボタンに設定
                        ary.setAttribute("type","text"); // typeを文章に設定
                        ary.setAttribute("data-toggle","modal"); // 呼び出されるものをモーダルに設定
                        ary.setAttribute("data-target","#TagDestroy"); // 呼び出されるモーダルのidを設定
                        ary.setAttribute("data-tag",tags[i]); // タグを代入
                        ary.setAttribute("data-dismiss","modal") //モーダルを閉じる
                        ele.appendChild(ary); // エレメントの子ノードに設定
                        var tag=document.createTextNode(tags[i]); // タグ名のノードを生成
                        ary.appendChild(tag); // 更なる子ノードに設定
                    }
                }
                else
                {
                    var none = document.createTextNode("タグが見つかりませんでした(._.)"); // タグ群がnull
                    ele.appendChild(none);
                }
            })

            $('#TagDestroy').on('show.bs.modal', function (event) // タグ削除のモーダルが呼び出された時
            {
                var button = $(event.relatedTarget); //モーダルを呼び出すときに使われたボタンを取得
                var tag = button.data('tag'); // タグを取得
                var modal = $(this); // 呼び出されたモーダルを取得
                modal.find('.modal-body input#modal-tag').val(tag); // inputタグにタグを代入
                modal.find('#tag-name').text(tag); // タグの名前を表示
            })
        };

        $(function()
        {
            $(document).on('click', '#input_add_button', function() // 追加ボタンを押されたら、新しい入力欄と削除ボタンを追加
            {
                $(".add_to").last().append('<div><input type="text" class="inputs" name="tags[]"><button class="input_delete_button" type="button">削除</button></div>');        
            });
            $(document).on('click', '#input_add_button_2', function() // 追加ボタンを押されたら、新しい入力欄と削除ボタンを追加
            {
                $(".add_to_2").last().append('<div><input type="text" class="inputs" name="tags[]"><button class="input_delete_button" type="button">削除</button></div>');        
            });
            $(document).on('click', '.input_delete_button', function() // 削除ボタンを押されたら、自身の親要素(削除ボタンと入力欄)を削除
            {        
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
    <!-- 上のメニューバー -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
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
