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
                       <form action="{{url('admin/categories/add')}}" method="post">
                       @csrf
                       <div class="form-group row">
                           <label for="category" class="col-sm-2 col-form-label">Category Name</label>
                           <div class="col-sm-10">
                               <input id="category" type="text" class="form-control" placeholder="title" name="category">
                           </div>
                           @error('category')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                     
                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')
