<?php

namespace App\Policies;
use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Session;

class ClientPolicy
{
    use HandlesAuthorization;
    public function before(User $user ){
      return in_array('ClientController',Session::get("accesses"));  
    }
    public function viewAny(User $user)
    {
        return in_array('ClientController@index',Session::get("accesses"));
    }   
    public function view(User $user , Client $client)
    {
        return in_array('ClientController@show',Session::get("accesses"));
    }   
    public function create(User $user)
    {
         return dd('test');
        return in_array('ClientController@create', Session::get("accesses"));
    }
 
    public function update(User $user, Client $client)
    {
        return in_array('ClientController@update', Session::get("accesses"));
    }
 
    public function delete(User $user, Client $client)
    {
        return in_array('ClientController@delete',Session::get("accesses"));
    }
 
}
