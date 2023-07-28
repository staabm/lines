<?php

declare (strict_types=1);
namespace Lines202307\TomasVotruba\Lines\Console\OutputFormatter;

use Lines202307\Symfony\Component\Console\Helper\TableSeparator;
use Lines202307\Symfony\Component\Console\Output\OutputInterface;
use Lines202307\TomasVotruba\Lines\Console\TablePrinter;
use Lines202307\TomasVotruba\Lines\Contract\OutputFormatterInterface;
use Lines202307\TomasVotruba\Lines\Helpers\NumberFormat;
use Lines202307\TomasVotruba\Lines\Measurements;
final class TextOutputFormatter implements OutputFormatterInterface
{
    /**
     * @readonly
     * @var \TomasVotruba\Lines\Console\TablePrinter
     */
    private $tablePrinter;
    public function __construct(TablePrinter $tablePrinter)
    {
        $this->tablePrinter = $tablePrinter;
    }
    public function printResult(Measurements $measurements, OutputInterface $output) : void
    {
        $this->printFilesAndDirectories($measurements);
        $this->printLinesOfCode($measurements);
        $this->tablePrinter->printItemValueTable([['Class max', $measurements->getMaxClassLength()], ['Class average ', $measurements->getAverageClassLength()], ['Method max', $measurements->getMaxMethodLength()], ['Method average', $measurements->getAverageMethodLength()]], 'Length Stats', 'Lines');
        $this->tablePrinter->printItemValueTable([['Classes', $measurements->getClassLines(), $measurements->getClassLinesRelative() . ' %'], ['Functions', $measurements->getFunctionLines(), $measurements->getFunctionLinesRelative() . ' %'], ['Not in classes/functions', $measurements->getNotInClassesOrFunctions(), $measurements->getNotInClassesOrFunctionsRelative() . ' %']], 'Classes vs functions vs rest', 'Lines', \true);
        $this->tablePrinter->printItemValueTable([
            ['Namespaces', $measurements->getNamespaces()],
            ['Classes', $measurements->getClassCount()],
            ['Interfaces', $measurements->getInterfaceCount()],
            ['Traits', $measurements->getTraitCount()],
            // @todo enums
            ['Constants', $measurements->getConstantCount()],
            ['Methods', $measurements->getMethodCount()],
            ['Functions', $measurements->getFunctionCount()],
        ], 'Structure', 'Count');
        if ($measurements->getMethodCount() !== 0) {
            $this->tablePrinter->printItemValueTable([['Non-static', $measurements->getNonStaticMethods(), $measurements->getNonStaticMethodsRelative() . ' %'], ['Static', $measurements->getStaticMethods(), $measurements->getStaticMethodsRelative() . ' %'], [new TableSeparator(), new TableSeparator(), new TableSeparator()], ['Public', $measurements->getPublicMethods(), $measurements->getPublicMethodsRelative() . ' %'], ['Protected', $measurements->getProtectedMethods(), $measurements->getProtectedMethodsRelative() . ' %'], ['Private', $measurements->getPrivateMethods(), $measurements->getPrivateMethodsRelative() . ' %']], 'Methods', 'Count', \true);
        }
        if ($measurements->getConstantCount() !== 0) {
            $this->tablePrinter->printItemValueTable([['Global', $measurements->getGlobalConstantCount(), $measurements->getGlobalConstantCountRelative() . ' %'], ['Class', $measurements->getClassConstants(), $measurements->getClassConstantCountRelative() . ' %'], [new TableSeparator(), new TableSeparator(), new TableSeparator()], ['Public', $measurements->getPublicClassConstants(), $measurements->getPublicClassConstantsRelative() . ' %'], ['Non-public', $measurements->getNonPublicClassConstants(), $measurements->getNonPublicClassConstantsRelative() . ' %']], 'Constants', 'Count', \true);
        }
    }
    private function printFilesAndDirectories(Measurements $measurements) : void
    {
        $tableRows = [['Directories', $measurements->getDirectories()], ['Files', $measurements->getFiles()]];
        $this->tablePrinter->printItemValueTable($tableRows, 'Metric', 'Count');
    }
    private function printLinesOfCode(Measurements $measurements) : void
    {
        $tableRows = [['Code', NumberFormat::pretty($measurements->getNonCommentLines()), $measurements->getNonCommentLinesRelative() . ' %'], ['Comments', NumberFormat::pretty($measurements->getCommentLines()), $measurements->getCommentLinesRelative() . ' %'], [new TableSeparator(), new TableSeparator(), new TableSeparator()], ['<options=bold>Total</>', '<options=bold>' . NumberFormat::pretty($measurements->getLines()) . '</>', '<options=bold>100.0 %</>']];
        $this->tablePrinter->printItemValueTable($tableRows, 'Lines of code', 'Count', \true);
    }
}
