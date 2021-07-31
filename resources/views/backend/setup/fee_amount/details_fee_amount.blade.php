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
                <h3 class="box-title"> Fee Amount Details</h3>
                <a href="{{ route('fee.amount.add') }}" style="float: right;" 
                class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <br>
              <div style="padding-left: 33px;"><h4><strong>Fee Category : </strong>{{ $detailsdata['0']['fee_category']['name'] }}</h4></div>
              <div class="box-body">
                  
               
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                             
                              <th>Class Name</th>
                              
                              <th width="30%">Amount</th>
                           
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($detailsdata as $key => $detail)   
                            
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                   
                                    <td>{{  $detail['student_class']['name'] }}</td> 
                                    <td>{{ $detail->amount }}</td>
                               
                                    
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