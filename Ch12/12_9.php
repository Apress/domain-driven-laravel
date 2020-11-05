<?php

interface ValueObject
{
	public static function fromNative($value);
	public function equals(ValueObject $object);
	public function __toString();
	public function getNativeValue();
}
