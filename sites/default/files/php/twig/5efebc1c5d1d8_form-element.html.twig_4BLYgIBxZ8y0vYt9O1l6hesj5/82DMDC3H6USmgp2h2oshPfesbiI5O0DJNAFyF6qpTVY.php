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

/* themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig */
class __TwigTemplate_249bf6ade5a99db691cdcc962cc0aa4345925c911da8a6b82f759a006922fa46 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 48, "set" => 50];
        $filters = ["clean_class" => 79, "escape" => 97, "raw" => 108];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['clean_class', 'escape', 'raw'],
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
        // line 47
        echo "
";
        // line 48
        if ((($context["type"] ?? null) == "checkbox")) {
            // line 49
            echo "  ";
            if ((($context["customtype"] ?? null) == "custom")) {
                // line 50
                echo "    ";
                $context["wrapperclass"] = "custom-control custom-checkbox";
                // line 51
                echo "    ";
                $context["labelclass"] = "custom-control-label";
                // line 52
                echo "    ";
                $context["inputclass"] = "custom-control-input";
                // line 53
                echo "  ";
            } elseif ((($context["customtype"] ?? null) == "switch")) {
                // line 54
                echo "    ";
                $context["wrapperclass"] = "custom-control custom-switch";
                // line 55
                echo "    ";
                $context["labelclass"] = "custom-control-label";
                // line 56
                echo "    ";
                $context["inputclass"] = "custom-control-input";
                // line 57
                echo "  ";
            } else {
                // line 58
                echo "    ";
                $context["wrapperclass"] = "form-check";
                // line 59
                echo "    ";
                $context["labelclass"] = "form-check-label";
                // line 60
                echo "    ";
                $context["inputclass"] = "form-check-input";
                // line 61
                echo "  ";
            }
        }
        // line 63
        echo "
";
        // line 64
        if ((($context["type"] ?? null) == "radio")) {
            // line 65
            echo "  ";
            if ((($context["customtype"] ?? null) == "custom")) {
                // line 66
                echo "    ";
                $context["wrapperclass"] = "custom-control custom-radio";
                // line 67
                echo "    ";
                $context["labelclass"] = "custom-control-label";
                // line 68
                echo "    ";
                $context["inputclass"] = "custom-control-input";
                // line 69
                echo "  ";
            } else {
                // line 70
                echo "    ";
                $context["wrapperclass"] = "form-check";
                // line 71
                echo "    ";
                $context["labelclass"] = "form-check-label";
                // line 72
                echo "    ";
                $context["inputclass"] = "form-check-input";
                // line 73
                echo "  ";
            }
        }
        // line 75
        echo "
";
        // line 77
        $context["classes"] = [0 => "js-form-item", 1 => ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 79
($context["type"] ?? null)))), 2 => ((twig_in_filter(        // line 80
($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null)))) : (("form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null)))))), 3 => ((twig_in_filter(        // line 81
($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) ? (($context["wrapperclass"] ?? null)) : ("")), 4 => ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 82
($context["name"] ?? null)))), 5 => ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 83
($context["name"] ?? null)))), 6 => ((!twig_in_filter(        // line 84
($context["title_display"] ?? null), [0 => "after", 1 => "before"])) ? ("form-no-label") : ("")), 7 => (((        // line 85
($context["disabled"] ?? null) == "disabled")) ? ("disabled") : ("")), 8 => ((        // line 86
($context["errors"] ?? null)) ? ("has-error") : (""))];
        // line 90
        $context["description_classes"] = [0 => "description", 1 => "text-muted", 2 => (((        // line 93
($context["description_display"] ?? null) == "invisible")) ? ("sr-only") : (""))];
        // line 96
        if (twig_in_filter(($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) {
            // line 97
            echo "  <div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 98
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 99
                echo "      <span class=\"field-prefix\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null)), "html", null, true);
                echo "</span>
    ";
            }
            // line 101
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 102
                echo "      <div";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "attributes", [])), "html", null, true);
                echo ">
        ";
                // line 103
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 106
            echo "    ";
            if ((($context["label_display"] ?? null) == "before")) {
                // line 107
                echo "      <label ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["labelclass"] ?? null)], "method"), "setAttribute", [0 => "for", 1 => $this->getAttribute(($context["input_attributes"] ?? null), "id", [])], "method")), "html", null, true);
                echo ">
        ";
                // line 108
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null)));
                echo "
      </label>
    ";
            }
            // line 111
            echo "    <input";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["input_attributes"] ?? null), "addClass", [0 => ($context["inputclass"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 112
            if ((($context["label_display"] ?? null) == "after")) {
                // line 113
                echo "      <label ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["labelclass"] ?? null)], "method"), "setAttribute", [0 => "for", 1 => $this->getAttribute(($context["input_attributes"] ?? null), "id", [])], "method")), "html", null, true);
                echo ">
        ";
                // line 114
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null)));
                echo "
      </label>
    ";
            }
            // line 117
            echo "    ";
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 118
                echo "      <span class=\"field-suffix\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null)), "html", null, true);
                echo "</span>
    ";
            }
            // line 120
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 121
                echo "      <div class=\"invalid-feedback\">
        ";
                // line 122
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null)), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 125
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 126
                echo "      <small";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", []), "addClass", [0 => ($context["description_classes"] ?? null)], "method")), "html", null, true);
                echo ">
        ";
                // line 127
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 130
            echo "  </div>
