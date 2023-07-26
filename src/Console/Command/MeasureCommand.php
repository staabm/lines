<?php

declare (strict_types=1);
namespace Lines202307\TomasVotruba\Lines\Console\Command;

use Lines202307\Symfony\Component\Console\Command\Command;
use Lines202307\Symfony\Component\Console\Input\InputArgument;
use Lines202307\Symfony\Component\Console\Input\InputInterface;
use Lines202307\Symfony\Component\Console\Input\InputOption;
use Lines202307\Symfony\Component\Console\Output\OutputInterface;
use Lines202307\TomasVotruba\Lines\Analyser;
use Lines202307\TomasVotruba\Lines\Console\OutputFormatter\JsonOutputFormatter;
use Lines202307\TomasVotruba\Lines\Console\OutputFormatter\TextOutputFormatter;
use Lines202307\TomasVotruba\Lines\PhpFilesFinder;
final class MeasureCommand extends Command
{
    /**
     * @readonly
     * @var \TomasVotruba\Lines\PhpFilesFinder
     */
    private $phpFilesFinder;
    /**
     * @readonly
     * @var \TomasVotruba\Lines\Analyser
     */
    private $analyser;
    public function __construct()
    {
        parent::__construct();
        $this->phpFilesFinder = new PhpFilesFinder();
        $this->analyser = new Analyser();
    }
    protected function configure() : void
    {
        $this->setName('measure');
        $this->setDescription('Measure lines of code in given path(s)');
        $this->addArgument('paths', InputArgument::REQUIRED | InputArgument::IS_ARRAY, 'Path to analyze');
        $this->addOption('suffix', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'Suffix of files to analyze', ['php']);
        $this->addOption('exclude', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Paths to exclude', []);
        $this->addOption('json', null, InputOption::VALUE_NONE, 'Output in JSON format');
    }
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $paths = $input->getArgument('paths');
        $suffixes = $input->getOption('suffix');
        $excludes = $input->getOption('exclude');
        $isJson = (bool) $input->getOption('json');
        $filePaths = $this->phpFilesFinder->findInDirectories($paths, $suffixes, $excludes);
        if ($filePaths === []) {
            $output->writeln('<error>No files found to scan</error>');
            return Command::FAILURE;
        }
        $analysisResult = $this->analyser->countFiles($filePaths);
        // print results
        if ($isJson) {
            $jsonOutputFormatter = new JsonOutputFormatter();
            $jsonOutputFormatter->printResult($analysisResult, $output);
        } else {
            $textOutputFormatter = new TextOutputFormatter();
            $textOutputFormatter->printResult($analysisResult, $output);
        }
        return Command::SUCCESS;
    }
}
