<!DOCTYPE html>
<html lang="ja">
<head>
  <title>課題管理システム</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
  <h1>EDIT ページ</h1>

  <form action="{{ route('task.update' ) }}" method="post" enctype='multipart/form-data' id="create">
    @csrf
    <h2 class="main_title">課題情報編集</h2>

    <input type="hidden" name="id" value={{ $task->id }}>
    <div class="content_wrap">
      <h3 class="content_title">課題名</h3>
      <input type="text" name="name" value={{ $task->name }} class="input_area">
    </div>
    <div class="content_wrap">
      <h3 class="content_title">締め切り時刻</h3>
      <input type="date" name = "date" class="input_area" value={{ $task->date }}>
      <input type="time" name = "time" class="input_area" value={{ date('H:i' ,strtotime($task->time)) }}>
    </div>
    <div class="content_wrap">
      <h3 class="content_title">タグ追加</h3>
      <p>選択されたタグ</p>
      <input type="text" name = "tag" value="情報セキュリティ" class="input_area">
    </div>
    <div class="content_wrap">
      <h3 class="content_title">詳細</h3>
      <input type="text" name = "memo" value={{ $task->memo }} class="input_area">
    </div>

    <div class="next_btn">
      <input type="submit" class="cancel" value="キャンセル">
      <input type="submit" class="save" value="編集">
    </div>
  </form>
</body>
</html>