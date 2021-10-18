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
              <div>
                    <div>
                    <a href="{{url('/register')}}" class="" style="float:right">
                        <button class="fa fa-plus btn btn-primary"> Add New User</button>
                    </a>
                  </div>
                     
                          
                        
                     
                      <table class="table table-striped table-hover">
       <thead>
           <tr>
               <th scope="col">Name</th>
               <th scope="col">E-mail</th>
               <th scope="col">Date</th>
               
               <th scope="col">Action</th>
           </tr>
       </thead>
       
        @foreach($data as $data2)
       <tbody>
           <tr>
              
               <td scope="row">{{$data2->name}}</td>
               <td>{{$data2->email}}</td>
               <td>{{date("jS M,Y",strtotime($data2->created_at))}}</td>
              
                <td><a href="{{url('/admin/users/edit',$data2->id)}}" class="btn-sm btn-primary">Edit</a>|<a class="btn-sm btn-danger" href="{{url('/admin/users/delete',$data2->id)}}">Delete</a></td>
           </tr>
           
       </tbody>
       @endforeach
   </table>

                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')

