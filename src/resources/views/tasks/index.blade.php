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
      <div class="date_wrap">
        <h1>2022年 04月</h1>
      </div>

      <table border="1" class="calender">
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
      </table>
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
            <li class="item">
              <h2 class="sche_name">人工知能第3回レポート</h2>
              <a href="{{ route('task.show') }}" class="btn show">詳細</a>
              <a href="{{ route('task.edit') }}" class="btn edit">編集</a>
              <form action="{{ route('task.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn delete" onclick="deletePost(this);" value="削除">
              </form>
            </li>
            <li class="item">
              <h2 class="sche_name">人工知能第3回レポート</h2>
              <a href="{{ route('task.show') }}" class="btn show">詳細</a>
              <a href="{{ route('task.edit') }}" class="btn edit">編集</a>
              <form action="{{ route('task.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn delete" onclick="deletePost(this);" value="削除">
              </form>
            </li>
            <li class="item">
              <h2 class="sche_name">人工知能第3回レポート</h2>
              <a href="{{ route('task.show') }}" class="btn show">詳細</a>
              <a href="{{ route('task.edit') }}" class="btn edit">編集</a>
              <form action="{{ route('task.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn delete" onclick="deletePost(this);" value="削除">
              </form>
            </li>
            <li class="item">
             <h2 class="sche_name">人工知能第3回レポート</h2>
              <a href="{{ route('task.show') }}" class="btn show">詳細</a>
              <a href="{{ route('task.edit') }}" class="btn edit">編集</a>
              <form action="{{ route('task.destroy') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn delete" onclick="deletePost(this);" value="削除">
              </form>
            </li>
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