@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
      <form method="post" action="/doctor">
      @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="division" class="control-label">Division </label>
                <select class="form-control" name="division" id="division">
                <option value="">Select Division</option>>
                @foreach($divisions as $division) 
                    <option value="{{$division->id}}">{{$division->division_name}}</option>>
                @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="district" class="control-label">District </label>
                <select class="form-control" name="district" id="district">
                    <option value="">Select District</option>>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="category" class="control-label">Speciality </label>
                <select class="form-control" name="category" id="category">
                <option value="">Speciality</option>>
                @foreach($categories as $category) 
                    <option value="{{$category->id}}">{{$category->category_name}}</option>>
                 @endforeach
                </select>
            </div>
            <div class="form-group col-md-3" style="margin-top: 31px;">
            <input type="submit" class="btn btn-primary" value="Search">
            </div>
        </div>
      </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
       // $("#category").prop('disabled', true);
       // $("#doctor").hide();
        $('select[name="division"]').on('change', function() {
            var divisionID = $(this).val();
            if(divisionID) {
                $.ajax({
                    url: '/district/'+divisionID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="district"]').empty();
                        $.each(data, function(key, value) {
                            //$("#category").prop('disabled', false);
                            $('select[name="district"]').append('<option value="'+ value.id +'">'+ value.district_name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="district"]').empty();
            }
        });
    });
</script>
@endsection