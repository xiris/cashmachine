<?php

namespace Xiris;

/**
 * Class NoFundsException
 *
 * @package     Xiris
 * @author      Christopher Silva
 */
class CashMachineException extends \Exception{}


/**
 * Class ValidateMoney
 *  Just an example of validation class
 *
 * @package Xiris
 * @author  Christopher Silva
 */
class ValidateMoney
{
    const VALIDATE_INTEGER = true;
    const VALIDATE_EMPTY   = true;

    public function __construct($money)
    {
        if (self::VALIDATE_EMPTY && empty($value))
            throw new CashMachineException('Please type some value, ok?');
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

    public static function getNotesByValue($value)
    {
        if (empty($value))


        if (!is_int($value))
            throw new CashMachineExceptions('Type only integer values.');

        if ()

    }

    private function

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
    $cashMachine->getNotesByValue($money);
    fwrite(STDOUT, "- Ohh God, \${$money} bucks");
} else {
    echo "- I think you dont have money, han? =/";
}

echo "\n\nThanks to use and abuse! :D";
