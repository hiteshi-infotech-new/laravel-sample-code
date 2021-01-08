 @if (session()->has('message'))
 <div class="alert alert-success alert-dismissible" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success!</strong> {{ session('message') }} 
                                    </div>
                       
                     @elseif (session()->has('error'))
                     <div class="alert alert-warning alert-dismissible" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Warning!</strong> {{ session('error') }} 
                                    </div>
                        
                    @endif