@extends ('layouts.app')
@section ('content')

<h1 class="page-header">{{ $user->name }}体重ログ</h1>
<p class="text-right">
  <a class="btn btn-success" href="{{ route('training_record.mypage', $user->id) }}">{{ $user->name }}のページ</a>
  @if($user->id === Auth::id())
    <a class="btn btn-success" href="{{ route('weight_record.create') }}">体重記録</a>
  @endif
</p>
<div class="form-group">
  {!! Form::open(['route' => ['weight_record.show', Auth::id()], 'method' => 'get']) !!}
    {!! Form::input('date', 'weight_time', null) !!}
    {!! Form::submit('検索', ['class' => 'btn btn-success']) !!}
  {!! Form::close() !!}
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>日付</th>
      <th>体重</th>
      <th>体脂肪</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($weights as $weight)
      <tr>
        <td class="align-middle">{{ $weight->weight_time }}</td>
        <td class="align-middle">{{ $weight->weight }}</td>
        <td class="align-middle">{{ $weight->fat }}</td>
        @if($weight->user_id === Auth::id())
          <td><a class="btn btn-primary" href="{{ route('weight_record.edit', $weight->id) }}">編集</a></td>
          <td>
            {!! Form::open(['route' => ['weight_record.destroy', $weight->id], 'method' => 'DELETE']) !!}
              {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
