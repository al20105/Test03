@extends('layouts.app')

@section('content')
<?php

/*******************************************************************
*** File Name           : index.blade.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.07.04
*** Purpose             : 一覧表示処理のhtml部分
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.07.04
*/

date_default_timezone_set('Asia/Tokyo'); // タイムゾーンを設定
if(isset($_GET['ym'])) // 前月・次月リンクが選択された場合は、GETパラメーターから年月を取得
{ 
    $ym = $_GET['ym'];
}
else // 今月の年月を表示
{
    $ym = date('Y-m');
}

if(isset($_GET['tag'])) // タグのクエリパラメータを取得
{ 
    $tag_set = $_GET['tag'];
}

if (isset($tag_set)) // タグのクエリパラメータの生成
{
  $tag_que = "&tag=$tag_set";
} 
else
{
  $tag_que = "";
}

$timestamp = strtotime($ym . '-01'); // タイムスタンプ（どの時刻を基準にするか）を作成し、フォーマットをチェックする

if($timestamp === false) // エラー対策として形式チェックを追加
{
    $ym = date('Y-m'); // falseが返ってきた時は、現在の年月・タイムスタンプを取得
    $timestamp = strtotime($ym . '-01');
}

$today = date('Y-m-j'); // 今月の日付　フォーマット　例）2020-10-2
$html_title = date('Y年n月', $timestamp); // カレンダーのタイトルを作成　例）2020年10月
$prev = date('Y-m', strtotime('-1 month', $timestamp)); // 前月の年月を取得
$next = date('Y-m', strtotime('+1 month', $timestamp)); // 次月の年月を取得
$day_count = date('t', $timestamp); // 該当月の日数を取得
$youbi = date('w', $timestamp); // 何曜日か

//カレンダー作成の準備
$calendar = [];
$week = '';
$tw = '';

//第１週目：空のセルを追加
$week .= str_repeat('<td></td>', $youbi);
$tw .= str_repeat('<td></td>', $youbi);

