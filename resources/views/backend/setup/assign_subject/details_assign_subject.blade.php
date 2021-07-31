@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
     
      <!-- Main content -->
      <section class="content">
        <div class="row">
 

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Assign Subject Details</h3>
                <a href="{{ route('assign.subject.add') }}" style="float: right;" 
                class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
             
              <div class="box-body">
                <div style="padding-left: 3px;"><h4><strong> Class Name : </strong>{{ $detailsdata['0']['student_class']['name'] }}</h4></div> <!-- ['student_class'] is a method in assignsubject.php -->
                <br>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                             
                              <th width="20%">Subject </th>           
                              <th width="20%">Full Mark</th>
                              <th width="20%">Pass Mark</th>
                              <th width="20%">Subjective Mark</th>
                           
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($detailsdata as $key => $detail)   
                            
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{  $detail['school_subject']['name'] }}</td> 
                                    <td>{{  $detail->full_mark }} </td>
                                    <td>{{  $detail->pass_mark }} </td>
                                    <td>{{  $detail->subjective_mark }} </td>
                                    
                                </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>








 

@endsection