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

/* themes/contrib/bootstrap_barrio/templates/navigation/menu-local-task.html.twig */
class __TwigTemplate_21effdc178381120b3126ec11d5bf75cf3ac4b909979a4bb19fe9247ea510af4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 20];
        $filters = ["join" => 23, "clean_class" => 24, "escape" => 27];
        $functions = ["link" => 27];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['join', 'clean_class', 'escape'],
                ['link']
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
        // line 20
        $context["classes"] = [0 => "nav-link", 1 => ((        // line 22
($context["is_active"] ?? null)) ? ("active") : ("")), 2 => (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 23
($context["item"] ?? null), "url", []), "getOption", [0 => "attributes"], "method"), "class", [])) ? (twig_join_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute(($context["item"] ?? null), "url", []), "getOption", [0 => "attributes"], "method"), "class", [])), " ")) : ("")), 3 => ("nav-link-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(        // line 24
($context["item"] ?? null), "url", []), "toString", [], "method"))))];
        // line 27
        echo "<li";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ((($context["is_active"] ?? null)) ? ("active") : ("")), 1 => "nav-item"], "method")), "html", null, true);
        echo ">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getLink($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "text", [])), $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "url", [])), ["class" => ($context["classes"] ?? null)]), "html", null, true);
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/navigation/menu-local-task.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 27,  58 => 24,  57 => 23,  56 => 22,  55 => 20,);
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
 * Bootstrap Barrio's Theme override for a local task link.
 *
 * Available variables:
 * - attributes: HTML attributes for the wrapper element.
 * - is_active: Whether the task item is an active tab.
 * - link: A rendered link element.
 * - item.text: Text for the link
 * - item.url: URL object for link
 *
 * Note: This template renders the content for each task item in
 * menu-local-tasks.html.twig.
 *
 * @see template_preprocess_menu_local_task()
 */
#}
{%
  set classes = [
    'nav-link',
    is_active ? 'active',
    item.url.getOption('attributes').class ? item.url.getOption('attributes').class | join(' '),
    'nav-link-' ~ item.url.toString() | clean_class,
  ]
%}
<li{{ attributes.addClass(is_active ? 'active', 'nav-item') }}>{{ link(item.text, item.url, {'class': classes}) }}</li>
", "themes/contrib/bootstrap_barrio/templates/navigation/menu-local-task.html.twig", "D:\\webserver\\www\\jikstore\\web\\themes\\contrib\\bootstrap_barrio\\templates\\navigation\\menu-local-task.html.twig");
    }
}
