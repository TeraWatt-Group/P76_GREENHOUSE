<?php

namespace Terawatt\Greenhouse;

use Illuminate\Filesystem\Filesystem;

class Greenhouse
{
	protected $version;
	protected $filesystem;

	public function __construct()
	{
		$this->filesystem = app(Filesystem::class);

		$this->findVersion();
	}

	public function getVersion()
    {
        return $this->version;
    }

	protected function findVersion()
	{
		if (!is_null($this->version)) {
			return;
		}

		if ($this->filesystem->exists(base_path('composer.lock'))) {
			// Get the composer.lock file
			$file = json_decode(
				$this->filesystem->get(base_path('composer.lock'))
			);

			// Loop through all the packages and get the version of terawatt/greenhouse
			foreach ($file->packages as $package) {
				if ($package->name == 'terawatt/greenhouse') {
					$this->version = $package->version;
					break;
				}
			}
		}
	}
}