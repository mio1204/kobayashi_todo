@extends('layouts.todo')
<style>
  th {
    padding: 10px 15px;
  }

  td {
    padding: 10px 15px;
    text-align: center;
  }

  .btn {
    padding: 5px 15px;
    border-radius: 5px;
    background-color: white;
  }

  .btnadd {
    border: 2px solid lightpink;
    color: pink;
  }

  .btnnew {
    border: 2px solid orange;
    color: orange;
  }

  .btndelete {
    border: 2px solid lightblue;
    color: lightblue;
  }

  .txtwin {
    width: 40vw;
    line-height: 2;
    border: 2px solid lightgray;
    border-radius: 5px;
  }

  .txtwin__list {
    width: 15vw;
    line-height: 2;
    border: 2px solid lightgray;
    border-radius: 5px;
  }

  .form__space {
    margin-bottom: 0;
  }
</style>
@section('container')

<!-- 入力＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
@section('form')
<form action="/todo/create" method="POST">
  <table>
    @csrf
    <tr>
      <td>
        <input type="text" name="content" class="txtwin">
      </td>
      <td>
        <input class="btn btnadd" type="submit" value="追加">
        <!-- <button class="btnadd">追加</button> -->
      </td>
    </tr>
  </table>
</form>
@endsection

<!-- 一覧＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
@section('content')
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @foreach($items as $item)
  <tr>
    <td>
      {{$item->created_at}}
    </td>
    @if (count($errors) > 0)
    <p>20文字以内で入力してください</p>
    @endif
    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
      <td>
        <input type="text" name="content" value="{{$item->content}}" class="txtwin__list">
      </td>


      <!-- 更新＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
      <td>
        @csrf
        <input class="btn btnnew" type="submit" value="更新">
    </form>
    </td>

    <!-- 削除＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
    <td>
      <form action="/todo/delete" method="POST" class="form__space">
        @csrf
        <input class="btn btndelete" type="submit" value="削除">
        <input type="hidden" name="id" value="{{ $item->id }}">
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection