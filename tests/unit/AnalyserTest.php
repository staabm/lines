<?php

declare(strict_types=1);

namespace TomasVotruba\Lines\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use TomasVotruba\Lines\Analyser;
use PHPUnit\Framework\TestCase;

final class AnalyserTest extends TestCase
{
    private Analyser $analyser;

    protected function setUp(): void
    {
        $this->analyser = new Analyser;
    }

    public function test(): void
    {
        $this->assertEqualsWithDelta(
            [
                'files'                       => 1,
                'loc'                         => 75,
                'lloc'                        => 24,
                'llocClasses'                 => 22,
                'llocFunctions'               => 1,
                'llocGlobal'                  => 1,
                'cloc'                        => 7,
                'interfaces'                  => 1,
                'traits'                      => 0,
                'classes'                     => 2,
                'abstractClasses'             => 1,
                'concreteClasses'             => 1,
                'nonFinalClasses'             => 1,
                'finalClasses'                => 0,
                'functions'                   => 2,
                'namedFunctions'              => 1,
                'anonymousFunctions'          => 1,
                'methods'                     => 4,
                'publicMethods'               => 2,
                'nonPublicMethods'            => 2,
                'protectedMethods'            => 1,
                'privateMethods'              => 1,
                'nonStaticMethods'            => 3,
                'staticMethods'               => 1,
                'constants'                   => 2,
                'classConstants'              => 1,
                'publicClassConstants'        => 1,
                'nonPublicClassConstants'     => 0,
                'globalConstants'             => 1,
                'llocByNof'                   => 0.5,
                'methodCalls'                 => 6,
                'staticMethodCalls'           => 4,
                'instanceMethodCalls'         => 2,
                'directories'                 => 0,
                'namespaces'                  => 1,
                'ncloc'                       => 68,
                'classLlocMin'                => 0,
                'classLlocAvg'                => 7.3,
                'classLlocMax'                => 22,
                'methodLlocMin'               => 4,
                'methodLlocAvg'               => 5.6,
                'methodLlocMax'               => 7,
                'averageMethodsPerClass'      => 1.3,
                'minimumMethodsPerClass'      => 0,
                'maximumMethodsPerClass'      => 4,
            ],
            $this->analyser->countFiles(
                [__DIR__ . '/../_files/source.php'],
            ),
            0.1
        );
    }

    #[DataProvider('issue126Provider')]
    public function testIssue126IsFixed(int $fileNumber, int $cloc): void
    {
        $file   = __DIR__ . '/../_files/issue_126/issue_126_' . $fileNumber . '.php';
        $result = $this->analyser->countFiles([$file]);

        $assertString = sprintf(
            'Failed asserting that %s matches expected %s in issue_126_%d.php',
            $result['cloc'],
            $cloc,
            $fileNumber
        );

        $this->assertSame($cloc, $result['cloc'], $assertString);
    }

    /**
     * @return array<array{int, int}>
     */
    public static function issue126Provider(): array
    {
        // issue_126_X.php => CLOC
        return [
            [1, 1],
            [2, 1],
            [3, 1],
            [4, 2],
            [5, 3],
            [6, 3],
            [7, 3],
        ];
    }

    public function testIssue138IsFixed(): void
    {
        $result = $this->analyser->countFiles(
            [
                __DIR__ . '/../_files/issue_138.php',
            ],
        );

        $this->assertSame(1, $result['classes']);
    }

    public function testDeclareIsNotLogicalLine(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/with_declare.php']);

        $this->assertSame(0, $result['llocGlobal']);
    }

    public function testNamespaceIsNotLogicalLine(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/with_namespace.php']);

        $this->assertSame(0, $result['llocGlobal']);
    }

    public function testImportIsNotLogicalLine(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/with_import.php']);

        $this->assertSame(0, $result['llocGlobal']);
    }

    public function test_it_makes_a_distinction_between_public_and_non_public_class_constants(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/class_constants.php']);
        $this->assertSame(2, $result['publicClassConstants']);
        $this->assertSame(3, $result['nonPublicClassConstants']);
        $this->assertSame(5, $result['classConstants']);
        $this->assertSame(5, $result['constants']);
    }

    public function test_it_collects_the_number_of_final_non_final_and_abstract_classes(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/classes.php']);
        $this->assertSame(9, $result['classes']);
        $this->assertSame(2, $result['finalClasses']);
        $this->assertSame(3, $result['nonFinalClasses']);
        $this->assertSame(4, $result['abstractClasses']);
    }

    public function test_it_makes_a_distinction_between_protected_and_private_methods(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/methods.php']);
        $this->assertSame(2, $result['publicMethods']);
        $this->assertSame(1, $result['protectedMethods']);
        $this->assertSame(3, $result['privateMethods']);
        $this->assertSame(6, $result['methods']);
    }

    public function test_it_provides_average_minimum_and_maximum_number_of_methods_per_class(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/methods_per_class.php']);
        $this->assertSame(2.0, $result['averageMethodsPerClass']);
        $this->assertSame(0, $result['minimumMethodsPerClass']);
        $this->assertSame(4, $result['maximumMethodsPerClass']);
    }

    public function test_use_trait_is_not_counted_as_logical_line(): void
    {
        $result = $this->analyser->countFiles([__DIR__ . '/../_files/class_using_trait.php']);
        $this->assertSame(1, $result['lloc']);
        $this->assertSame(1, $result['llocClasses']);
    }
}
