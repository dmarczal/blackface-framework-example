<?php namespace Admin;

class RoomCategoriesController  extends ApplicationController {

   public function index() {
      $this->room_categories = \RoomCategory::all();
   }

   public function _new() {
     $this->room_category  = new \RoomCategory();
     $this->submit = 'Nova categoria';
     $this->action = $this->urlFor('/admin/categorias-de-quarto');
   }

   public function create() {
     $this->room_category = new \RoomCategory($this->params['room_category']);

     if ($this->room_category->save()) {
       \Flash::message('success', 'Registro realizado com sucesso!');
       $this->redirectTo('/admin/categorias-de-quarto');
     } else {
       \Flash::message('danger', 'Existe dados incorretos no seu formulário!');
       $this->submit = 'Nova categoria';
       $this->action = $this->urlFor('/admin/categorias-de-quarto');
       $this->render('new');
     }
   }

   public function edit() {
     $this->room_category = \RoomCategory::findById($this->params[':id']);
     $this->submit = 'Salvar';
     $this->action = $this->urlFor("/admin/categorias-de-quarto/{$this->room_category->getId()}");
   }


   public function update() {
     $this->room_category = \RoomCategory::findById($this->params[':id']);

     if ($this->room_category->update($this->params['room_category'])) {
       \Flash::message('success', 'Registro atualizado com sucesso!');
       $this->redirectTo('/admin/categorias-de-quarto');
     } else {
       \Flash::message('danger', 'Existe dados incorretos no seu formulário!');
       $this->submit = 'Salvar';
       $this->action = $this->urlFor("/admin/categorias-de-quarto/{$this->room_category->getId()}");
       $this->render('edit');
     }
   }

  public function destroy() {
    $room_category = \RoomCategory::findById($this->params[':id']);
    $room_category->delete();
    \Flash::message('success', 'Registro deletado com sucesso!');
    $this->redirectTo("/admin/categorias-de-quarto");
  }
}
?>

