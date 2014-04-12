<?php namespace Admin;

class UsersController  extends ApplicationController {

   public function index() {
      $this->users = \User::all();
   }

   public function show() {
     $this->user = \User::findById($this->params[':id']);
   }


   public function _new() {
     $this->user = new \User();
     $this->submit = 'Novo usuário';
     $this->action = $this->urlFor('/admin/usuarios');
   }

   public function create() {
    $this->user = new \User($this->params['user']);

    if ($this->user->save()) {
      \Flash::message('success', 'Registro realizado com sucesso!');
      $this->redirectTo('/admin/usuarios');
    }else{
      \Flash::message('danger', 'Existe dados incorretos no seu formulário!');
       $this->submit = 'Novo usuário';
       $this->action = $this->urlFor("/admin/usuarios");
       $this->render('new');
     }
   }

   public function edit() {
     $this->user = \User::findById($this->params[':id']);
     $this->submit = 'Salvar';
     $this->action = $this->urlFor("/admin/usuarios/{$this->user->getId()}");
   }


   public function update() {
     $this->user = \User::findById($this->params[':id']);

     if ($this->user->update($this->params['user'])) {
       \Flash::message('success', 'Registro atualizado com sucesso!');
       $this->redirectTo('/admin/usuarios');
     } else {
       \Flash::message('danger', 'Existe dados incorretos no seu formulário!');
       $this->submit = 'Salvar';
       $this->action = $this->urlFor("/admin/usuarios/{$this->user->getId()}");
       $this->render('edit');
     }
   }

  public function destroy() {
    $user = \User::findById($this->params[':id']);
    $user->delete();
    \Flash::message('success', 'Usuário deletado com sucesso!');
    $this->redirectTo("/admin/usuarios");
  }
}
?>
