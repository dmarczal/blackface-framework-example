<?php class SessionsController extends ApplicationController {

  public function _new() {
    $this->userSession = new UserSession();
  }

  public function create(){
    $this->userSession = new UserSession($this->params['user']);

    if ($this->userSession->wasCreate()) {
      Flash::message('success', 'Login realizado com sucesso!');
      $this->redirectTo('/');
    }else{
      Flash::message('danger', 'Login/senha incorretas!');
      $this->render('new');
    }
  }

  public function destroy() {
    $session = new UserSession();
    $session->destroy();
    $this->redirectTo('/login');
  }
} ?>
