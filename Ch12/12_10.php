<?php
final class EmailAddress implements ValueObject, \JsonSerializable
{
	private $value;

	private function __construct($value)
	{
	   $filteredValue = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($filteredValue === false) {
		throw new \InvalidArgumentException("Invalid argument 
				$value: Not an email address.");
	   }

        $this->value = $filteredValue;
	}

	public function fromNative($value)
	{
		return new static($value);
	}
public function equals(ValueObject $obj)
	{
		if (\get_class(static) !== \get_class($obj)) {
			return false;
		}

		return $this->getNativeValue() === $obj->getNativeValue();
      }
	
	public function getValue()
	{
		return $this->value;
	}

	public function __toString()
	{
		return (string)$this->value;
	}

	public function jsonSerialize()
	{
		return $this->__toString();
	}

	public function getNativeValue()
	{
		return $this->value;
	}
}
