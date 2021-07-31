@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Student Shfit</h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('student.shfit.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                                    
                                <div class="col-12">
                                
                                    <div class="form-group">
                                        <h5> Student Shfit Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"> </div>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                          
                                </div>   <!-- end col-12 -->
                            </div> <!-- end  row  -->
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                            </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>
     
    
    </div>
</div>








 

@endsection