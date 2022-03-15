<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeService extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * The Generate type of file
     *
     * @var string
     */
    protected $type = 'Services';

    /**
     * Return generator new support file stub template
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/Stubs/services.stub';
    }

    /**
     * The directory where command will generate in this project
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Services';
    }
}
