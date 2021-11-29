<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use function bcrypt;
use function redirect;
use function view;

class ListUsers extends Component
{

   public $userbeingremoved =null;
    protected $listeners = ['deleteuser' => 'deleteUser','edituser' => 'editUser','confirmdelete'];
  
       use WithPagination;
       protected $paginationTheme = 'bootstrap';
public $user;
    public $state =[];
  public $showEditModal =false;
  
    public function AddNew() {
        
      $this->showEditModal = false;
       $this->dispatchBrowserEvent('show-form');
       $this->reset();
    }
    
    public function createUser()
    {
         
    $validatedData = Validator::make($this->state,[
        'name'=> 'required',
        'email'=> 'required|email|unique:users',
        'password'=>'required|confirmed',
        
    ])->validate();
      
    $validatedData['password']= bcrypt($validatedData['password']);
    
    User::create($validatedData);
    
   // session()->flash('message', 'User Added successfuly !');
    
 $this->dispatchBrowserEvent('hide-form',['message'=>'User Added successfully !']);
   

    }
    
    public function deleteUser($userId) {
      $this->userbeingremoved=$userId;
       $this->dispatchBrowserEvent('showconfirmdelete',['message'=>'Are you sure? This user will be deleted']);
      
     
    }
    
    public function confirmdelete() {
        $user = User::findOrFail($this->userbeingremoved);
        $user->delete();
       

      
    }
      public function editUser(User $user) {
        $this->user=$user;
       
          $this->showEditModal =true;
             $this->state=$user->toArray();
      $this->dispatchBrowserEvent('show-form');
      
    }
    public function updateuser() {
       $validatedData = Validator::make($this->state,[
        'name'=> 'required',
        'email'=> 'required|email|unique:users,email,'.$this->user->id,
        'password'=>'sometimes|confirmed',
        
    ])->validate();
      
       if(!empty($validatedData['password'])){
            $validatedData['password']= bcrypt($validatedData['password']);
       }
   
    
    $this->user->update($validatedData);
    
  
    
 $this->dispatchBrowserEvent('hide-form',['message'=>'User Updated successfully !']);
  
    }
    public function render()
    {
     
      
        return view('livewire.admin.users.list-users',[
            'users'=> User::paginate(15),
        ]);
    }
}
