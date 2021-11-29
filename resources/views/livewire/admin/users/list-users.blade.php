<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            
<!--            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <i class='icon fas fa-check'></i>
                 {{session('message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
            </div>
            @endif-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-2">
                        <button wire:click.prevent="AddNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-2"></i> Add New User</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <!-- table -->      
                            <table class="table table-hover">
                                <thead>
                                    
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="" wire:click.prevent="$emit('edituser',{{ $user}})">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>
                                            <a href="" wire:click.prevent="$emit('deleteuser',{{ $user->id}})">
                                               
                                                <i class="fa fa-trash text-danger"></i>
                                               
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                 
                                </tbody>
                              
                            </table>
                                 {{ $users->links() }}
                        </div>
                        
                    </div>
                </div>  
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    
    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form wire:submit.prevent="{{$showEditModal ? 'updateuser' : 'createUser'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                            <span>Edit User</span>
                            @else
                             <span>Add New User</span>
                             @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model.defer="state.name" class="form-control  @error('name') is-invalid @enderror " id="name" aria-describedby="nameHelp">
                            <div id="nameHelp" class="form-text "></div>
                            @error('name')
                            <div  class="form-text invalid-feedback"> {{ $message}}</div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" wire:model.defer="state.email" class="form-control  @error('email') is-invalid @enderror " id="email" aria-describedby="emailHelp">
                            @error('email')
                            <div id="emailHelp" class="form-text invalid-feedback"> {{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" wire:model.defer="state.password" class="form-control  @error('password') is-invalid @enderror" id="password">
                            @error('password')
                            <div class="form-text invalid-feedback"> {{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" wire:model.defer="state.password_confirmation" class="form-control  @error('password') is-invalid @enderror" id="password_confirmation">
                            @error('password')
                            <div  class="form-text invalid-feedback"> {{ $message}}</div>
                            @enderror
                        </div>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times pr-2"></i>Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save pr-2"></i>
                        @if($showEditModal)
                        <span>Save changes</span>
                        @else
                        <span>Create user</span>
                        @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
