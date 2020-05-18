@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト作成フォーム -->
  <form action="/listing/{{ $listing_id }}/card" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="new form-group"> 
      <label for="listing" class="col-sm-3 control-label">タイトル</label>
      <div class="col-sm-6"> 
        <input type="text" name="title_name" class="form-control" value="{{ old('title_name') }}">
      </div>
    </div>

    <div class="form-group new"> 
      <label for="listing" class="col-sm-3 control-label">メモ</label><br>
      <input type="hidden" name="listing_id" value="{{$listing_id}}">
      <div class="col-sm-6"> 
        <input type="text" name="memo" class="form-control" value="{{ old('memo') }}">
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="newBtn">
        <i class="glyphicon glyphicon-plus"></i> 作成する</button> 
      </div>
    </div>
  </form>
</div> 
@endsection
