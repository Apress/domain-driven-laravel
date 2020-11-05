<?php
namespace App\Registration;

use App\User;

class RegisterUser
{
   protected $safeAttributes;

   protected $user;
   public function __construct(array $params) {
       $attributes = User::fillableFromArray($params);
       $this->safeAttributes = $attributes;
       $this->user = new User();
   }
   public function makeAdmin() {
       $this->user->admin = true;
   }
   public function makePremiumMember() {
       $this->user->premiumMember = true;
   }
   public function getUser() {
        return $this->user;
   }
   public function registerUser() {
       $this->user->fill($this->safeAttributes);
       $this->user->save();
   }
}
