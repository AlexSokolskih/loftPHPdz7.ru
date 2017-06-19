<?php

/* layout.twig */

class __TwigTemplate_e99c5ea97c63996dbd954bb1bb49335fb3b1d0bce370d9e9cae71e3e91d36351 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Наш сайт</title>
    <link rel=\"stylesheet\" href=\"/assets/template/css/bootstrap.css\"/>
    <link rel=\"stylesheet\" href=\"/assets/template/css/bootstrap-theme.css\"/>
</head>
<body>

<nav class=\"navbar navbar-inverse navbar-fixed-top\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\"  data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle</span>
                <span class=\"icon-bar\"></span>
            </button>
            <a href=\"/\" class=\"navbar-brand\">Учим MVC</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
                <li><a href=\"/\">Главная</a></li>
                <li><a href=\"/about/\">О сайте</a></li>
                <li><a href=\"/portfolio/\">Портфолио</a></li>
                <li><a href=\"/contact/\">Контакты</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class=\"jumbotron\">
    <div class=\"container\">
        ";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "    </div>
</div>

<div class=\"container\">
    <hr/>
    <footer>
        <p>&copy; 2016 LoftSchool</p>
    </footer>
</div>


<script src=\"https://code.jquery.com/jquery-1.12.4.min.js\"></script>
<script src=\"/assets/template/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 33
    public function block_content($context, array $blocks = array())
    {
        // line 34
        echo "        ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array(77 => 34, 74 => 33, 56 => 35, 54 => 33, 20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="utf-8"/>*/
/*     <title>Наш сайт</title>*/
/*     <link rel="stylesheet" href="/assets/template/css/bootstrap.css"/>*/
/*     <link rel="stylesheet" href="/assets/template/css/bootstrap-theme.css"/>*/
/* </head>*/
/* <body>*/
/* */
/* <nav class="navbar navbar-inverse navbar-fixed-top">*/
/*     <div class="container">*/
/*         <div class="navbar-header">*/
/*             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#navbar" aria-expanded="false" aria-controls="navbar">*/
/*                 <span class="sr-only">Toggle</span>*/
/*                 <span class="icon-bar"></span>*/
/*             </button>*/
/*             <a href="/" class="navbar-brand">Учим MVC</a>*/
/*         </div>*/
/*         <div id="navbar" class="navbar-collapse collapse">*/
/*             <ul class="nav navbar-nav">*/
/*                 <li><a href="/">Главная</a></li>*/
/*                 <li><a href="/about/">О сайте</a></li>*/
/*                 <li><a href="/portfolio/">Портфолио</a></li>*/
/*                 <li><a href="/contact/">Контакты</a></li>*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* </nav>*/
/* */
/* <div class="jumbotron">*/
/*     <div class="container">*/
/*         {% block content %}*/
/*         {% endblock %}*/
/*     </div>*/
/* </div>*/
/* */
/* <div class="container">*/
/*     <hr/>*/
/*     <footer>*/
/*         <p>&copy; 2016 LoftSchool</p>*/
/*     </footer>*/
/* </div>*/
/* */
/* */
/* <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>*/
/* <script src="/assets/template/js/bootstrap.min.js"></script>*/
/* </body>*/
/* </html>*/
