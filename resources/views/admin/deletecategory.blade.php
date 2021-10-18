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
                      
                       <form action="{{url('admin/categories/delete',$data['id'])}}" method="post" enctype="multipart/form-data" >
                       @csrf
                       <div class="form-group row">
                           <label for="title" class="col-sm-2 col-form-label">Delete Category</label>
                           <div class="col-sm-10">
                               <input id="category" type="text" class="form-control" value="{{$data['category']}}" name="category">
                           </div>
                           @error('title')
                              <div class="error" style="font-size:17px;color:red">{{ $message }}</div>
                           @enderror
                       </div>
                       
                        <br>
                        <button type="submit" class="btn btn-danger" style="float:right">Delete</button>
                    </form>
                     
                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')