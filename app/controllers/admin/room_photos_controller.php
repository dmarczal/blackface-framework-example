<?php namespace Admin;

class RoomPhotosController  extends ApplicationController {

   public function create() {
     $this->photo = new \RoomPhoto($_FILES['photo']);
     $this->photo->setRoomId($this->params[':id']);

     if ($this->photo->save()) {
        \Flash::message('success', 'Photo adicionada com sucesso!');
        $this->redirectTo("/admin/quartos/{$this->params[':id']}");
     } else {
       \Flash::message('danger', 'Dados incorretos no upload!');
       $this->room = \Room::findById($this->params[':id']);
       $this->render('/admin/rooms/show');
     }
   }

  public function destroy() {
    $photo = \RoomPhoto::findById($this->params[':id']);
    $photo->delete();
    \Flash::message('success', 'Imagem removida com sucesso!');
    $this->redirectTo($this->back());
  }
} ?>
