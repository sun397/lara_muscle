@extends ('layouts.app')
@section ('content')

<h1 class="page-header">トレーニングログ</h1>
<p class="text-right">
  <a class="btn btn-success" href="/training_record/create">トレーニング追加</a>
</p>
<div class="form-group">
  {!! Form::open(['route' => 'training_record.index', 'method' => 'get']) !!}
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
        <td><a class="btn btn-primary" href="">編集</a></td>
        <td><button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button></td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
