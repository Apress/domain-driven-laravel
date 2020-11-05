<?php
//...

public function up()
{
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id'); 	
			 $table->string(‘name’);
			 $table->string(‘slug’);
            $table->timestamps();
        });
    }
}