for($day = 1; $day <= $day_count; $day++, $youbi++)
{
    $date = $ym . '-' . $day; // 例:2020-00-00
    $date = date('Y-m-d', strtotime($date)); // 日付を取得
    if($today == $date)
    {
        $week .= '<td class="today">' . $day;// 今日の場合はclassにtodayをつける
    }
    else
    {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    $day_task = array(); // 初期化
    foreach($tasks as $task)
    {
      if(in_array($date, $task->toArray())) // 課題の締め切り日が今日の場合$day_taskに格納する
      {
        array_push($day_task, $task);
      }
    }
    array_multisort( array_map( "strtotime", array_column( $day_task, "time" ) ), SORT_ASC, $day_task ); // 締め切り時間で並び替え

    $tw .= '<td>'; // 課題の行
    if(count($day_task) != 0) // 今日の課題がある場合
    {
      $cnt = 0; //カウンタ
      foreach ($day_task as $task) {
        if($cnt != 0){
          $tw .= '<br>'; // 改行
        }
        $data_tags = array(); // 初期化
        foreach ($task->tags as $tag)
        {
          $data_tags[] = $tag->name; // タグを格納
        }

        if ($task->memo==null) // 詳細情報がnulの場合"null"とする(エラー回避)
        {
          $task->memo="null";
        }
        $data_tags = implode(',', $data_tags); // タグの配列を,区切りの文章にする
        $t_name = $task['name']; // 課題名を取得
        if (Str::length($t_name)>10)
        {
          $t_name = mb_substr($t_name, 0, 10, "utf-8")."..."; // 課題名が長い場合省略する
        }
        $tw .= "<button type='button' class='btn show' data-toggle='modal' data-target='#TaskShow'
                  data-name=$task->name 
                  data-date=$task->date 
                  data-time=$task->time 
                  data-memo=$task->memo 
                  data-tags=$data_tags>".$t_name.
                "</button>"; // モーダル用
        $tw .= date('H:i' ,strtotime($task['time'])); // 時間を表示
        $cnt++;
      }
    }
    $tw .= '</td>';

    if($youbi % 7 == 6 || $day == $day_count){ // 週終わり、月終わりの場合
        if($day == $day_count) // 月の最終日、空セルを追加
        {
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
            $tw .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }
        $calendar[] = '<tr>' . $week . '</tr>'; // calendar配列にtrと$weekを追加
        $calendar[] = '<tr>' . $tw . '</tr>'; // calendar配列にtrと$taskweekを追加
        $week = ''; // リセット
        $tw = ''; // リセット
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

  <section class="main">
    <div class="left_area">
      <div class="container-fluid calender">
        <h3 class="calender-title">
          <!-- カレンダーのタイトルを設定 -->
          <a href="?ym=<?php echo $prev.$tag_que; ?>">&lt;&lt;&emsp;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next.$tag_que; ?>">&emsp;&gt;&gt;</a>
        </h3>
        <table class="table table-bordered">
          <!-- 曜日の表を作成 -->
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
            // 上記のphp部分で定義した1週分のカレンダーを作成
            foreach ($calendar as $week) {
                echo $week;
            }
          ?>
        </table>
      </div>
    </div>

    <div class="right_area">
      <div class="inner">
        <div class="account_info">
          <div class="new_schedule">
            <a>
              <div class="button_wrap" data-toggle="modal" data-target="#TaskRegister">新規作成</div>
            </a>
          </div>
        </div>

        <section id="todo">
          <p class="todo_title">To Doリスト一覧</p>
          <ul>
            @foreach($tasks as $task)
              <li class="item">
                <div class="left_item_area">
                  <?php
                    $t_name = $task->name;
                    if (Str::length($t_name)>16) $t_name = mb_substr($t_name, 0, 16, "utf-8")."...";
                  ?>
                  <h2 class="sche_name">{{ $t_name }}</h2>
                </div>
                <?php
                  // 課題idを暗号化
                  $parameter = Crypt::encrypt(['id' => $task->id]);
                  // タグの配列を定義
                  $data_tags = array();
                  foreach ($task->tags as $tag) {
                    $data_tags[] = $tag->name;
                  }
                  // タグの配列を,区切りの文字列に変形
                  $data_tags = implode(',', $data_tags);
                  // 詳細情報がnullの場合null(string)とする
                  if ($task->memo==null)
                  {
                    $task->memo="";
                  }
                ?>
                <div class="right_item_area">
                  <!--モーダルの起動を含めたボタンを作成 -->
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
                  <!-- 課題削除をするボタンを作成 -->
                  <form action="{{ route('task.delete', $parameter ) }}" id="form_{{ $task->id }}" method="post" class="btn delete-btn">
                    @csrf
                    {{ method_field('delete') }}
                    <a href="#" data-id="{{ $task->id }}" onclick="deletePost(this);" class="delete">
                    <span>削除</span></a>
                  </form>
                </div>
              </li>
            @endforeach
            
          </ul>
        </section>

        <section id="tag">
        <h3 class="tag_title">タグ一覧</h3>
        <?php // tagsの構造体を変換
          $data_tags = array();
          foreach ($tags as $tag) {
            $data_tags[] = $tag->name;
          }
          $data_tags = implode(',', $data_tags);
        ?>
        <div class="tag_btn">
          <!-- タグに関するボタンを作成 -->
          <div class="tag_edit">
            <div class="button_wrap" data-toggle="modal" data-target="#TagEdit" data-tags={{ $data_tags }}>編集</div>
          </div>
          <div class="tag_delete">
            <div class="button_wrap" data-toggle="modal" data-target="#TagDelete" data-tags={{ $data_tags }}>削除</div>
          </div>
          <div class="tag_search">
            <a href="home?ym=<?php echo $ym; ?>" class="text"><span>タグ検索をリセット</span></a>
          </div>
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
              <!-- タグの表記を作成 -->
              <a href="home?ym=<?php echo $ym; ?>&tag={{ $tag->name }}" class="text"><span>#{{ $tag->name }}<?php echo("(".$tag_count.")")?></span></a>
            </li>
          @endforeach
        </ul>
      </section>
      </div>
    </div>

  </section>

  <!-- Modal -->
  <!-- 処理はapp.blade.phpのjs部分 -->
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
