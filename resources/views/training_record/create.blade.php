@extends ('layouts.app')
@section ('content')

<h2 class="mb-3">記録作成</h2>
{!! Form::open(['route' => 'training_record.store']) !!}
  <?php use Carbon\Carbon; ?>
  <div class="form-group">
    {!! Form::input('date', 'training_time', Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    <select name='training_select_id' class = "form-control selectpicker form-size-small" id="pref_id">
      <option value="">Select menu</option>
        @foreach ($selects as $select)
                  <option value="{{ $select->id }}">{{ $select->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    {!! Form::input('string', 'weight', null, ['required', 'class' => 'form-control', 'placeholder' => 'weight']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'rep', null, ['required', 'class' => 'form-control', 'placeholder' => 'rep']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'set', null, ['required', 'class' => 'form-control', 'placeholder' => 'set']) !!}
  </div>
  <div class="form-group">
    {!! Form::input('string', 'interval', null, ['required', 'class' => 'form-control', 'placeholder' => 'interval']) !!}
  </div>
  {!! Form::submit('追加', ['class' => 'btn btn-success float-right']) !!}
{!! Form::close() !!}

@endsection
