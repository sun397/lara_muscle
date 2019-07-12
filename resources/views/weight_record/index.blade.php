@extends ('layouts.app')
@section ('content')

<h1 class="page-header">みんなの体重ログ</h1>
<!-- <p class="text-right">
  <a class="btn btn-success" href="{{ route('weight_record.show', Auth::id()) }}">マイページ</a>
  <a class="btn btn-success" href="{{ route('weight_record.create') }}">体重記録</a>
</p> -->
<div class="form-group">
  {!! Form::open(['route' => 'training_record.index', 'method' => 'get']) !!}
    {!! Form::input('text', 'name', null) !!}
    {!! Form::submit('検索', ['class' => 'btn btn-success']) !!}
  {!! Form::close() !!}
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>ユーザー名</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <tr>
        <td class="align-middle"><a href="{{ route('training_record.otherpage', $user->id )}}">{{ $user->name }}</a></td>
        <td class="align-middle"></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
