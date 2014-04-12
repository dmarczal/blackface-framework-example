<?php namespace Admin;

require_once 'php-markdown/Michelf/Markdown.php';

class ApplicationController  extends \BaseController {

  private $currentUser;
  protected $beforeAction = array('authenticated' => 'all');
  protected $layout = 'admin/layout/application.phtml';

  public function __construct() {
    $this->layout = 'admin/layout/application.phtml';
  }

  public function currentUser() {
    if ($this->currentUser == null && isset($_SESSION['admin']['id'])) {
      $this->currentUser = Admin::findById($_SESSION['admin']['id']);
    }
    return $this->currentUser;
  }

  public function authenticated() {
    if ($this->currentUser() === null) {
      \Flash::message('danger', 'Área restrita para administrador');
      $this->redirectTo('/admin/login');
    }
  }

  # Transform regular text in html
  # Used to show contacts message
  public function markdown($text) {
    return \Michelf\Markdown::defaultTransform($text);
  }
}
