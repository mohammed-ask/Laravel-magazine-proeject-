@include('admin.header')
<link href="{{url('assets/summernote/summernote-lite.min.css')}}" rel="stylesheet" />
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
                    <a href="{{url('/admin/posts/add')}}" class="" style="float:right">
                        <button class="fa fa-plus btn btn-primary"> Add Post</button>
                    </a>
                  </div>
                     
                          
                        
                     
                      <table class="table table-striped table-hover">
       <thead>
           <tr>
               <th scope="col">Title</th>
               <th scope="col">Content</th>
               <th scope="col">Date</th>
               <th scope="col">Category</th>
               <th scope="col">image</th>
               <th scope="col">Action</th>
           </tr>
       </thead>
       
        @foreach($data as $data2)
       <tbody>
           <tr>
              
               <td scope="row">{{$data2->title}}</td>
               <td><?php echo substr($data2->content,0,400) ?>...</td>
               <td>{{date("jS M,Y",strtotime($data2->created_at))}}</td>
               <td>{{$data2->category}}</td>
               <td><img src="{{url('upload/'.$data2->image)}}" style="width:125px" /></td>
                <td><a href="{{url('/admin/posts/edit',$data2->id)}}" class="btn-sm btn-primary">Edit</a>|<a class="btn-sm btn-danger" href="{{url('/admin/posts/delete',$data2->id)}}">Delete</a></td>
           </tr>
           
       </tbody>
       @endforeach
   </table>
               @include('pagination')
                </div> 
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')
<script src="{{url('assets/summernote/summernote-lite.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>