<?php
/**
 * Simple hook class that provides whatever hooks you want
 */
class Hooker {
	
	private $hooks;
	
	/**
	 * @param $hooks Array An associative array of
	 * 			$hook String => $callbacks Array
	 */
	public function __construct($hooks = array()) {
		$this->hooks = $hooks;
	}

	/**
	 * Adds a callback to a hook
	 * @param $hook String Where to add the callback
	 * @param $callback Strinng What to add to the hook
	 */
	public function hook($hook, $callback) {
		//make sure the hook is defined
		if (!isset($this->hooks[$hook])) {
			$this->hooks[$hook] = array();
		}
		//add the callback to the hook
		$hooks[$hook][] = $callback;
	}
	
	/**
	 * Calls the callbacks for a hook
	 * @param $hook String The hook to run the callbacks for
	 */
	public function call($hook) {
		//make sure the hook is defined
		if (isset($this->hooks[$hook])) {
			//run the callbacks for the hook
			foreach ($this->hooks[$hook] as $callback) {
				$callback();
			}
		} else {
			syslog(LOG_NOTICE, "Called hook does not exist: $hook");
		}
	}
}