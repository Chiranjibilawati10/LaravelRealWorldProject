<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Habbit</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Update Habbit</h3>
     <br />
   <div class="table-responsive ">


                <form method="post" id="habbit_form" action="{{ route('habbit_list.update', $habbitData->id)}}">
                  @csrf
                 <span id="result"></span>
                <table class="table table-bordered table-striped" id="user_table">
		               <thead>
		                <tr>
		                    <th width="50%">Habbit Name</th>
		                    <th width="20%" >Action</th>
		                </tr>
		               </thead>
		               <tbody>
		                <tr>
                      <td><input type="text" name="name" class="form-control" value="{{$habbitData->name}}">
                      </td> 
                      <td>
                        
                        <button type="submit" class="btn btn-success" >Update</button>
                      </a>
                      </td>
                    </tr>
		               </tbody>
           		</table>
                </form>

               
   </div>
  </div>
 </body>
</html>