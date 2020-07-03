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

/* core/themes/stable/templates/admin/color-scheme-form.html.twig */
class __TwigTemplate_95fdcd5da2e77ff9552a96066c49c9964b3ef1652bfd281c255070ee599a36eb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 17, "without" => 21, "t" => 22];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 'without', 't'],
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
        // line 16
        echo "<div class=\"color-form clearfix\">
  ";
        // line 17
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "scheme", [])), "html", null, true);
        echo "
  <div class=\"clearfix color-palette js-color-palette\">
    ";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "palette", [])), "html", null, true);
        echo "
  </div>
  ";
        // line 21
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed(($context["form"] ?? null)), "scheme", "palette"), "html", null, true);
        echo "
  <h2>";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Preview"));
        echo "</h2>
  ";
        // line 23
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_preview"] ?? null)), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/admin/color-scheme-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 23,  72 => 22,  68 => 21,  63 => 19,  58 => 17,  55 => 16,);
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
 * Theme override for a theme's color form.
 *
 * Available variables:
 * - form: Form elements for the color scheme form, including:
 *   - scheme: A color scheme form element. For example: a select element with
 *     color theme presets, or a color picker widget.
 *   - palette: Color fields that can be changed by entering in a new hex value.
 * - html_preview: A HTML preview of the theme's current color scheme.
 *
 * @see template_preprocess_color_scheme_form()
 */
#}
<div class=\"color-form clearfix\">
  {{ form.scheme }}
  <div class=\"clearfix color-palette js-color-palette\">
    {{ form.palette }}
  </div>
  {{ form|without('scheme', 'palette') }}
  <h2>{{ 'Preview'|t }}</h2>
  {{ html_preview }}
</div>
", "core/themes/stable/templates/admin/color-scheme-form.html.twig", "D:\\webserver\\www\\jikstore\\web\\core\\themes\\stable\\templates\\admin\\color-scheme-form.html.twig");
    }
}
