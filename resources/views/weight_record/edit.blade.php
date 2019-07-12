@extends ('layouts.app')
@section ('content')

<h2 class="mb-3">体重記録作成</h2>
{!! Form::open(['route' => ['weight_record.update', $weight->id], 'method' => 'put']) !!}
  <div class="form-group">
    {!! Form::input('date', 'weight_time', $weight->weight_time, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'weight', $weight->weight, ['required', 'class' => 'form-control', 'placeholder' => '体重']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'fat', $weight->fat, ['required', 'class' => 'form-control', 'placeholder' => '体脂肪']) !!}
  </div>
  {!! Form::submit('追加', ['class' => 'btn btn-success float-right']) !!}
{!! Form::close() !!}

@endsection
