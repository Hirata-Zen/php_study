@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト詳細フォーム -->
  <form action="/listing/{{$listing->id}}/edit" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      <label for="listing" class="col-sm-3 control-label">タイトル</label> 
      <div class="col-sm-6"> 
        <input type="text" name="title_name" class="form-control" value="{{$card->title}}">
	<input type="hidden" name="id" value="{{$card->id}}">
      </div>
    </div>

    <div class="form-group"> 
      <label for="listing" class="col-sm-3 control-label">メモ</label>
      <div class="col-sm-6"> 
        <input type="text" name="memo" class="form-control" value="{{$card->memo}}">
      </div>
    </div>

    <div class="form-group">
      <label for="listing" class="col-sm-3 control-label">リストネーム</label>
      <div class="col-sm-6">
	<select name = "listing_id">
	    @foreach ($listings as $item)
		<option value="{{$item->id}}" @if (old('listing_id', $listing->id) == $item->id)selected @endif >
		    {{$item -> title}}
		</option>
	    @endforeach
	</select>
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-success newBtn">
        <i class="glyphicon glyphicon-plus"></i> 更新 </button> 
      </div>
    </div>

  </form>
</div> 
@endsection
