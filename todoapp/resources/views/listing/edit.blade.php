@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト修正フォーム -->
  <form action="{{ url('/listing/edit')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      <label for="listing" class="col-sm-3 control-label">リスト名</label> 
      <div class="col-sm-6"> 
        <input type="text" name="list_name" class="form-control" value="{{$listings->title }}">
	<input type="hidden" name="id" value="{{$listings->id}}">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="btn btn-default">
        <i class="glyphicon glyphicon-plus"></i> 更新 </button> 
      </div>
    </div>
  </form>
</div> 
@endsection
