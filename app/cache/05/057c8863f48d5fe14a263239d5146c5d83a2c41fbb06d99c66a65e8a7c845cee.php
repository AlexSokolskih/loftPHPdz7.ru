<?php

/* portfolio_view.twig */

class __TwigTemplate_f944e192167daa7a038e89b92248802382a98ccb52a58e19ef797c27f71aa92a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "portfolio_view.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h1>
    <div class=\"row\">

        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 8
            echo "            <div class=\"col-md-4\">
                <h2>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "name", array()), "html", null, true);
            echo "</h2>
                <p>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "year", array()), "html", null, true);
            echo "</p>
                <p>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "description", array()), "html", null, true);
            echo "</p>
                <p><a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "site", array()), "html", null, true);
            echo "\" class=\"btn btn-default\">Посмотреть сайт</a></p>
            </div>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "

    </div>
";
    }

    public function getTemplateName()
    {
        return "portfolio_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array(67 => 16, 57 => 12, 53 => 11, 49 => 10, 45 => 9, 42 => 8, 38 => 7, 31 => 4, 28 => 3, 11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/*     <h1>{{ title }}</h1>*/
/*     <div class="row">*/
/* */
/*         {%  for row in data %}*/
/*             <div class="col-md-4">*/
/*                 <h2>{{ row.name }}</h2>*/
/*                 <p>{{ row.year }}</p>*/
/*                 <p>{{ row.description }}</p>*/
/*                 <p><a href="{{ row.site }}" class="btn btn-default">Посмотреть сайт</a></p>*/
/*             </div>*/
/* */
/*         {% endfor %}*/
/* */
/* */
/*     </div>*/
/* {% endblock %}*/
