<!DOCTYPE html>
<html lang="ja">
<head>
  <title>課題管理システム</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
  <div class="" id="show">
    <h2 class="main_title">課題情報閲覧</h2>
    <div class="content_wrap">
      <h3 class="content_title">課題名</h3>
      <p>{{ $task->name }}</p>
    </div>
    <div class="content_wrap">
      <h3 class="content_title">締め切り時刻</h3>
      <p>{{ $task->date }} {{ $task->time }}</p>
    </div>
    <div class="content_wrap">
      <h3 class="content_title">タグ</h3>
      @foreach($task->tags() as $tag)
        <p>{{ $tag->name }}</p>
      @endforeach
      <p></p>
    </div>
    <div class="content_wrap">
      <h3 class="content_title">詳細</h3>
      <p>{{ $task->memo }}</p>
    </div>

    <div class="next_btn">
      <a href="/tasks" class="save">一覧に戻る</a>
    </div>
  </div>
</body>
</html>