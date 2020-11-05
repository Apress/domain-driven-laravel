// ddl/database/migrations/{YOUR_TIMESTAMP}_create_claimstatus_table

<?php

...

use App\Models\ClaimStatus;

function up()
{
	Schema::create('claim_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
		 $table->string(‘code’);
     });

	ClaimStatus::create([
		‘id’ => 1,
		‘name’ => ‘Pending Review’,
		‘slug’ => ‘pending_review’,
		‘code’ => ‘PENDING_REVIEW’
	]);

	ClaimStatus::create([
		‘id’ => 1,
		‘name’ => ‘Reviewer Approved’,
		‘slug’ => ‘reviewer_approved’,
		‘code’ => ‘REVIEWER_APPROVED’
	]);

	ClaimStatus::create([
		‘id’ => 1,
		‘name’ => ‘Correction Needed’,
		‘slug’ => ‘correction_needed’,
		‘code’ => ‘CORRECTION_NEEDED’
	]);

	ClaimStatus::create([
		‘id’ => 1,
		‘name’ => ‘Biller Correction Needed’,
		‘slug’ => ‘biller_correction_needed’,
		‘code’ => ‘BILLER_CORRECTION_NEEDED’
	]);

	ClaimStatus::create([
		‘id’ => 1,
		‘name’ => ‘Biller Approved’,
		‘slug’ => ‘biller_approved’,
		‘code’ => ‘BILLER_APPROVED’
	]);
}

