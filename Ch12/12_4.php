<?php

   /**
     * Set the array of model attributes. No checking is done.
     *
     * @param  array  $attributes
    * @param  bool  $sync
    * @return $this
    */
   public function setRawAttributes(array $attributes, $sync=false)
   {
       $this->attributes = $attributes;
        if ($sync) {
           $this->syncOriginal();
      }
        return $this;
   }
