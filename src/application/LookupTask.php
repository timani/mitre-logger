<?php

require_once 'phing/Task.php';

/**
* A class to create a task to create a connection to a container.
*
* @author Timani Tunduwani <http:twitter.com/timani_net>
*
*/

class LookupTask extends Task
{
	protected $env = "";
	protected $uuid = "";
	protected $type = "";
	protected $continers = array();

	/**
	* Sets the Pantheon environment
	*/
	public function setEnv($e)
	{
		$this->env = $e;
	}

	/**
	* Sets the UUID of the Pantheon site
	*/
	public function setUUID($u)
	{
		$this->uuid = $u;
	}

	/**
	* Sets the Pantheon type of container
	*/
	public function setType($t)
	{
		$this->type = $t;
	}

	/**
	* Set the containers I.P. addresses
	*/
	public function setContainers($c)
	{
		$this->continers = $c;
	}

	/**
	* Returns the password
	*
	* @returns array A listing of containers
	*/
	public function getContainers()
	{
		// @TODO This needs validation
		$d = $this->getDomain();
		$result = dns_get_record($this->getDomain());
		$containers = array();
		foreach ($result as $res) {
			// Peform a lookup for the I.P.s
			if ($res['type'] == "A") {
				// Add to an array of containers
				$containers[] = $res['ip'];
			}
		}

		$c = $containers;

		return $c;
	}

	/**
	* Create the domain URL for the lookup
	*
	*/
	public function getDomain()
	{
		// @TODO This needs validation
		$this->domain = sprintf("%s.%s.%s.drush.in",$this->type, $this->env, $this->uuid);
		return $this->domain;
	}

	public function main()
	{
		$this->log(sprintf("Starting DNS lookup for %s on %s...", ucfirst($this->type), ucfirst($this->env)));
		// Get the I.P. information for the containers
		$c = $this->getContainers();
		$this->log("Site ID: " . ucfirst($this->uuid));
		$this->log("Dashboard URL: " . sprintf("%s/sites/%s",$this->project->getProperty('dash.url'),
		 															$this->uuid
																));
		$this->log("Container I.P.s: " . json_encode($c));
		$this->log("# of containers on " . ucfirst($this->env) . ": " . sizeof($c));
		// Set the containers as a property available to phing
    $this->project->setProperty('containers', $c);
	}

}
