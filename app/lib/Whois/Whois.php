<?php 
namespace Whois;
class Whois {
	public function __construct($array) {
		$this->domains = $array;
	}
	protected function getResults() {
					$regex = "/Registrant Name:\s+(.+)\s+Registrant Organization:/";
					$domainsArray = $this->domains;
					$domains = explode(PHP_EOL, $domainsArray);
					foreach($domains as $domain) {
							$Parser = new \Novutec\WhoisParser\Parser();
							$result = $Parser->lookup($domain);
							if($result->parsedContacts === true) {
									$results[$domain] = strtoupper($result->contacts->owner[0]->name);
							}
							if($result->parsedContacts === false) {
									$array = $result->toArray();
									$raw = $array['rawdata'][1];
									$match= preg_match($regex, $raw, $matches);
									$results[$domain] = strtoupper($matches[1]);
							}
					}
					return $results;
			}
			public function showResults() {
					$results = $this->getResults();
					$unique = array_unique($results);
					foreach($unique as $name) {
							$hit[$name] = array_keys($results, $name);
					}
					return $hit;
			}
}