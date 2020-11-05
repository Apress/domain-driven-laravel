<?php
namespace App\ValueObjects;
abstract class AbstractValue implements ValueObject, \JsonSerializable
{
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
