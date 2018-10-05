 
  <form role="form" action="{{action('InputController@update', $inputs['id'])}}" method="post"  id="myform" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
              <input type="hidden" value="{{$inputs['id']}}" id="currentid" name="id">
            <input type="text" name="upname" value="{{$inputs['name']}}" />

               <input type="text" name="upemail" id="email" value="{{$inputs['email']}}"/>

                
                  <input type="text" name="uppassword" value="{{$inputs['password']}}"/>

<button type="submit" id="update"> Update </button> 
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<style type="text/css"> 

</style>
<script type="text/javascript">
$(document).ready(function(){
  $('#update').click(function(){   
  
  var id=$("#currentid").val();
  var email=$("#email").val();
  var url=$("#myform").attr('action');

    $.ajax({
      url: url,
      type: "post",
      data: {
        'id':id,  
        'email':email, 
        '_token': $('input[name=_token]').val()
      },
      success: function(data){
      console.log($('input[name=email]').val());
        alert(data);
      }
    });      
  }); 
});
</script> 