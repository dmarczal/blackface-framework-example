<?php namespace Admin;

class SessionsController  extends ApplicationController {

  protected $beforeAction = array();

  public function _new() {
    $this->adminSession = new AdminSession();
  }

  public function create(){
    $this->adminSession = new AdminSession($this->params['user']);

    if ($this->adminSession->wasCreate()) {
      \Flash::message('success', 'Login realizado com sucesso!');
      $this->redirectTo('/admin/login');
    }else{
      \Flash::message('danger', 'Login/senha incorretas!');
      $this->render('new');
    }
  }

  public function destroy() {
    $admin_session = new AdminSession();
    $admin_session->destroy();
    $this->redirectTo('/admin/login');
  }
} ?>
