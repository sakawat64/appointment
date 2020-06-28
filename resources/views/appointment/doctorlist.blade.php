@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
      <form method="post" action="/appointment">
      @csrf
      @if($errors->any())
			@foreach($errors->all() as $error)
             <p>{{$error}}</p>
			@endforeach

		     @endif
      <div class="form-row" id="doctor">
            <div class="form-group col-md-3">
                <label for="doctor" class="control-label">Doctor </label>
                <select class="form-control" name="doctor" required>
                <option value="">Select Doctor</option>>
                @foreach($doctors as $doctor) 
                    <option value="{{$doctor->id}}">{{$doctor->doctor_name}}-{{$doctor->category->category_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group col-md-3" id="sandbox-container">
            <label for="doctor" class="control-label">Appointment Date</label>
                <input class="form-control" type="text" id="datepicker" name="date" required autocomplete="off">
            </div>
            <div class="form-group col-md-3" style="margin-top: 31px;">
            <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>
      </form>
    </div>
</div>
<script>
 $('#sandbox-container input').datepicker({
    autoclose: true,
    toggleActive: true,
    format: 'yyyy-mm-dd'
});
  </script>
@endsection