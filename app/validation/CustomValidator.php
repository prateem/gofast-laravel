<?php

class CustomValidator extends \Illuminate\Validation\Validator {

  /**
   * Validates a valid U.S. or Canadian postal code.
   *
   * @param $attribute The name of the attribute (field) being validated.
   * @param $value The value of the attribute.
   * @param $parameters Parameters passed to the rule.
   * @return int
   */

  public function validatePostcode($attribute, $value, $parameters)
  {
      if(is_numeric($value)) {
        return preg_match('/^\d{5}([\-]?\d{4})?$/', $value);
      } else {
        $regex = '/^([a-ceghj-nprstvxy]\d[a-ceghj-nprstv-z])[ ]?'
            . '(\d[a-ceghj-nprstv-z]\d)$/i';

        return preg_match($regex, $value);
      }
  }

}