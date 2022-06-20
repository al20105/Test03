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
        $tw .= $task['name'];
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
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <section class="main">
    <div class="left_area">


      <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
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

      <!-- <table border="1" class="calender">
        <thead>
          <tr>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
            <th>日</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <ul class="lists">
                <li class="days">1</li>
                <li class="schedule">高度情報演習</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">2</li>
                <li class="schedule">上級プログラミング</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">3</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">4</li>
                <li class="schedule">上級プログラミング</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">5</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">6</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">7</li>
                <li class="schedule">センター試験</li>
              </ul>
            </td>
          </tr>

          <tr>
            <td>
              <ul class="lists">
                <li class="days">8</li>
                <li class="schedule">高度情報演習</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">9</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">10</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">11</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">12</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">13</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">14</li>
              </ul>
            </td>
          </tr>

          <tr>
            <td>
              <ul class="lists">
                <li class="days">15</li>
                <li class="schedule">高度情報演習</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">16</li>
                <li class="schedule">情報セキュリティ</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">17</li>
                <li class="schedule">人工知能</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">18</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">19</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">20</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">21</li>
              </ul>
            </td>
          </tr>

          <tr>
            <td>
              <ul class="lists">
                <li class="days">22</li>
                <li class="schedule">高度情報演習</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">23</li>
                <li class="schedule">人工知能</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">24</li>
                <li class="schedule">人工知能</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">25</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">26</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">27</li>
                <li class="schedule">人工知能</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">28</li>
                <li class="schedule">井尻敬</li>
                <li class="schedule">人工知能</li>
                <li class="schedule">高度情報演習</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>
              <ul class="lists">
                <li class="days">29</li>
                <li class="schedule">高度情報演習</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">30</li>
              </ul>
            </td>
            <td>
              <ul class="lists">
                <li class="days">31</li>
              </ul>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table> -->
    </div>

    <div class="right_area">
      <div class="inner">
        <h1>個人情報</h1>
        <div class="account_info">
          <h2>芝浦太郎</h2>
        </div>

        <div class="new_schedule">
          <a href="{{ route('task.create') }}">
            <div class="button_wrap">新規作成</div>
          </a>
        </div>

        <section id="todo">
          <ul>
            
            @foreach($tasks as $task)
              <li class="item">
                <h2 class="sche_name">{{ $task->name }}</h2>
                <?php
                  $parameter = Crypt::encrypt(['id' => $task->id]);
                ?>
                <a href="{{ route('task.show', $parameter ) }}" class="btn show">詳細</a>
                <a href="{{ route('task.edit', $parameter ) }}" class="btn edit">編集</a>
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
  </section>
</body>

<script>
    function deletePost(e) {
      'use strict';
      if(confirm('本当に削除していいですか?')){
          document.getElementById('form_' + e.dataset.id).submit();
      }
    }
</script>
</html>