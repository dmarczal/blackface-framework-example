<?php
class ContactsController  extends ApplicationController {

  public function _new() {
    $this->contact = new Contact();
  }

  public function create() {
    # $_POST['contact'] retorna os mesmos dados que $this->params['contacts']
    $this->contact = new Contact($this->params['contact']);

    if ($this->contact->save()) {
      Flash::message('success', 'Mensagem enviada com sucesso!');
      $this->redirectTo('/');
    }else{
      Flash::message('danger', 'Existe dados incorretos no seu formulário!');
      $this->render('new');
    }
  }
}
?>
