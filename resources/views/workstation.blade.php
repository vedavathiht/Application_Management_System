@extends('layouts.app')

<script type="text/javascript" src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Work Station</div>

                <div class="panel-body">
                    @if (session('workstation_status'))
                        <div class="alert alert-success">
                            {{ session('workstation_status') }}
                        </div>
                    @endif

                @if ( Auth::user()->user_type == 2)
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                 ADD WORKSTATION
                </button>
                </BR>
                @endif

                <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ADD WORKSTATION</h4>
            </div>
            <form role="form" method="POST" action="{{ url('/workstation') }}">
            {{ csrf_field() }}
            <div class="modal-body">
               

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control" name="name" value="" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Manufacturer Name</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control" name="manufacturer_name" value="" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">IP Address</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control" name="ip_address" value="" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">MAC Address</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control" name="mac_address" value="" type="text" required>

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

                <h3>Workstations</h3>
                <div class="table-responsive jumbotron">
                 <table class="table table-hover">
                 <thead>
                  <tr>
                     <th>Name</th>
                     <th>Manufacturer Name</th>
                     <th>IP Address</th>
                     <th>MAC Address</th>
                      @if ( Auth::user()->user_type != 0)
                     <th>Action-01</th>
                     <th>Action-02</th>
                     @endif
                  </tr>
                  </thead>
                <tbody>
                <?php for($i=0;$i<count($workstations);$i++){ ?>
                  <tr>
                    <td>{{ $workstations[$i]->name }}</td>
                    <td>{{ $workstations[$i]->manufacturer_name }}</td>
                    <td>{{ $workstations[$i]->ip_address }}</td>
                    <td>{{ $workstations[$i]->mac_address }}</td>
                     @if ( Auth::user()->user_type != 0)
                    <td>  <!--<a href="{{ URL::to('workstation/' . $workstations[$i]->id) }}"><i class="fa fa-trash-o"></i>Delete</a>-->
                    <!--<a href="{{ URL::to('workstation/' . $workstations[$i]->id) }}"><i class="fa fa-trash-o"></i>Delete</a>-->

                    <form action="{{ URL::to('workstation/' . $workstations[$i]->id) }}" id="delete{{$workstations[$i]->id}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input onclick ="delete_button({{$workstations[$i]->id}})" class="floatright" type="button" value="Delete" />
                    </form>

                    

                    
                    

                     </td>
                    <td>   <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$workstations[$i]->id}}" onclick="update_popup({{$workstations[$i]->id }})">
                 update
                </button>
    <div class="modal fade" id="myModal{{$workstations[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">UPDATE WORKSTATION </h4>
            </div>
            <form role="form" method="POST" action="{{ URL::to('workstation/' . $workstations[$i]->id)}}">
             <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control" name="name" value="{{$workstations[$i]->name }}" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="manufacturer_name" class="col-md-4 control-label">Manufacturer Name</label>

                            <div class="col-md-6">
                                <input id="manufacturer_name" class="form-control" name="manufacturer_name" value="{{$workstations[$i]->manufacturer_name }}" type="text" required>

                            </div>
                        </div></br></br>
                        <div class="form-group">
                            <label for="ip_address" class="col-md-4 control-label">IP Address</label>

                            <div class="col-md-6">
                                <input id="ip_address" class="form-control" name="ip_address" value="{{$workstations[$i]->ip_address }}" type="text" required>

                            </div>
                        </div></br></br>
                         <div class="form-group">
                            <label for="mac_address" class="col-md-4 control-label">MAC Address</label>

                            <div class="col-md-6">
                                <input id="mac_address" class="form-control" name="mac_address" value="{{$workstations[$i]->mac_address }}" type="text" required>

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
</div> </td>
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

     // Attach Button click event listener 
    $("#myBtn").click(function(){

         // show Modal
         $('#myModal').modal('show');
    });
    
});
</script>
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
  
function delete_button(id1){
    // alert("yes");
    var d_id = "#delete"+id1;
      if (confirm("Click OK to continue?")){
     $('form'+d_id).submit();
      }
   }
</script>