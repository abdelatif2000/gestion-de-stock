<?php

namespace App\Policies;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Session;

class ProviderPolicy
{
      use HandlesAuthorization;
      public function before(User $user){
        return in_array('ProviderController',Session::get("accesses"));  
      }
      public function viewAny(User $user)
      {
          return in_array('ProviderController@index',Session::get("accesses"));
      }   
      public function view(User $user , Provider $client)
      {
          return in_array('ProviderController@show',Session::get("accesses"));
      }   
      public function create_test(User $user)
      {
          return in_array('ProviderController@reate', Session::get("accesses"));
      }
      public function update(User $user, Provider $client)
      {
           dd('test');
          return in_array('ProviderController@update', Session::get("accesses"));
      }
   
      public function delete(User $user, Provider $client)
      {
          return in_array('ProviderController@delete',Session::get("accesses"));
      }
}
