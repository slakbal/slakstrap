<?php

namespace Slakbal\Slakstrap;

use Collective\Html\FormBuilder as CollectiveFormBuilder;

//Bootstrap 4 beta
class BootFormBuilder extends CollectiveFormBuilder
{

    const GROUP_CLASS = 'form-group';
    const GROUP_ERROR_CLASS = 'novalidate';
    const ERROR_CLASS = 'is-invalid';
    const SUCCESS_CLASS = 'is-valid';
    const CONTROL_CLASS = 'form-control';
    const FILE_CLASS = 'form-control-file';
    const SELECT_CLASS = 'form-control';
    const SUBMIT_CLASS = 'btn btn-primary';
    const CHECKBOX_CLASS = 'form-check-input';
    const CHECKBOX_GROUP = 'form-check';


    public function text($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::text($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function email($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::email($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function password($name, $label = null, $options = ['required'], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::password($name, $options)
            . $this->closeGroup($name, $help);
    }


    public function search($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::search($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function tel($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::tel($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function number($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::number($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function date($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::date($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function datetime($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::datetime($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function datetimeLocal($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::datetimeLocal($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function time($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::time($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function url($name, $value = null, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, [])
            . parent::url($name, $value, $options)
            . $this->closeGroup($name, $help);
    }


    public function file($name, $label = null, $options = [], $help = null)
    {
        return $this->openGroup($name, $label, $options)
            . parent::file($name, $this->appendClassToOptions(self::FILE_CLASS, $options))
            . $this->closeGroup($name, $help);
    }


    public function textarea($name, $value = null, $label = null, $options = [], $help = null)
    {
        $options = $this->determineState($name, $options);

        return $this->openGroup($name, $label, $options)
            . parent::textarea($name, $value, $this->appendClassToOptions(self::CONTROL_CLASS, $options))
            . $this->closeGroup($name, $help);
    }


    public function dropdown(
        $name,
        $list = [],
        $selected = null,
        $label = null,
        array $selectAttributes = [],
        array $optionsAttributes = [],
        $help = null
    ) {
        $selectAttributes = $this->appendClassToOptions(self::SELECT_CLASS, $selectAttributes);

        $selectAttributes = $this->determineState($name, $selectAttributes);

        return $this->openGroup($name, $label, [])
            . parent::select($name, $list, $selected, $selectAttributes, $optionsAttributes)
            . $this->closeGroup($name, $help);
    }


    public function checkbox($name, $value = 1, $label = null, $checked = false, $options = [], $help = null)
    {
        return $this->wrapCheckable($name, $label, parent::checkbox($name, $value, $checked, $this->appendClassToOptions(self::CHECKBOX_CLASS, $options)), $options, $help);
    }


    public function radio($name, $value = null, $label = null, $checked = null, $options = [], $help = null)
    {
        return $this->wrapCheckable($name, $label, parent::radio($name, $value, $checked, $this->appendClassToOptions(self::CHECKBOX_CLASS, $options)), $options, $help);
    }


    /**
     * Wrap the given checkable in the necessary wrappers
     *
     * @param  mixed  $label
     * @param  string $type
     * @param  string $checkAble
     *
     * @return string
     */
    private function wrapCheckable($name, $label, $checkAble, $options = [], $help = null)
    {
        return '<div class="form-group"><div' . $this->html->attributes($this->determineState($name, ['class'=>'form-check'])) . '><label' . $this->html->attributes($this->determineState($name, ['class'=>'form-check-label'])) . '>' . $checkAble . ' ' . $label . '</label>'.$this->subLabel($name, $help).'</div></div>';
    }


    /**
     * Open a new form group
     *
     * @param  string $name
     * @param  mixed  $label
     * @param  array  $options
     *
     * @return string
     */
    public function openGroup($name, $label = null, $options = [], $labelOptions = [])
    {
        $options = $this->appendClassToOptions(self::GROUP_CLASS, $options);

        $options = $this->determineState($name, $options);

        return '<div' . $this->html->attributes($options) . '>' . $this->label($name, $label, $labelOptions);
    }


    /**
     * Close out the opened form group
     *
     * @return string
     */
    public function closeGroup($name, $help = null)
    {
        return $this->subLabel($name, $help) . '</div>';
    }


    public function label($name, $label = null, $options = [], $escape_html = true)
    {
        return $label ? parent::label($name, $label = null, $options, $escape_html = true) : '';
    }


    public function subLabel($name, $value = null)
    {
        if ($this->hasErrors($name)) {
            return $this->getFormattedErrors($name);
        } else {
            return $value ? $this->toHtmlString('<div for="' . $name . 'SubLabel" class="text-muted small">' . $value . '</div>') : '';
        }
    }


    /**
     * Get the formatted errors for the form element with the given name
     *
     * @param  string $name
     *
     * @return string
     */
    private function getFormattedErrors($name)
    {
        // Get errors session
        $errors = $this->getErrorsSession();

        return $errors->first($this->transformKey($name),
            '<div for="' . $name . '" class="invalid-feedback d-block">:message</div>');
    }


    public function determineState($name, $options)
    {
        if ($this->hasErrors($name)) {
            $options = $this->appendClassToOptions(self::ERROR_CLASS, $options);
        } elseif (!empty(old($name))) {
            $options = $this->appendClassToOptions(self::SUCCESS_CLASS, $options);
        }

        return $options;
    }


    public function input($type, $name, $value = null, $options = [])
    {
        $options = $this->appendClassToOptions(self::CONTROL_CLASS, $options);

        $options = $this->determineState($name, $options);

        return parent::input($type, $name, $value, $options);
    }


    /**
     * Create a plain form
     *
     * @param  string $type
     * @param  string $name
     * @param  string $value
     * @param  array  $options
     *
     * @return string
     */
    public function plainInput($type, $name, $value = null, $options = [])
    {
        return parent::input($type, $name, $value, $options);
    }


    /**
     * Create a plain select box
     *
     * @param  string $name
     * @param  array  $list
     * @param  string $selected
     * @param  array  $selectAttributes
     * @param  array  $optionsAttributes
     *
     * @return string
     */
    public function plainSelect(
        $name,
        $list = [],
        $selected = null,
        array $selectAttributes = [],
        array $optionsAttributes = []
    ) {
        return parent::select($name, $list, $selected, $selectAttributes, $optionsAttributes);
    }


    /**
     * Create a checkable
     *
     * @param  string $type
     * @param  string $name
     * @param  mixed  $value
     * @param  bool   $checked
     * @param  array  $options
     *
     * @return string
     */
    protected function checkable($type, $name, $value, $checked, $options)
    {
        if ($this->getCheckedState($type, $name, $value, $checked)) {
            $options['checked'] = 'checked';
        }

        $options = $this->determineState($name, $options);

        return parent::input($type, $name, $value, $options);
    }


    /**
     * Create an inline checkbox
     *
     * @param  string $name
     * @param  mixed  $value
     * @param  mixed  $label
     * @param  bool   $checked
     * @param  array  $options
     *
     * @return string
     */
    public function inlineCheckbox($name, $value = 1, $label = null, $checked = null, $options = [])
    {
        $options = $this->determineState($name, $options);

        return $this->wrapInlineCheckable(
            $label,
            'checkbox',
            parent::checkbox($name, $value, $checked, $options)
        );
    }


    /**
     * Create an inline radio button
     *
     * @param  string $name
     * @param  mixed  $value
     * @param  mixed  $label
     * @param  bool   $checked
     * @param  array  $options
     *
     * @return string
     */
    public function inlineRadio($name, $value = null, $label = null, $checked = null, $options = [])
    {
        $options = $this->determineState($name, $options);

        return $this->wrapInlineCheckable(
            $label,
            'radio',
            parent::radio($name, $value, $checked, $options)
        );
    }


    /**
     * Create a plain textarea
     *
     * @param  string $name
     * @param  string $value
     * @param  array  $options
     *
     * @return string
     */
    public function plainTextarea($name, $value = null, $options = [])
    {
        return parent::textarea($name, $value, $options);
    }


    /**
     * Create a submit button element.
     *
     * @param  string $value
     * @param  array  $options
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function submit($value = null, $options = [])
    {
        $options['type'] = 'submit';
        $options = $this->appendClassToOptions(self::SUBMIT_CLASS, $options);

        return $this->button($value, $options);
    }


    /**
     * Append the class to the given options array
     *
     * @param  string $class
     * @param  array  $options
     *
     * @return array
     */
    private function appendClassToOptions($class, array $options = [])
    {
        isset($options['class'])
            ? $options['class'] = $options['class'] . ' ' . $class
            : $options['class'] = $class;

        return $options;
    }


    /**
     * Determine whether the form element with the given name has any validation errors
     *
     * @param  string $name
     *
     * @return bool
     */
    public function hasErrors($name)
    {
        if (is_null($this->session) || !$this->session->has('errors')) {
            return false;
        }
        // Get errors session
        $errors = $this->getErrorsSession();

        return $errors->has($this->transformKey($name));
    }


    /**
     * Get errors session
     *
     * @return mixed
     */
    private function getErrorsSession()
    {
        return $this->session->get('errors');
    }





    /**
     * Wrap the given checkable in the necessary inline wrappers
     *
     * @param  mixed  $label
     * @param  string $type
     * @param  string $checkAble
     *
     * @return string
     */
    private function wrapInlineCheckable($label, $type, $checkAble)
    {
        return '<div class="' . $type . '-inline">' . $checkAble . ' ' . $label . '</div>';
    }
}