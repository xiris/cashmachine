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

    public static function validate($money)
    {
        if (self::VALIDATE_EMPTY && empty($money))
            throw new CashMachineException('Please type some value, ok?');

        return true;
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
echo "** Welcome to Xiris International Bank :D **\n";
echo "**                                        **\n";
echo "********************************************\n\n";

fwrite(STDOUT, "- Please, type how much money do you want baby: ");

// get input
$money = trim(fgets(STDIN));
$cashMachine = new CashMachine();

// write input back
if (!empty($money)) {
    // casting money, i dont want to have problems =/
    $moneyback = $cashMachine->getNotesByValue((int)$money);
    fwrite(STDOUT, "- Ohh God, \${$moneyback} bucks");
} else {
    fwrite(STDOUT, "- I think you dont have money, han? =/");
}

fwrite(STDOUT, "\n\nThanks to use and abuse! :D");
