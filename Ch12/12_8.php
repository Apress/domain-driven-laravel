<?php

trait CastsValuesToObjects
{
	protected function castAttribute($key, $value)
	{
		$castToClass = $this->getValueObjectCastType($key);
		if (!$castToClass) {
			return parent::castAttribute($key, $value);
		}
		//or else create a value object:
		return $castToClass::fromNative($value);
	}

	public function setAttribute($key, $value)
	{
		$castToClass = $this->getValueObjectCastRType($key);
		if (!$castToClass) {
			return parent::setAttribute($key, $value)
		}
			
		//Enforce type defined in $casts
		if (! ($value instanceof $castToClass)) {
			throw new InvalidArgumentException(“Attribute ‘$key’ 
			   must be an instance of ‘$castToClass’”);
		}

		return parent::setAttribute($key, $value->getNativeValue();
	}

	public function getValueObjectCastType($key)
	{
		$casts = $this->getCasts();
		$castToClass = isset($casts[$key]) ? $casts[$key] : null;
		if (class_exists($castToClasss)) {
			return $castToClass;
		}
		return null;
	}
}
