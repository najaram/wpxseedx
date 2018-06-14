<?php

namespace Najaram\WPSeederDaw;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class WPSeederCommand extends Command
{
	/**
	 * @var WPSeederService
	 */
	private $wpSeederService;

	public function __construct(WPSeederService $wpSeederService)
	{
		$this->wpSeederService = $wpSeederService;

		parent::__construct();
	}

	public function configure()
	{
		$this
			->setName('seed')
			->setDescription('Seeds the posts table.')
			->addArgument('count', InputArgument::OPTIONAL, 'Count on how many items will be added. Default to 10.')
			->setHelp('This command seeds the wp post table by some lorem ipsum rubbish');
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{

		$count = ($input->getArgument('count') ? $input->getArgument('count') : '10');
		$message = sprintf('%s', $count);

		$output->writeln("<comment>Starting to seed {$message} items.</comment>");

		$progressBar = new ProgressBar($output, $count);
		$progressBar->setFormat('verbose');
		$progressBar->start();
		$this->wpSeederService->insertPost($count, $progressBar);
		$progressBar->finish();
		$output->writeln("<info>\nDone!</info>");
	}
}