<?php


abstract class BaseView
{
    protected $postsForSideBar;

    public function __construct($postsForSideBar)
    {
        $this->postsForSideBar = $postsForSideBar;
    }


    public function getHtml()
    {
        $html = "
<!DOCTYPE html>
<html lang=\"ru\">

<head>
    {$this->getHead()}
</head>


<body>
    <div class=\"container\">
    
        <header id=\"header\">
            {$this->getHeader()}
        </header>
                 
  
        <section id=\"sliderSection\">
            <div class=\"row\">
                <div class=\"col-lg-8 col-md-8 col-sm-8\">
                       {$this->getContent()}
                 </div>
                 <div class=\"col-lg-4 col-md-4 col-sm-4\">
                        {$this->getSidebar()}
                 </div>
             </div>
         </section>
         
         <div class=\"footer_bottom\">
            <p class=\"copyright\">Copyright &copy; 2020 <a href=\"index.php\">DimaBlog</a></p>
        </div>
    </div>
    
<script src=\"assets/js/custom.js\"></script>

</body>
</html>
";

        return $html;
    }

    protected function getHead(): string
    {
        return '
<title>DimaBlog</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
        ';
    }

    protected abstract function getContent(): string;

    protected function getSidebar(): string
    {
        $postsArray = $this->postsForSideBar;
        $html = '<hr>';

        foreach ($postsArray as $item){
            $html .= "<p>{$item->title}</p>"; //потом сделаю ссылками

        }

        return $html;
    }

    protected function getFooter(): string
    {
        return "<h1>Мой подвал</h1>";
    }

    protected function getHeader(): string
    {
        $currentDate = date("d - F - Y");
        return "        
    <div class='row'>
      <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='header_top'>
          <div class='header_top_left'>
            <ul class='top_nav'>
              <li><a href = 'index.php'>На главную</a></li>
              <li><a href = '#'>О блоге</a></li>
              <li><a href = '#'>Как связаться</a></li>
            </ul>
          </div>
          <div class='header_top_right'>
            <p>{$currentDate}</p>
          </div>
        </div>
      </div>
      <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='header_bottom'>
          <div class='logo_area'><a href = 'index.html' class='logo'><img src = 'images/logo.jpg' alt = ''></a></div>
        </div>
      </div>
    </div>  
        ";
    }
}