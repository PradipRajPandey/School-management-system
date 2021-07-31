@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Student </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('student.registration.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                                    
                                <div class="col-12">

                                  <div class="row">  <!-- start 1st row -->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Student Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Father's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="fname" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>  Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mname" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->
                                      
                                  </div>   <!-- end 1st row -->



                                  <div class="row">  <!-- start 2nd row -->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Mobile Number <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="selectgender" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            
                                            </select>
                                        </div>
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->
                                      
                                  </div>   <!-- end 2nd row -->


                                  <div class="row">  <!-- start 3rd row -->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="religion" id="selectreligion" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Religion</option>
                                                <option value="Hinduism">Hinduism</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Islam">Islam</option>  
                                            
                                            </select>
                                        </div>
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Date of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="dob" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control" required=""> </div>
                                         
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                  </div>   <!-- end 3rd row -->




                                  
                                  <div class="row">  <!-- start 4th row -->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>Year <span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Year</option>
                                                @foreach ($years as $year)
      
                                                <option value="{{ $year->id}}">{{ $year->name }}</option>
                                                @endforeach
                                                  
                                            
                                            </select>
                                        </div>
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>class <span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Class</option>
                                                @foreach ($classes as $class)
      
                                                <option value="{{ $class->id}}">{{ $class->name }}</option>
                                                @endforeach  
                                            
                                            </select>
                                        </div>
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->
  

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>Group <span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <select name="group_id" id="group_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Group</option>
                                                @foreach ($groups as $group)
      
                                                <option value="{{ $group->id}}">{{ $group->name }}</option>
                                                @endforeach 
                                            
                                            </select>
                                        </div>
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->
  

                                  </div>   <!-- end 4th row -->



                                  <div class="row">  <!-- start 5th row -->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5>Shift <span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <select name="shfit_id" id="shfit_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Shfit</option>
                                                @foreach ($shfits as $shfit)
      
                                                <option value="{{ $shfit->id}}">{{ $shfit->name }}</option>
                                                @endforeach
                                                  
                                            
                                            </select>
                                        </div>
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <h5> Profile Image <span class="text-danger"> *</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" class="form-control"> </div>
                                    
                                    </div>
   
                                    </div>  <!-- end col-md-4 -->

                                    <div class="col-md-4">
                                      <div class="form-group">
                                                  
                                        <div class="controls">
                                            <img  id="showImage" src="{{ url('upload/no_image.jpg')}}" 
                                            style="width: 100px; height: 100px; border: 1px solid #000000" > </div>
                                    
                                      </div>
   
                                    </div>  <!-- end col-md-4 -->

                                  </div>   <!-- end 5th row -->









                                
                                   
                                          
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





<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });

</script>




 

@endsection