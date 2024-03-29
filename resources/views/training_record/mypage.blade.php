@extends ('layouts.app')
@section ('content')

<h1 class="page-header">{{ $user->name }}トレーニングログ</h1>
<p class="text-right">
  <a class="btn btn-success" href="{{ route('weight_record.show', $user->id) }}">{{ $user->name }}の体重</a>
  @if($user->id === Auth::id())
    <a class="btn btn-success" href="{{ route('training_record.create') }}">トレーニング記録</a>
  @endif
</p>
<div class="form-group">
  {!! Form::open(['route' => ['training_record.mypage', Auth::id()], 'method' => 'get']) !!}
    {!! Form::input('date', 'training_time', null) !!}
    {!! Form::submit('検索', ['class' => 'btn btn-success']) !!}
  {!! Form::close() !!}
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>日付</th>
      <th>種目</th>
      <th>重量</th>
      <th>回数</th>
      <th>セット</th>
      <th>インターバル</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($records as $record)
      <tr>
        <td class="align-middle">{{ $record->training_time }}</td>
        <td class="align-middle">{{ $record->select->name }}</td>
        <td class="align-middle">{{ $record->weight }}</td>
        <td class="align-middle">{{ $record->rep }}</td>
        <td class="align-middle">{{ $record->set }}</td>
        <td class="align-middle">{{ $record->interval }}</td>
        @if($record->user_id === Auth::id())
          <td><a class="btn btn-primary" href="{{ route('training_record.edit', $record->id )}}">編集</a></td>
          <td>
            {!! Form::open(['route' => ['training_record.destroy', $record->id], 'method' => 'DELETE']) !!}
              {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
