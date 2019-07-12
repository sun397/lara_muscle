@extends ('layouts.app')
@section ('content')

<h2 class="mb-3">記録変更</h2>
{!! Form::open(['route' => ['training_record.update', $record->id], 'method' => 'put']) !!}
  <div class="form-group">
    {!! Form::input('date', 'training_time', $record->training_time, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    <select name='training_select_id' class = "form-control selectpicker form-size-small" id="pref_id">
      <option value="{{ $record->training_select_id }}">{{ $record->select->name }}</option>
        @foreach ($selects as $select)
                  <option value="{{ $select->id }}">{{ $select->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    {!! Form::input('string', 'weight', $record->weight, ['required', 'class' => 'form-control', 'placeholder' => 'weight']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'rep', $record->rep, ['required', 'class' => 'form-control', 'placeholder' => 'rep']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'set', $record->set, ['required', 'class' => 'form-control', 'placeholder' => 'set']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'interval', $record->interval, ['required', 'class' => 'form-control', 'placeholder' => 'interval']) !!}
  </div>
  {!! Form::submit('変更', ['class' => 'btn btn-success float-right']) !!}
{!! Form::close() !!}

@endsection