";
        } else {
            // line 132
            echo "  <fieldset";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null), 1 => "form-group"], "method")), "html", null, true);
            echo ">
    ";
            // line 133
            if (twig_in_filter(($context["label_display"] ?? null), [0 => "before", 1 => "invisible"])) {
                // line 134
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 136
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 137
                echo "      <div class=\"input-group\">
    ";
            }
            // line 139
            echo "    ";
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 140
                echo "      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">";
                // line 141
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null)), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 144
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 145
                echo "      <div";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "attributes", [])), "html", null, true);
                echo ">
        ";
                // line 146
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 149
            echo "    ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
            echo "
    ";
            // line 150
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 151
                echo "      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">";
                // line 152
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null)), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 155
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 156
                echo "      </div>
    ";
            }
            // line 158
            echo "    ";
            if ((($context["label_display"] ?? null) == "after")) {
                // line 159
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 161
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 162
                echo "      <div class=\"invalid-feedback\">
        ";
                // line 163
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null)), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 166
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 167
                echo "      <small";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", []), "addClass", [0 => ($context["description_classes"] ?? null)], "method")), "html", null, true);
                echo ">
        ";
                // line 168
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 171
            echo "  </fieldset>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 171,  347 => 168,  342 => 167,  339 => 166,  333 => 163,  330 => 162,  327 => 161,  321 => 159,  318 => 158,  314 => 156,  311 => 155,  305 => 152,  302 => 151,  300 => 150,  295 => 149,  289 => 146,  284 => 145,  281 => 144,  275 => 141,  272 => 140,  269 => 139,  265 => 137,  262 => 136,  256 => 134,  254 => 133,  249 => 132,  245 => 130,  239 => 127,  234 => 126,  231 => 125,  225 => 122,  222 => 121,  219 => 120,  213 => 118,  210 => 117,  204 => 114,  199 => 113,  197 => 112,  192 => 111,  186 => 108,  181 => 107,  178 => 106,  172 => 103,  167 => 102,  164 => 101,  158 => 99,  156 => 98,  151 => 97,  149 => 96,  147 => 93,  146 => 90,  144 => 86,  143 => 85,  142 => 84,  141 => 83,  140 => 82,  139 => 81,  138 => 80,  137 => 79,  136 => 77,  133 => 75,  129 => 73,  126 => 72,  123 => 71,  120 => 70,  117 => 69,  114 => 68,  111 => 67,  108 => 66,  105 => 65,  103 => 64,  100 => 63,  96 => 61,  93 => 60,  90 => 59,  87 => 58,  84 => 57,  81 => 56,  78 => 55,  75 => 54,  72 => 53,  69 => 52,  66 => 51,  63 => 50,  60 => 49,  58 => 48,  55 => 47,);
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
 * Theme override for a form element.
 *
 * Available variables:
 * - attributes: HTML attributes for the containing element.
 * - errors: (optional) Any errors for this form element, may not be set.
 * - prefix: (optional) The form element prefix, may not be set.
 * - suffix: (optional) The form element suffix, may not be set.
 * - required: The required marker, or empty if the associated form element is
 *   not required.
 * - type: The type of the element.
 * - name: The name of the element.
 * - label: A rendered label element.
 * - label_display: Label display setting. It can have these values:
 *   - before: The label is output before the element. This is the default.
 *     The label includes the #title and the required marker, if #required.
 *   - after: The label is output after the element. For example, this is used
 *     for radio and checkbox #type elements. If the #title is empty but the
 *     field is #required, the label will contain only the required marker.
 *   - invisible: Labels are critical for screen readers to enable them to
 *     properly navigate through forms but can be visually distracting. This
 *     property hides the label for everyone except screen readers.
 *   - attribute: Set the title attribute on the element to create a tooltip but
 *     output no label element. This is supported only for checkboxes and radios
 *     in \\Drupal\\Core\\Render\\Element\\CompositeFormElementTrait::preRenderCompositeFormElement().
 *     It is used where a visual label is not needed, such as a table of
 *     checkboxes where the row and column provide the context. The tooltip will
 *     include the title and required marker.
 * - description: (optional) A list of description properties containing:
 *    - content: A description of the form element, may not be set.
 *    - attributes: (optional) A list of HTML attributes to apply to the
 *      description content wrapper. Will only be set when description is set.
 * - description_display: Description display setting. It can have these values:
 *   - before: The description is output before the element.
 *   - after: The description is output after the element. This is the default
 *     value.
 *   - invisible: The description is output after the element, hidden visually
 *     but available to screen readers.
 * - disabled: True if the element is disabled.
 * - title_display: Title display setting.
 *
 * @see template_preprocess_form_element()
 */
