// dll/database/migrations/{YOUR_TIMESTAMP}/_create_claim_table.php

<?php 

...

class CreateClaimsTable extends Migration
{
	Schema::create('claims', function (Blueprint $table) {
        $table->bigIncrements('id');
		$table->integer(‘status_id’)->unsigned();
		$table->integer(‘provider_id’)->unsigned();
		$table->integer(‘patient_id’)->unsigned();
		$table->integer(‘cpt_code_combo_id’)->unsigned();
		$table->integer(‘progress_note_id’)->unsigned();
		//define foreign keys:
		$table->foreign(‘practice_id’)
			->references(Practice::class)
`			->on(‘id’);
		$table->foreign(‘provider_id’)
			->references(Provider::class)
			->on(‘id’);
		$table->foreign(‘patient_id’)
			->references(Patient::class)
			->on(‘id’)
		$table->foreign(‘cpt_code_combo_id’)
			 ->references(CptCodeCombo::class)
			 ->on(‘id’);
		$table->foreign(‘progress_note_id’)
			->references(ProgressNote::class)
			->on(‘id’);
		$table->foreign(‘status_id’)
			->references(ClaimStatus::class)
			->on(‘id’);
		$table->datetime(‘date_of_service’);
           $table->timestamps();
     });
}
