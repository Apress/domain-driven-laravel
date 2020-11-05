<?php

   /**
     * Get listener dirs that should be used to discover Events.
     *
     * @return array
     */
    protected function discoverEventsWithin()
    {
        return [
            $this->app->path('Listeners'),
		 $this->app->path(base_path(
			'src/Claim/Submission/Application/Listeners')),
		];
    }

