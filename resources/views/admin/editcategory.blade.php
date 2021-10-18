@include('admin.header')
@include('admin.sidebar')

        <!-- /. NAV TOP  -->
        
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$pagetitle}}</h2>   
                    </div>
                  
                </div> 
                            
                 <!-- /. ROW  -->
                  <hr />
                  
              <div class="container-fluid col-lg-12">
                  <?php if($data){ ?>   
                       <form action="{{url('admin/categories/edit',$data['id'])}}" method="post">
                       @csrf
                       <div class="form-group row">
                           <label for="category" class="col-sm-2 col-form-label">Edit Category</label>
                           <div class="col-sm-10">
                               <input id="category" type="text" class="form-control" value="{{$data['category']}}" name="category">
                           </div>
                           @error('title')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       
                       
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php }
                  else{ ?>
                  <div style="font-size:18px;color:red">Sorry,could not find such category<span style="font-size:30px"> 😭</span> </div>
                    <?php } ?>
                  
                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')