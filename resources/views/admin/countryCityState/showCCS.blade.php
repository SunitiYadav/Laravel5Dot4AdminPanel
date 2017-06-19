@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Country-State-City
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Country-State-City</li>
      </ol>
    </section>
@endsection


@section('content')
<!-- BEGIN CONTENT BODY -->
<div class="row">
	<div class="col-md-12">
	<!-- BEGIN PORTLET-->
		<div class="portlet light form-fit bordered box box-default">
			<div class="portlet-body form box-body">
				<!-- BEGIN FORM-->
				<form class="form-horizontal form-row-seperated">
					<div class="form-body">
					    <div class="form-group">
					        <label class="control-label col-md-3" for="title">Select Country:</label>
					        <div class="col-md-4">
					        	{!! Form::select('country', $countries,'',array('class'=>'bs-select form-control','id'=>'country','data-show-subtext'=>'true','data-live-search'=>'true'));!!}
					        </div>
					    </div>

					    <div class="form-group">
					        <label class="control-label col-md-3" for="title">Select State:</label>
					        <div class="col-md-4">
					        	<select name="state" id="state" class="form-control"></select>
					        </div>
					    </div>
					 
					    <div class="form-group">
					        <label class="control-label col-md-3" for="title">Select City:</label>
					        <div class="col-md-4">
					        	<select name="city" id="city" class="form-control"></select>
					        </div>
					    </div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	<!-- END PORTLET-->
	</div>
</div>
<!-- END CONTENT BODY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });

     $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>

@endsection
