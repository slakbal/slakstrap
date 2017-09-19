<?php

namespace Slakbal\Slakstrap;

use Collective\Html\FormBuilder as CollectiveFormBuilder;

//Bootstrap 4 beta
class BootFormBuilder extends CollectiveFormBuilder
{
    /**
     * An array containing the currently opened form groups.
     *
     * @var array
     */
    protected $groupStack = [];

    const GROUP_CLASS = 'form-group';
    const GROUP_ERROR_CLASS = 'novalidate';
    const ERROR_CLASS = 'is-invalid';
    const SUCCESS_CLASS = 'is-valid';
    const CONTROL_CLASS = 'form-control';
    const SUBMIT_CLASS = 'btn btn-primary';


    /**
     * Open a new form group
     *
     * @param  string $name
     * @param  mixed  $label
     * @param  array  $options
     *
     * @return string
     */
    public function openGroup($name, $label = null, $options = [])
    {
        $options = $this->appendClassToOptions(self::GROUP_CLASS, $options);
        $this->groupStack[] = $name;
        $options = $this->determineState($name, $options);
        $label = $label ? $this->label($name, $label) : '';

        return '<div' . $this->html->attributes($options) . '>' . $label;
    }


    /**
     * Close out the opened form group
     *
     * @return string
     */
    public function closeGroup()
    {
        $name = array_pop($this->groupStack);
        $errors = $this->getFormattedErrors($name);

        return $errors . '</div>';
    }


    /**
     * Create a form input
     *
     * @param  string $type
     * @param  string $name
     * @param  string $value
     * @param  array  $options
     *
     * @return string
     */
    public function input($type, $name, $value = null, $options = [])
    {
        $options = $this->appendClassToOptions(self::CONTROL_CLASS, $options);
        $options = $this->determineState($name, $options);

        return parent::input($type, $name, $value, $options);
    }


    /**
     * Create a select box
     *
     * @param  string $name
     * @param  array  $list
     * @param  string $selected
     * @param  array  $selectAttributes
     * @param  array  $optionsAttributes
     *
     * @return string
     */
    public function select(
        $name,
        $list = [],
        $selected = null,
        array $selectAttributes = [],
        array $optionsAttributes = []
    ) {
        $selectAttributes = $this->appendClassToOptions(self::CONTROL_CLASS, $selectAttributes);
        $optionsAttributes = $this->determineState($name, $optionsAttributes);

        return parent::select($name, $list, $selected, $selectAttributes, $optionsAttributes);
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
     * @param $name
     * @param $options
     *
     * @return array
     */
    public function determineState($name, $options)
    {
        if ($this->hasErrors($name)) {
            $options = $this->appendClassToOptions(self::ERROR_CLASS, $options);
        } elseif (!empty(old($name))) {
            $options = $this->appendClassToOptions(self::SUCCESS_CLASS, $options);
        }

        return $options;
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
     * Create a checkbox
     *
     * @param  string $name
     * @param  mixed  $value
     * @param  mixed  $label
     * @param  bool   $checked
     * @param  array  $options
     *
     * @return string
     */
    public function checkbox($name, $value = 1, $label = null, $checked = null, $options = [])
    {
        $options = $this->determineState($name, $options);

        return $this->wrapCheckable($label, 'checkbox', parent::checkbox($name, $value, $checked, $options));
    }


    /**
     * Create a radio button
     *
     * @param  string $name
     * @param  mixed  $value
     * @param  mixed  $label
     * @param  bool   $checked
     * @param  array  $options
     *
     * @return string
     */
    public function radio($name, $value = null, $label = null, $checked = null, $options = [])
    {
        $options = $this->determineState($name, $options);

        return $this->wrapCheckable($label, 'radio', parent::radio($name, $value, $checked, $options));
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

        return $this->wrapInlineCheckable($label, 'checkbox', parent::checkbox($name, $value, $checked, $options));
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

        return $this->wrapInlineCheckable($label, 'radio', parent::radio($name, $value, $checked, $options));
    }


    /**
     * Create a textarea
     *
     * @param  string $name
     * @param  string $value
     * @param  array  $options
     *
     * @return string
     */
    public function textarea($name, $value = null, $options = [])
    {
        $options = $this->determineState($name, $options);

        return parent::textarea($name, $value, $this->appendClassToOptions(self::CONTROL_CLASS, $options));
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
        isset($options['class']) ? $options['class'] = $options['class'] . ' ' . $class : $options['class'] = $class;

        return $options;
    }


    /**
     * Determine whether the form element with the given name has any validation errors
     *
     * @param  string $name
     *
     * @return bool
     */
    private function hasErrors($name)
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
     * Get the formatted errors for the form element with the given name
     *
     * @param  string $name
     *
     * @return string
     */
    private function getFormattedErrors($name)
    {
        if (!$this->hasErrors($name)) {
            return '';
        }
        // Get errors session
        $errors = $this->getErrorsSession();

        return $errors->first($this->transformKey($name), '<div class="invalid-feedback">:message</div>');
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
    private function wrapCheckable($label, $type, $checkAble)
    {
        return '<div class="' . $type . '"><label>' . $checkAble . ' ' . $label . '</label></div>';
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