<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/contrib/bootstrap_barrio/templates/content/taxonomy-term.html.twig */
class __TwigTemplate_de237a3e7fd75479ba3699d78685a840fe3f03d3303e8b16e0b0fedaf0471513 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 27, "if" => 34];
        $filters = ["clean_class" => 29, "escape" => 32];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 27
        $context["classes"] = [0 => "taxonomy-term", 1 => ("vocabulary-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute(        // line 29
($context["term"] ?? null), "bundle", []))))];
        // line 32
        echo "<div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["attributes"] ?? null), "setAttribute", [0 => "id", 1 => ("taxonomy-term-" . $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["term"] ?? null), "id", [])))], "method"), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
  ";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null)), "html", null, true);
        echo "
  ";
        // line 34
        if ( !($context["page"] ?? null)) {
            // line 35
            echo "    <h2><a href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null)), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null)), "html", null, true);
            echo "</a></h2>
  ";
        }
        // line 37
        echo "  ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null)), "html", null, true);
        echo "
  <div class=\"content\">
    ";
        // line 39
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true);
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/content/taxonomy-term.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 39,  77 => 37,  69 => 35,  67 => 34,  63 => 33,  58 => 32,  56 => 29,  55 => 27,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a taxonomy term.
 *
 * Available variables:
 * - url: URL of the current term.
 * - name: Name of the current term.
 * - content: Items for the content of the term (fields and description).
 *   Use 'content' to print them all, or print a subset such as
 *   'content.description'. Use the following code to exclude the
 *   printing of a given child element:
 *   @code
 *   {{ content|without('description') }}
 *   @endcode
 * - attributes: HTML attributes for the wrapper.
 * - page: Flag for the full page state.
 * - term: The taxonomy term entity, including:
 *   - id: The ID of the taxonomy term.
 *   - bundle: Machine name of the current vocabulary.
 * - view_mode: View mode, e.g. 'full', 'teaser', etc.
 *
 * @see template_preprocess_taxonomy_term()
 */
#}
{%
  set classes = [
    'taxonomy-term',
    'vocabulary-' ~ term.bundle|clean_class,
  ]
%}
<div{{ attributes.setAttribute('id', 'taxonomy-term-' ~ term.id).addClass(classes) }}>
  {{ title_prefix }}
  {% if not page %}
    <h2><a href=\"{{ url }}\">{{ name }}</a></h2>
  {% endif %}
  {{ title_suffix }}
  <div class=\"content\">
    {{ content }}
  </div>
</div>
", "themes/contrib/bootstrap_barrio/templates/content/taxonomy-term.html.twig", "D:\\webserver\\www\\jikstore\\web\\themes\\contrib\\bootstrap_barrio\\templates\\content\\taxonomy-term.html.twig");
    }
}
