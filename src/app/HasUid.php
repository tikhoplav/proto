<?php

namespace App;

trait HasUid
{
	/**
	 * Get model's universal identificator
	 *
	 * @return string
	 */
	public function getUidAttribute(): string
	{
		$id = $this->getRouteKeyName();
		return "{$this->getMorphClass()}/{$this->$id}";
	}

	/**
	 * Add model's uid to the appendix
	 *
	 * @return void
	 */
	public function initializeHasUid(): void
    {
        $this->append('uid');
    }
}