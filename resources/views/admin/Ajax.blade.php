<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <title>Laravel</title>
    </head>

    <body onload="load();">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <input type="hidden" id="id">
        Book Name <input type="text" id="name" required="required" name="name"><br>
        Price: <input type="number" id="price" required="required" name="price"><br>
        <button onclick="submit();">Submit</button>

        <table id="table" border=1>
            <tr> <th> Name </th> <th> Price </th> <th> Edit </th> <th> Delete </th> </tr>
        </table>

        <script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            data = "";
            submit = function(){
                    $.ajax({
                        url:'saveOrUpdate',
                        type:'POST',
                        data:{id:$("#id").val(),name:$('#name').val(),price:$('#price').val()},
                        success: function(response){
                            alert(response.message);
                            load();
                        }
                    });
                };

            load = function(){
                $.ajax({
                    url:'list',
                    type:'POST',
                    success: function(response){
                        data = response.data;
                        $('.tr').remove();
                        for(i=0; i<response.data.length; i++){
                            $("#table").append("<tr class='tr'> <td> "+response.data[i].name+" </td> <td> "+response.data[i].price+" </td> <td> <a href='#' onclick= edit("+i+");> Edit </a>  </td> </td> <td> <a href='#' onclick='delete_("+response.data[i].id+");'> Delete </a>  </td> </tr>");
                        }
                    }
                });
            };

            edit = function (index){
                $("#id").val(data[index].id);
                $("#name").val(data[index].name);
                $("#price").val(data[index].price);
            };

            delete_ = function(id){
                $.ajax({
                    url:'delete',
                    type:'POST',
                    data:{id:id},
                    success: function(response){
                        alert(response.message);
                        load();
                    }
                });
            }

        </script>
    </body>
</html>
