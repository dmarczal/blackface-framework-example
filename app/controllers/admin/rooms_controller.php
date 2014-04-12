<?php namespace Admin;

class RoomsController  extends ApplicationController {

   public function index() {
      $this->rooms = \Room::all();
   }

   public function show() {
     $this->room = \Room::findById($this->params[':id']);
     $this->photo = new \RoomPhoto();
     $this->photo->setRoomId($this->room->getId());
   }

   public function _new() {
     $this->room  = new \Room();
     $this->submit = 'Criar quarto';
     $this->action = $this->urlFor('/admin/quartos');
     $this->categories = \RoomCategory::all();
   }

   public function create() {
     $this->room = new \Room($this->params['room']);

     if ($this->room->save()) {
       \Flash::message('success', 'Registro realizado com sucesso!');
       $this->redirectTo('/admin/quartos');
     } else {
       \Flash::message('danger', 'Existe dados incorretos no seu formulário!');
       $this->submit = 'Criar quarto';
       $this->action = $this->urlFor('/admin/quartos');
       $this->categories = \RoomCategory::all();
       $this->render('new');
     }
   }

   public function edit() {
     $this->room = \Room::findById($this->params[':id']);
     $this->categories = \RoomCategory::all();
     $this->submit = 'Salvar';
     $this->action = $this->urlFor("/admin/quartos/{$this->room->getId()}");
   }


   public function update() {
     $this->room = \Room::findById($this->params[':id']);

     if ($this->room->update($this->params['room'])) {
       \Flash::message('success', 'Registro atualizado com sucesso!');
       $this->redirectTo('/admin/quartos');
     }else{
       \Flash::message('danger', 'Existe dados incorretos no seu formulário!');
       $this->categories = \RoomCategory::all();
       $this->submit = 'Salvar';
       $this->action = $this->urlFor("/admin/quartos/{$this->room->getId()}");
       $this->render('edit');
     }
   }

  public function destroy() {
    $room = \Room::findById($this->params[':id']);
    $room->delete();
    \Flash::message('success', 'Registro deletado com sucesso!');
    $this->redirectTo("/admin/quartos");
  }
} ?>
