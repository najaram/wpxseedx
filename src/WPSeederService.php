<?php

namespace Najaram\WPSeederDaw;

use Carbon\Carbon;
use GuzzleHttp\Client;

class WPSeederService
{	
	/**
	 * @var Client
	 */
	public $client;

	public $endpoint = '/wp-json/wp/v2/posts';

	public function __construct()
	{
		$this->client = new Client();
	}

	public function insertPost($count, $progressBar)
	{
		$faker = \Faker\Factory::create();

		$headers = [
			'Content-Type' => 'application/json',
			'Authorization' => 'Basic ' . base64_encode(getenv('APP_USERNAME') . ':' . getenv('APP_PASSWORD'))
		];
		
		
		for ($i = 0; $i < $count; $i++) {

			$payload = [
				'title' => $faker->sentence(6, true),
				'content' => $faker->paragraphs(3, true),
				'author' => 1,
				'status' => $faker->randomElement(['publish', 'future', 'draft', 'pending', 'private'])
			];

			$this->client->request('POST', getenv('APP_URL') . $this->endpoint, [
				'headers' => $headers,
				'json' => $payload
			]);

			$progressBar->advance();
		}
		

	}

}