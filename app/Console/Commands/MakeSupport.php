<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeSupport extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:support {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new support class';

    /**
     * The Generate type of file
     *
     * @var string
     */
    protected $type = 'Supports';

    /**
     * Return generator new support file stub template
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/Stubs/supports.stub';
    }

    /**
     * The directory where command will generate in this project
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Supports';
    }
}
