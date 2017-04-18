@extends('layouts.app')

<script type="text/javascript" src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Applications</div>
             
                <div class="panel-body">
                    @if (session('app_status'))
                        <div class="alert alert-success">
                            {{ session('app_status') }}
                        </div>
                    @endif

                @if ( Auth::user()->user_type == 2)
                  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                   ADD APPLICATION
                  </button>
                @endif

                </BR>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> ADD APPLICATION </h4>
            </div>
            <form role="form" method="POST" action="{{ url('/app_insert') }}">
            {{ csrf_field() }}
            <div class="modal-body">
               
                         
                        <div class="form-group">
                            <label for="a_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="a_name" class="form-control" name="a_name" value="" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="a_version" class="col-md-4 control-label">Version</label>

                            <div class="col-md-6">
                                <input id="a_version" class="form-control" name="a_version" value="" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="a_description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="a_description" class="form-control" name="a_description" value="" type="text" required>

                            </div>
                        </div></br></br>
                       

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
            </form>
        </div>
    </div>
</div>


                <h3>Applications</h3>
                <div class="table-responsive jumbotron">
                 <table class="table table-hover">
                 <thead>
                  <tr>
                     <th>Name</th>
                     <th>Manufacturer Name</th>
                     <th>IP Address</th>
                      @if ( Auth::user()->user_type != 0)
                     <th>Action-01</th>
                     <th>Action-02</th>
                     @endif
                  </tr>
                  </thead>
                <tbody>
                <?php for($i=0;$i<count($applications);$i++){ ?>
                  <tr>
                    <td>{{ $applications[$i]->name }}</td>
                    <td>{{ $applications[$i]->version }}</td>
                    <td>{{ $applications[$i]->description }}</td>
                    @if ( Auth::user()->user_type != 0)
                    <td>  
                    
            <form action="{{ url('/app_del/') }}" id="delete{{$applications[$i]->app_id}}" method="POST">
                   
                    {{ csrf_field() }}
              <input type="hidden" value="{{$applications[$i]->app_id}}" name="app_id" />
              <input type="button" value="Delete"  onclick="delete_button({{$applications[$i]->app_id}})"/>
            </form>

                    

                     </td>
                    <td> 
           <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$applications[$i]->app_id }}" onclick="update_popup({{$applications[$i]->app_id }})">
                 update
                </button>
    <div class="modal fade" id="myModal{{$applications[$i]->app_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">UPDATE APPLICATION </h4>
            </div>
            <form role="form" method="POST" action="{{ url('/app_update') }}">
            {{ csrf_field() }}
            <div class="modal-body">
               
                         <input id="app_id" class="form-control" name="app_id" value="{{$applications[$i]->app_id }}" type="hidden" required>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control" name="name" value="{{$applications[$i]->name }}" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="version" class="col-md-4 control-label">Version</label>

                            <div class="col-md-6">
                                <input id="version" class="form-control" name="version" value="{{$applications[$i]->version }}" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" class="form-control" name="description" value="{{$applications[$i]->description }}" type="text" required>

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
                     </td>@endif
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


   function delete_button(id1){
    // alert("yes");
    var d_id = "#delete"+id1;
      if (confirm("Click OK to continue?")){
     $('form'+d_id).submit();
      }
   }
   

</script>
