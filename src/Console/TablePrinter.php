<?php

declare (strict_types=1);
namespace Lines202307\TomasVotruba\Lines\Console;

use Lines202307\Symfony\Component\Console\Helper\TableStyle;
use Lines202307\Symfony\Component\Console\Style\SymfonyStyle;
final class TablePrinter
{
    /**
     * @readonly
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @readonly
     * @var \Symfony\Component\Console\Helper\TableStyle
     */
    private $padLeftTableStyle;
    public function __construct(SymfonyStyle $symfonyStyle)
    {
        $this->symfonyStyle = $symfonyStyle;
        $padLeftTableStyle = new TableStyle();
        $padLeftTableStyle->setPadType(\STR_PAD_LEFT);
        $this->padLeftTableStyle = $padLeftTableStyle;
    }
    /**
     * @param mixed[] $rows
     */
    public function printItemValueTable(array $rows, string $titleHeader, string $countHeader, bool $includeRelative = \false) : void
    {
        $headers = [$titleHeader, $countHeader];
        if ($includeRelative) {
            $headers[] = 'Relative';
        }
        $table = $this->symfonyStyle->createTable()->setHeaders($headers)->setColumnWidth(0, 28)->setRows($rows)->setColumnStyle(1, $this->padLeftTableStyle);
        if ($includeRelative) {
            $table->setColumnWidth(1, 8)->setColumnWidth(2, 7)->setColumnStyle(2, $this->padLeftTableStyle);
        } else {
            $table->setColumnWidth(1, 19);
        }
        $table->render();
        $this->symfonyStyle->newLine();
    }
}
