@extends('layouts.app')

@section('content')
<?php
//タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

//前月・次月リンクが選択された場合は、GETパラメーターから年月を取得
if(isset($_GET['ym'])){ 
    $ym = $_GET['ym'];
}else{
    //今月の年月を表示
    $ym = date('Y-m');
}
//タグのクエリパラメータを取得
if(isset($_GET['tag'])){ 
    $tag_set = $_GET['tag'];
}
//タグのクエリパラメータの生成
if (isset($tag_set)) {
  $tag_que = "&tag=$tag_set";
} else {
  $tag_que = "";
}

//タイムスタンプ（どの時刻を基準にするか）を作成し、フォーマットをチェックする
//strtotime('Y-m-01')
$timestamp = strtotime($ym . '-01'); 
if($timestamp === false){//エラー対策として形式チェックを追加
    //falseが返ってきた時は、現在の年月・タイムスタンプを取得
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

//今月の日付　フォーマット　例）2020-10-2
$today = date('Y-m-j');

//カレンダーのタイトルを作成　例）2020年10月
$html_title = date('Y年n月', $timestamp);//date(表示する内容,基準)

//前月・次月の年月を取得
//strtotime(,基準)
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

//該当月の日数を取得
$day_count = date('t', $timestamp);

//１日が何曜日か
$youbi = date('w', $timestamp);

//カレンダー作成の準備
$calendar = [];
$week = '';
$tw = '';

//第１週目：空のセルを追加
//str_repeat(文字列, 反復回数)
$week .= str_repeat('<td></td>', $youbi);
$tw .= str_repeat('<td></td>', $youbi);

for($day = 1; $day <= $day_count; $day++, $youbi++){
    $date = $ym . '-' . $day; //2020-00-00
    $date = date('Y-m-d', strtotime($date));
    if($today == $date){
        $week .= '<td class="today">' . $day;//今日の場合はclassにtodayをつける
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    $day_task = array();
    foreach($tasks as $task){
      if(in_array($date, $task->toArray())){
        array_push($day_task, $task);
      }
    }
    array_multisort( array_map( "strtotime", array_column( $day_task, "time" ) ), SORT_ASC, $day_task ) ;

    $tw .= '<td>';
    if(count($day_task) != 0){
      $cnt = 0; //カウンタ
      foreach ($day_task as $task) {
        if($cnt != 0){
          $tw .= '<br>';
        }
        $data_tags = array();
        foreach ($task->tags as $tag) {
          $data_tags[] = $tag->name;
        }
        if ($task->memo==null) $task->memo="null";
        $data_tags = implode(',', $data_tags);
        $tw .= "<button type='button' class='btn show' data-toggle='modal' data-target='#TaskShow'
                  data-name=$task->name 
                  data-date=$task->date 
                  data-time=$task->time 
                  data-memo=$task->memo 
                  data-tags=$data_tags>".$task['name'].
                "</button>";
        $tw .= '<br>' . date('H:i' ,strtotime($task['time']));
        $cnt++;
      }
    }
    $tw .= '</td>';

    if($youbi % 7 == 6 || $day == $day_count){//週終わり、月終わりの場合
        //%は余りを求める、||はまたは
        //土曜日を取得
        if($day == $day_count){//月の最終日、空セルを追加
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
            $tw .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }
        $calendar[] = '<tr>' . $week . '</tr>'; //calendar配列にtrと$weekを追加
        $calendar[] = '<tr>' . $tw . '</tr>'; //calendar配列にtrと$taskweekを追加
        $week = '';//リセット
        $tw = '';
    }
}
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>課題管理システム</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>
  <section class="main">
    {{-- フラッシュメッセージ始まり --}}
    {{-- 成功の時 --}}
    @if (session('successMessage'))
    <div class="alert alert-success text-center">
      {{ session('successMessage') }}
    </div> 
    @endif
    {{-- 失敗の時 --}}
    @if (session('errorMessage'))
    <div class="alert alert-danger text-center">
      {{ session('errorMessage') }}
    </div> 
    @endif
    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	  @endif
    {{-- フラッシュメッセージ終わり --}}
    <div class="left_area">
      <div class="container">
        <h3><a href="?ym=<?php echo $prev.$tag_que; ?>">&lt;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next.$tag_que; ?>">&gt;</a></h3>
        <table class="table table-bordered">
          <tr>
              <th>日</th>
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th>土</th>
          </tr>
          <?php
            foreach ($calendar as $week) {
                echo $week;
            }
          ?>
        </table>
      </div>
    </div>

    <div class="right_area">
      <div class="inner">

        <div class="new_schedule">
          <div class="button_wrap" data-toggle="modal" data-target="#TaskRegister">新規作成</div>
        </div>

        <section id="todo">
          <ul>
            @foreach($tasks as $task)
              <li class="item">
                <h2 class="sche_name">{{ $task->name }}</h2>
                <?php
                  $parameter = Crypt::encrypt(['id' => $task->id]);
                  $data_tags = array();
                  foreach ($task->tags as $tag) {
                    $data_tags[] = $tag->name;
                  }
                  $data_tags = implode(',', $data_tags);
                  if ($task->memo==null) $task->memo="";
                ?>
                <button type="button" class="btn show" data-toggle="modal" data-target="#TaskShow"
                  data-name={{ $task->name }} 
                  data-date={{ $task->date }} 
                  data-time={{ $task->time }} 
                  data-memo={{ $task->memo }}
                  data-tags={{ $data_tags }}>詳細
                </button>
                <button type="button" class="btn edit" data-toggle="modal" data-target="#TaskEdit"
                  data-id={{ $task->id }} 
                  data-name={{ $task->name }} 
                  data-date={{ $task->date }} 
                  data-time={{ $task->time }} 
                  data-memo={{ $task->memo }} 
                  data-tags={{ $data_tags }}>編集
                </button>
                <form action="{{ route('task.destroy', $parameter ) }}" id="form_{{ $task->id }}" method="post">
                  @csrf
                  {{ method_field('delete') }}
                  <a href="#" data-id="{{ $task->id }}" onclick="deletePost(this);" class="btn btn-danger">
                  <span>削除</span></a>
                </form>
              </li>
            @endforeach
            
          </ul>
        </section>
      </div>
    </div>
    
    <div class="text-align-right">
      <h3 class="content_title">タグ一覧</h3>
      <?php // tagsの構造体を変換
        $data_tags = array();
        foreach ($tags as $tag) {
          $data_tags[] = $tag->name;
        }
        $data_tags = implode(',', $data_tags);
      ?>
      <div class="tag_edit">
        <div class="button_wrap" data-toggle="modal" data-target="#TagEdit" data-tags={{ $data_tags }}>編集</div>
      </div>
      <div class="tag_delete">
        <div class="button_wrap" data-toggle="modal" data-target="#TagDelete" data-tags={{ $data_tags }}>削除</div>
      </div>
      <ul>
        @foreach($tags as $tag)
          <li class="item">
            <?php // そのタグを持つ課題の数を求める
              $tag_count = 0; 
              foreach ($tasks as $task) {
                if ($task->tags->where('id',$tag->id)->count()==1) {
                  $tag_count++;
                }
              }
            ?>
            <a href="home?ym=<?php echo $ym; ?>&tag={{ $tag->name }}" class="text">#{{ $tag->name }}<?php echo("(".$tag_count.")")?></a>
          </li>
        @endforeach
      </ul>
    </div>
  </section>

  <!-- Modal -->
  <!-- Tag Modal -->
  <div class="modal fade" id="TagDelete" tabindex="-1" role="dialog" aria-labelledby="show-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="show-modal-label">削除するタグを選択してください</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="attachment-body-content">
          <div class="card-body">
            <!-- tag list -->
            <div class="form-group">
              <div type="text" id="tag-delete-list"></div>
            </div>
            <!-- /tag list -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="TagDestroy" tabindex="-1" role="dialog" aria-labelledby="show-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="show-modal-label">タグ削除確認</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tag.delete' ) }}" method="post">
          @csrf
          <div class="modal-body" id="attachment-body-content">
            <input type="hidden" id="modal-tag" name="name">
            <div class="card-body">
              <div type="text" id="tag-name"></div>
              <div type="text">を削除しますか？</div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-outline-secondary" value="キャンセル" name="reject" data-dismiss="modal">
            <input type="submit" class="btn btn-danger" value="削除" name="approve">
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="TagEdit" tabindex="-1" role="dialog" aria-labelledby="show-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="show-modal-label">編集するタグを選択してください</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="attachment-body-content">
          <div class="card-body">
            <!-- tag list -->
            <div class="form-group">
              <div type="text" id="tag-edit-list"></div>
            </div>
            <!-- /tag list -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="TagUpdate" tabindex="-1" role="dialog" aria-labelledby="show-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="show-modal-label">タグ編集</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tag.edit' ) }}" method="post">
          @csrf
          <div class="modal-body" id="attachment-body-content">
            <input type="hidden" id="modal-tag" name="old">
            <div class="card-body">
                <div class="form-group" style="display:inline-block; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;">
                  <div type="text" id="tag-name"></div>
                </div>
                <h4 class="">↓</h4><br>
                <input type="text" name="name">
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-outline-secondary" value="キャンセル" name="reject" data-dismiss="modal">
            <input type="submit" class="btn btn-danger" value="保存" name="approve">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Task Modal -->
  <div class="modal fade" id="TaskRegister" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="edit-modal-label">課題登録</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('task.store' ) }}" method="post" enctype='multipart/form-data' id="register">
          @csrf
          <div class="modal-body" id="attachment-body-content">
            <div class="card text-white bg-dark mb-0">
              <div class="card-body">
                <!-- name -->
                <div class="form-group">
                  <label class="col-form-label" for="reg-name">課題名</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <!-- /name -->
                <!-- date -->
                <div class="form-group">
                  <label class="col-form-label" for="reg-date">締め切り時刻</label>
                  <input type="date" name = "date" class="col-form-label">
                  <input type="time" name = "time" class="col-form-label" value="00:00">
                </div>
                <!-- /date -->
                <!-- tag -->
                <div class="form-group">
                  <label class="col-form-label" for="reg-tags">タグ</label>
                  <button id="input_add_button_2" type="button">追加</button>
                  <div class="add_to_2">
                    <div><input type="text" class="inputs" name="tags[]"><button class="input_delete_button" type="button">削除</button></div>
                  </div>
                </div>
                <!-- /tag -->
                <!-- memo -->
                <div class="form-group">
                  <label class="col-form-label" for="reg-memo">詳細</label>
                  <input type="text" name="memo" class="form-control">
                </div>
                <!-- /memo -->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="next_btn">
              <input type="submit" class="btn btn-outline-secondary" value="キャンセル" name="reject" data-dismiss="modal">
              <input type="submit" class="btn btn-danger" value="登録" name="approve">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="TaskShow" tabindex="-1" role="dialog" aria-labelledby="show-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="show-modal-label">課題情報詳細</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="attachment-body-content">
          <div class="card text-white bg-dark mb-0">
            <div class="card-body">
              <!-- name -->
              <div class="form-group">
                <label class="col-form-label" for="show-name">課題名</label><br>
                <div style="display:inline-block; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;">
                  <div type="text" id="show-name"></div>
                </div>
              </div>
              <!-- /name -->
              <!-- date -->
              <div class="form-group">
                <label class="col-form-label" for="modal-date">締め切り時刻</label><br>
                <div style="display:inline-block; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;">
                  <div type="text" id="show-date"></div>
                </div>
                <div style="display:inline-block; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;">
                  <div type="text" id="show-time"></div>
                </div>
              </div>
              <!-- /date -->
              <!-- tag -->
              <div class="form-group">
                <label class="col-form-label" for="show-tags">タグ</label><br>
                <div id="show-tag">
                </div>
              </div>
              <!-- /tag -->
              <!-- memo -->
              <div class="form-group">
                <label class="col-form-label" for="show-memo">詳細</label><br>
                <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #ffffff; color: #000000;">
                  <div type="text" id="show-memo"> </div>
                </div>
              </div>
              <!-- /memo -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="TaskEdit" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="edit-modal-label">課題情報編集</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('task.update' ) }}" method="post" enctype='multipart/form-data' id="edit">
          @csrf
          <div class="modal-body" id="attachment-body-content">
            <input type="hidden" name="id" id="edit-id">
            <div class="card text-white bg-dark mb-0">
              <div class="card-body">
                <!-- name -->
                <div class="form-group">
                  <label class="col-form-label" for="edit-name">課題名</label>
                  <input type="text" name="name" class="form-control" id="edit-name">
                </div>
                <!-- /name -->
                <!-- date -->
                <div class="form-group">
                  <label class="col-form-label" for="edit-date">締め切り時刻</label>
                  <input type="date" name = "date" class="col-form-label" id="edit-date">
                  <input type="time" name = "time" class="col-form-label" id="edit-time">
                </div>
                <!-- /date -->
                <!-- tag -->
                <div class="form-group">
                  <label class="col-form-label" for="edit-tags">タグ</label>
                  <button id="input_add_button" type="button">追加</button>
                  <div class="add_to" id="edit-tag">
                  </div>
                </div>
                <!-- /tag -->
                <!-- memo -->
                <div class="form-group">
                  <label class="col-form-label" for="edit-memo">詳細</label>
                  <input type="text" name="memo" class="form-control" id="edit-memo">
                </div>
                <!-- /memo -->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="next_btn">
              <input type="submit" class="btn btn-outline-secondary" value="キャンセル" name="reject" data-dismiss="modal">
              <input type="submit" class="btn btn-danger" value="保存" name="approve">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Attachment Modal -->
</body>
</html>
@endsection