
<table border="0">
                    <th colspan="5">Members</th>
                    <tr>
                         <td>Id</td>
                         <td>Name</td>
                         
                         <td>Email</td>
                         <td>Password</td>
                    </tr>

                    @foreach($inputs as $value)
                    <tr>
                         <td>{{$value->id}}</td>
                         <td>{{$value->name}}</td>
                       
                         <td>{{$value->email}}</td>
                         <td>{{$value->password}}</td>
                            <td><a href="{{ route('input.edit',$value->id) }}">Edit</a></td>
                    </tr>
                    @endforeach
               </table>

               <!-- Insert Data -->

               <table border="0">
                    <th colspan="2"> Insert </th>
                    <tr>
                         <td>Name :</td>
                         <td><input type="text" name="name" /></td>
                    </tr>
                 
                    <tr>
                         <td>Email</td>
                         <td><input type="text" name="email" /></td>
                    </tr>
                    <tr>
                         <td>Password</td>
                         <td><input type="text" name="password" /></td>
                    </tr>
                    <tr>
                         <td colspan="2"><button type="submit" id="insert"> Insert </button> </td>
                    </tr>
               </table>
               {{ csrf_field() }} <!-- this is important for generate token -->

               <!-- Update Data -->

               <table border="0">
                    <th colspan="2">Update</th>
                    <tr>
                         <td>Select Id:</td>
                         <td>
                              <select name="upid" id="upid">
                                   @foreach($inputs as $value)
                                        <option value="{{ $value->id}}"> {{ $value->id }} </option>
                                   @endforeach
                              </select>
                         </td>
                    </tr>
                    <tr>
                         <td>Name :</td>
                         <td><input type="text" name="upname"  /></td>
                    </tr>
                   
                    <tr>
                         <td>Email</td>
                         <td><input type="text" name="upemail" /></td>
                    </tr>
                    <tr>
                         <td>Password</td>
                         <td><input type="text" name="uppassword" /></td>
                    </tr>
                    <tr>
                         <td colspan="2"><button type="submit" id="update"> Update </button> </td>
                    </tr>
               </table>

               <!-- Delete Data -->

               <table border="0">
                    <th colspan="2"> Delete </th>
                    <tr>
                         <td>Select Id:</td>
                         <td>
                              <select name="upid" id="delid">
                                   @foreach($inputs as $value)
                                        <option value="{{ $value->id}}"> {{ $value->id }} </option>
                                   @endforeach
                              </select>
                         </td>
                    </tr>
                    <tr>
                         <td colspan="2"><button type="submit" id="delete"> Delete </button> </td>
                    </tr>
               </table>

               <!-- AJAX SECTION -->
<script
      src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous">
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
               <script type="text/javascript">
             $('#insert').click(function(){
                    $.ajax({
                        type:'post',
                        url: '{{URL::route('input.store')}}',
                        data:{
                            '_token':$('input[name=_token').val(),
                            'name':$('input[name=name').val(),
                           
                            'email':$('input[name=email').val(),
                            'password':$('input[name=password').val()
                        },
                        success:function(data){

                             window.location.reload();
                        },
                    });
                });
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){
  $('#update').click(function(){   
  console.log($('input[name=email]').val());
    $.ajax({
      url: 'account/login',
      type: "post",
      data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){
      console.log($('input[name=email]').val());
        alert(data);
      }
    });      
  }); 


});
</script> 

            
                   

               
