<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 10.12.2017
 * Time: 13:30
 */

namespace validator;

use domain\Module;
class ModuleValidator
{
    private $valid = true;
    private $nameError = null;
    private $descriptionError = null;
    private $ectsError = null;
    public function __construct(Module $module = null)
    {
        if (!is_null($module)) {
            $this->validate($module);
        }
    }

    public function validate(Module $module)
    {
        if (!is_null($module)) {
            if (empty($module->getName())) {
                $this->nameError = 'Please enter a name';
                $this->valid = false;
            }
            if (strlen($module->getName())>30) {
                $this->nameError = 'The module name cannot have more than 30 characters';
                $this->valid = false;
            }
            if (empty($module->getDescription())) {
                $this->descriptionError = 'Please enter a description';
                $this->valid = false;
            }
            if (strlen($module->getDescription())>255) {
                $this->descriptionError = 'The module description cannot have more than 255 characters';
                $this->valid = false;
            }
            $number = filter_var($module->getNumcredits(), FILTER_VALIDATE_INT);
            if (!is_integer($number)) {
                echo "ectsError";
                $this->ectsError = 'Please insert a number as an ECTS value';
                $this->valid = false;
            }
            if ($number > 50 || $number <= 0) {
                echo "ectsError";
                $this->ectsError = 'Please enter a realistic amount of credits';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid(bool $valid)
    {
        $this->valid = $valid;
    }

    /**
     * @return null
     */
    public function getNameError()
    {
        return $this->nameError;
    }

    /**
     * @param null $nameError
     */
    public function setNameError($nameError)
    {
        $this->nameError = $nameError;
    }

    /**
     * @return null
     */
    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    /**
     * @param null $descriptionError
     */
    public function setDescriptionError($descriptionError)
    {
        $this->descriptionError = $descriptionError;
    }

    /**
     * @return null
     */
    public function getEctsError()
    {
        return $this->ectsError;
    }

    /**
     * @param null $ectsError
     */
    public function setEctsError($ectsError)
    {
        $this->ectsError = $ectsError;
    }

}