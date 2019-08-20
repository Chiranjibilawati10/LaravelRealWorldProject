<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Habbit</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Add Habbit</h3>
     <br />
   <div class="table-responsive">
                <form method="post" id="habbit_form">
                 <span id="result"></span>
                 <table class="table table-bordered table-striped" id="user_table">
               <thead>
                <tr>
                    <th width="35%">Habbit Name</th>
                    <th width="30%">Action</th>
                </tr>
               </thead>
               <tbody>

               </tbody>
               <tfoot>
                <tr>
                  <td colspan="2" align="right">&nbsp;</td>
                  <td>
                  @csrf
                  <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                 </td>
                </tr>
               </tfoot>
           </table>
                </form>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 var count = 1;

 habbit_list(count);

 function habbit_list(number)
 {
  html = '<tr>';
        html += '<td><input type="text" name="name[]" class="form-control" /></td>';
     
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  habbit_list(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#habbit_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("habbit_list.insert") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    habbit_list(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>
