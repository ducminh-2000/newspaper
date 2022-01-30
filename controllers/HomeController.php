<?php
require_once 'controllers/Controller.php';
require_once 'models/article.php';

class HomeController extends Controller {
  public function index() {
    $article_model = new Article();
    $articles = $article_model->getArticleInHomePage();

    $this->content = $this->render('views/homes/home.php', [
      'articles' => $articles
    ]);
    require_once 'views/layouts/main_home.php';
  }
}