<?php

/* users_view.twig */

class __TwigTemplate_8401db4bbd71172ea9e9ec0d10d95df8bd1470991ad3c3ac749b87159a28f50d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "users_view.twig", 1);
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


        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 8
            echo "            <div class=\"row\">
              <div class=\"col-md-4\">
                  <h2>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "name", array()), "html", null, true);
            echo "</h2>
                  <p>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "year", array()), "html", null, true);
            echo "</p>
                  <p>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "description", array()), "html", null, true);
            echo "</p>
                  <p>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "id", array()), "html", null, true);
            echo " </p>
              </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "

";
    }

    public function getTemplateName()
    {
        return "users_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array(68 => 17, 58 => 13, 54 => 12, 50 => 11, 46 => 10, 42 => 8, 38 => 7, 31 => 4, 28 => 3, 11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/*     <h1>{{ title }}</h1>*/
/* */
/* */
/*         {% for row in data %}*/
/*             <div class="row">*/
/*               <div class="col-md-4">*/
/*                   <h2>{{ row.name }}</h2>*/
/*                   <p>{{ row.year }}</p>*/
/*                   <p>{{ row.description }}</p>*/
/*                   <p>{{ row.id }} </p>*/
/*               </div>*/
/*             </div>*/
/*         {% endfor %}*/
/* */
/* */
/* {% endblock %}*/
