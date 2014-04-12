<?php namespace Admin;

class ContactsController  extends ApplicationController {

  public function index(){
     $this->contacts = \Contact::all();
  }

} ?>