#}

{% if type == 'checkbox' %}
  {% if customtype == 'custom' %}
    {% set wrapperclass = \"custom-control custom-checkbox\" %}
    {% set labelclass = \"custom-control-label\" %}
    {% set inputclass = \"custom-control-input\" %}
  {% elseif customtype == 'switch' %}
    {% set wrapperclass = \"custom-control custom-switch\" %}
    {% set labelclass = \"custom-control-label\" %}
    {% set inputclass = \"custom-control-input\" %}
  {% else %}
    {% set wrapperclass = \"form-check\" %}
    {% set labelclass = \"form-check-label\" %}
    {% set inputclass = \"form-check-input\" %}
  {% endif %}
{% endif %}

{% if type == 'radio' %}
  {% if customtype == 'custom' %}
    {% set wrapperclass = \"custom-control custom-radio\" %}
    {% set labelclass = \"custom-control-label\" %}
    {% set inputclass = \"custom-control-input\" %}
  {% else %}
    {% set wrapperclass = \"form-check\" %}
    {% set labelclass = \"form-check-label\" %}
    {% set inputclass = \"form-check-input\" %}
  {% endif %}
{% endif %}

{%
  set classes = [
    'js-form-item',
    'js-form-type-' ~ type|clean_class,
    type in ['checkbox', 'radio'] ? type|clean_class : 'form-type-' ~ type|clean_class,
    type in ['checkbox', 'radio'] ? wrapperclass,
    'js-form-item-' ~ name|clean_class,
    'form-item-' ~ name|clean_class,
    title_display not in ['after', 'before'] ? 'form-no-label',
    disabled == 'disabled' ? 'disabled',
    errors ? 'has-error',
  ]
%}
{%
  set description_classes = [
    'description',
\t  'text-muted',
    description_display == 'invisible' ? 'sr-only',
  ]
%}
{% if type in ['checkbox', 'radio'] %}
  <div{{ attributes.addClass(classes) }}>
    {% if prefix is not empty %}
      <span class=\"field-prefix\">{{ prefix }}</span>
    {% endif %}
    {% if description_display == 'before' and description.content %}
      <div{{ description.attributes }}>
        {{ description.content }}
      </div>
    {% endif %}
    {% if label_display == 'before' %}
      <label {{ label_attributes.addClass(labelclass).setAttribute('for', input_attributes.id) }}>
        {{ input_title | raw }}
      </label>
    {% endif %}
    <input{{ input_attributes.addClass(inputclass) }}>
    {% if label_display == 'after' %}
      <label {{ label_attributes.addClass(labelclass).setAttribute('for', input_attributes.id) }}>
        {{ input_title | raw }}
      </label>
    {% endif %}
    {% if suffix is not empty %}
      <span class=\"field-suffix\">{{ suffix }}</span>
    {% endif %}
    {% if errors %}
      <div class=\"invalid-feedback\">
        {{ errors }}
      </div>
    {% endif %}
    {% if description_display in ['after', 'invisible'] and description.content %}
      <small{{ description.attributes.addClass(description_classes) }}>
        {{ description.content }}
      </small>
    {% endif %}
  </div>
{% else %}
  <fieldset{{ attributes.addClass(classes, 'form-group') }}>
    {% if label_display in ['before', 'invisible'] %}
      {{ label }}
    {% endif %}
    {% if (prefix is not empty) or (suffix is not empty) %}
      <div class=\"input-group\">
    {% endif %}
    {% if prefix is not empty %}
      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">{{ prefix }}</span>
      </div>
    {% endif %}
    {% if description_display == 'before' and description.content %}
      <div{{ description.attributes }}>
        {{ description.content }}
      </div>
    {% endif %}
    {{ children }}
    {% if suffix is not empty %}
      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">{{ suffix }}</span>
      </div>
    {% endif %}
    {% if (prefix is not empty) or (suffix is not empty) %}
      </div>
    {% endif %}
    {% if label_display == 'after' %}
      {{ label }}
    {% endif %}
    {% if errors %}
      <div class=\"invalid-feedback\">
        {{ errors }}
      </div>
    {% endif %}
    {% if description_display in ['after', 'invisible'] and description.content %}
      <small{{ description.attributes.addClass(description_classes) }}>
        {{ description.content }}
      </small>
    {% endif %}
  </fieldset>
{% endif %}
", "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig", "D:\\webserver\\www\\jikstore\\web\\themes\\contrib\\bootstrap_barrio\\templates\\form\\form-element.html.twig");
    }
}
