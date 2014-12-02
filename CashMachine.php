<?php

namespace XirisApps;

/**
 * Class CashMachineException
 *
 * @package XirisApps
 * @author  Christopher Silva
 */
class CashMachineException extends \Exception{}


/**
 * Class ValidateMoney
 *  Just an example of validation class
 *
 * @package XirisApps
 * @author  Christopher Silva
 */
class ValidateMoney
{
    const VALIDATE_INTEGER = false;
    const VALIDATE_EMPTY   = true;

    /**
     * @param $money
     * @return bool
     * @throws CashMachineException
     */
    public static function validate($money)
    {
        if (self::VALIDATE_EMPTY && empty($money))
            throw new CashMachineException('Please type some value, ok?');

        return true;
    }

    /**
     * @param $value
     * @param $min
     * @return bool
     */
    public static function isTooLower($value, $min)
    {
        if ($value < $min)
            return true;

        return false;
    }
}


/**
 * Class CashMachine
 *
 * @package     Xiris
 * @author      Christopher Silva
 */
class CashMachine
{
    /**
     * @var     array
     * @access  private
     */
    private $availableNotes = [10, 20, 50, 100];
    private $countNotes     = [];

    public function getNotesByValue($value)
    {
        $validate = \XirisApps\ValidateMoney::validate($value);

        if (in_array($value, $this->getAvailableNotes())) {
            return $value;
        }

        // ...
    }

    /**
     * @param $value
     * @return bool
     */
    public function isTooLower($value)
    {
        // use ValidateMoney::isTooLower in case we want to put more validations
        return \XirisApps\ValidateMoney::isTooLower($value, min($this->getAvailableNotes()));
    }

    /**
     * @param $key
     * @param $value
     */
    public function setCountNotes($key, $value)
    {
        $this->countNotes[$key] += $value;
    }

    /**
     * @param   null $key
     * @return  array
     */
    public function getCountNotes($key = null)
    {
        if (is_null($key))
            return $this->countNotes;

        return $this->countNotes[$key];
    }

    /**
     * @return  array
     */
    public function getAvailableNotes()
    {
        return $this->availableNotes;
    }
}



/**
 * Interactive PHP Client
 */

echo "********************************************\n";
echo "**                                        **\n";
echo "** WELCOME TO XIRIS INTERNATIONAL BANK :D **\n";
echo "**                                        **\n";
echo "********************************************\n\n";

fwrite(STDOUT, "- Please, type how much money do you want baby: ");

// casting money, i dont want to have problems =/
$money       = (int) trim(fgets(STDIN));
$cashMachine = new CashMachine();

if (!empty($money)) {
    // verify minimal inputed value
    while ($cashMachine->isTooLower($money)) {
        fwrite(STDOUT, "- Hey, this money doesn't pay my coffee =/ ... \n\n");
        fwrite(STDOUT, "- Please, type how much money do you want baby: ");
        // casting money, i dont want to have problems =/
        $money = (int) trim(fgets(STDIN));
    }

    $moneyback = $cashMachine->getNotesByValue($money);

    fwrite(STDOUT, "- Ohh God, \"\${$moneyback}\" bucks.\n");
    fwrite(STDOUT, "- Please, wait a moment ...\n");

} else {
    fwrite(STDOUT, "\n- I think you dont have money, han? =/\n");
}

fwrite(STDOUT, "\n\nThanks to use and abuse! :D\n\n");
