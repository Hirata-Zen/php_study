@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト詳細フォーム -->
  <form action="/listing/{{$listings->id}}/cardsedit/{{$cards->id}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      <label for="listing" class="col-sm-3 control-label">タイトル</label>
      <div class="col-sm-6 border">
        {{$cards->title}}
        <input type="hidden" name="title_name" class="form-control" value="{{$cards->title }}">
      </div>
    </div>

    <div class="form-group "> 
      <label for="listing" class="col-sm-3 control-label">メモ</label>
      <div class="col-sm-6 border">
	{{$cards->memo}} 
        <input type="hidden" name="memo" class="form-control" value="{{$cards->memo}}">
      </div>
    </div>

    <div class="form-group">
      <label for="listing" class="col-sm-3 control-label">リストネーム</label>
      <div class="col-sm-6 border">
	{{$listings->title}}
        <input type="hidden" name="list_name" class="form-control" value="{{$listings->title}}">
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-primary newBtn">
        <i class="glyphicon glyphicon-plus"></i> 編集 </button> 
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <a class="btn btn-danger newBtn" href="/listing/{{$listings->id}}/cardsdelete/{{$cards->id}}">削除する</a>
      </div>
    </div>
  </form>
</div> 
@endsection
