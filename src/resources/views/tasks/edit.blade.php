<!DOCTYPE html>
<html lang="ja">
<head>
  <title>課題管理システム</title>
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

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
      <script>
      $(function() {
          // 追加ボタンを押されたら、新しい入力欄と削除ボタンを追加
          $(document).on('click', '#input_add_button', function() {
              $(".add_to").last().append(
              '<div><input type="text" class="inputs" name="tags[]"><button class="input_delete_button" type="button">削除</button></div>');        
          });
          
          // 削除ボタンを押されたら、自身の親要素(削除ボタンと入力欄)を削除
          $(document).on('click', '.input_delete_button', function() {        
              $(this).parent().remove();       
          });    
      });
      </script>
      
      <button id="input_add_button" type="button">追加</button>    
      <div class="add_to">
          @foreach($tags as $tag)
            <div><input type="text" class="inputs" name="tags[]" value={{ $tag->name }}><button class="input_delete_button" type="button">削除</button></div>         @endforeach
          <input type="text" class="inputs" name="tags[]">
      </div>
    </div>
    <div class="content_wrap">
      <h3 class="content_title">詳細</h3>
      <input type="text" name = "memo" value={{ $task->memo }} class="input_area">
    </div>

    <div class="next_btn">
      <input type="submit" class="cancel" value="キャンセル" name="reject">
      <input type="submit" class="save" value="登録" name="approve">
    </div>
  </form>
</body>
</html>