@extends('layouts.app')

<script type="text/javascript" src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">USER</div>

                <div class="panel-body">
                    @if (session('appuser_status'))
                        <div class="alert alert-success">
                            {{ session('appuser_status') }}
                        </div>
                    @endif

                    
                @if ( Auth::user()->user_type == 2)
                  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                   ADD USER
                  </button>
                @endif

                </br></br>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> ADD USER </h4>
            </div>
            <form role="form" method="POST" action="{{ url('/appuser_insert') }}">
            {{ csrf_field() }}
            <div class="modal-body">
               
                         
                        <div class="form-group">
                            <label for="appuser_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="appuser_name" class="form-control" name="appuser_name" value="" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="appuser_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="appuser_email" class="form-control" name="appuser_email" value="" type="email" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="appuser_on" class="col-md-4 control-label">User On</label>

                            <div class="col-md-6">
                                <input id="appuser_on" class="form-control" name="appuser_on" value="" type="text" required>

                            </div>
                        </div></br></br>
                       

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
            </form>
        </div>
    </div></div>
               <div class="table-responsive jumbotron">
                 <table class="table table-hover">
                 <thead>
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>User On</th>
                      @if ( Auth::user()->user_type != 0)
                     <th>Action-01</th>
                     <th>Action-02</th>
                     @endif
                  </tr>
                  </thead>
                <tbody>
                <?php for($i=0;$i<count($appusers);$i++){ ?>
                  <tr>
                    <td>{{ $appusers[$i]->appuser_name }}</td>
                    <td>{{ $appusers[$i]->appuser_email }}</td>
                    <td>{{ $appusers[$i]->appuser_on }}</td>
                    @if ( Auth::user()->user_type != 0)
                    <td>  
                    <form action="{{ url('/appuser_del/') }}" id="delete{{$appusers[$i]->appuser_id}}" method="POST">
                   
                    {{ csrf_field() }}
                 <input id="appuser_id"  name="appuser_id" value="{{$appusers[$i]->appuser_id }}" type="hidden" required>
              <input type="button" value="Delete" onclick="delete_button({{$appusers[$i]->appuser_id }})"/>
            </form>
                    

                     </td>
                    <td> 
           <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$appusers[$i]->appuser_id }}" onclick="update_popup({{$appusers[$i]->appuser_id }})">
                 update
                </button>
    <div class="modal fade" id="myModal{{$appusers[$i]->appuser_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">UPDATE APPLICATION </h4>
            </div>
            <form role="form" method="POST" action="{{ url('/appuser_update') }}">
            {{ csrf_field() }}
            <div class="modal-body">
               
                         <input id="appuser_id" class="form-control" name="appuser_id" value="{{$appusers[$i]->appuser_id }}" type="hidden" required>

                        <div class="form-group">
                            <label for="appuser_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="appuser_name" class="form-control" name="appuser_name" value="{{$appusers[$i]->appuser_name }}" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="appuser_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="appuser_email" class="form-control" name="appuser_email" value="{{$appusers[$i]->appuser_email }}" type="email" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="appuser_on" class="col-md-4 control-label">User On</label>

                            <div class="col-md-6">
                                <input id="appuser_on" class="form-control" name="appuser_on" value="{{$appusers[$i]->appuser_on }}" type="text" required>

                            </div>
                        </div></br></br>
                       

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
                     </td>
                     @endif
                    </tr>
                  </tr>
                  <?php } ?>
                </tbody>
                </table>
                </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
$(document).ready(function () {

function update_popup(id){

     // Attach Button click event listener 
     var b_id = "#myBtn"+id;
     var m_id = "#myModal"+id;
   
      $(b_id).click(function(){
         // show Modal
         $(m_id).modal('show');
     });
    }

    
});
</script>

<script type="text/javascript">
$(document).ready(function () {

     // Attach Button click event listener 
    $("#myBtn").click(function(){

         // show Modal
         $('#myModal').modal('show');
    });
    
});
</script>
<script type="text/javascript">
  

  
function delete_button(id1){
    // alert("yes");
    var d_id = "#delete"+id1;
      if (confirm("Click OK to continue?")){
     $('form'+d_id).submit();
      }
   }
</script>