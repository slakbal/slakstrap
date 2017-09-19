<?php

namespace Slakbal\Slakstrap;

use Collective\Html\FormBuilder as CollectiveFormBuilder;

//Bootstrap 4 beta
class BootFormBuilder extends CollectiveFormBuilder
{

    const ERROR_CLASS = 'is-invalid';
    const SUCCESS_CLASS = 'is-valid';
    const INPUT_CLASS = 'form-control';
    const SELECT_CLASS = 'form-control custom-select';


    /**
     * Determine the state of the control and apply error or success classes based on if the form was submitted
     *
     *
     * @return string
     */
    public function determineState($name, $options)
    {
        //dump(!empty((old($name))));
        if ($this->hasErrors($name)) {
            $options = $this->appendClassToOptions(self::ERROR_CLASS, $options);
        } elseif (old($name)) {
            $options = $this->appendClassToOptions(self::SUCCESS_CLASS, $options);
        }

        return $options;
    }


    /**
     * create sub label under the control. if error is available the error will be shown
     *
     *
     * @return string
     */
    public function subLabel($name, $helpMsg = null, $errorMsg = null)
    {
        if ($this->hasErrors($name)) {
            return $errorMsg ? $this->toHtmlString('<div for="' . $name . '" class="invalid-feedback d-block">' . $errorMsg . '</div>') : $this->getFormattedErrors($name);
        } else {
            return $helpMsg ? $this->toHtmlString('<div for="' . $name . 'SubLabel" class="text-muted small">' . $helpMsg . '</div>') : '';
        }
    }


    /**
     * Get formatted error string
     *
     *
     * @return string
     */
    private function getFormattedErrors($name)
    {
        // Get errors session
        $errors = $this->getErrorsSession();

        return $errors->first($this->transformKey($name), '<div for="' . $name . '" class="invalid-feedback d-block">:message</div>');
    }


    /**
     * override from collective parent
     *
     *
     * @return string
     */
    public function input($type, $name, $value = null, $options = [])
    {
        $options = $this->appendClassToOptions(self::INPUT_CLASS, $options);
        $options = $this->determineState($name, $options);

        //dump($options);
        return parent::input($type, $name, $value, $options);
    }


    /**
     * override from collective parent
     *
     *
     * @return string
     */
    public function select($name, $list = [], $selected = null, array $selectAttributes = [], array $optionsAttributes = [])
    {
        $selectAttributes = $this->determineState($name, $selectAttributes);

        //dump($selectAttributes);
        return parent::select($name, $list, $selected, $this->appendClassToOptions(self::SELECT_CLASS, $selectAttributes), $optionsAttributes);
    }


    /**
     * override from collective parent
     *
     *
     * @return string
     */
    public function textarea($name, $value = null, $options = [])
    {
        $options = $this->determineState($name, $options);

        return parent::textarea($name, $value, $this->appendClassToOptions(self::INPUT_CLASS, $options));
    }


    /**
     * override from collective parent
     *
     *
     * @return string
     */
    protected function checkable($type, $name, $value, $checked, $options)
    {
        if ($this->getCheckedState($type, $name, $value, $checked)) {
            $options['checked'] = 'checked';
        }
        $options = $this->determineState($name, $options);

        //dump($options);
        return parent::input($type, $name, $value, $options);
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

}