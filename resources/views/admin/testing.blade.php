<form>
<input type="text">
<input type="submit" id="insert">
</form>
<script
      src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous">
    </script>
 <script type="text/javascript">
             


               $("#insert").click(function(e) {
    e.preventDefault();

    $.ajax({
        dataType: 'html',
        type:'POST',
        url: 'input',
        data: {
        "_token": "{{ csrf_token() }}",
        "id": 7
        }
    }).done(function(data){
        alert(data);
    });
});
               </script>

