@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit User</h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('user.update',$usereditdata->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                                    
                                <div class="col-12">
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="role" id="role" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Role</option>
                                                            <option value="Admin" {{ $usereditdata->role == "Admin" ? "selected": "" }}>Admin</option>
                                                            <option value="Operator"  {{ $usereditdata->role == "Operator" ? "selected": "" }}>Operator</option>
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-12 row col-md-6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{ $usereditdata->name }}" > </div>
                                                
                                                </div>
                                            </div> <!-- end col-12 row col-md-6 -->
                                        </div> <!-- end col-12 row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5> User Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"  required="" value="{{ $usereditdata->email }}"> </div>
                                                
                                                </div>
                                            </div> <!-- end col-12 row col-md-6 -->

                                            <div class="col-md-6">
                                                
                                            </div> <!-- end col-12 row col-md-6 -->
                                        </div> <!-- end col-12 row -->

                                </div>   <!-- end col-12 -->
                            </div> <!-- end  row  -->
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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