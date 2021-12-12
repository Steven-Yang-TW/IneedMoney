<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeRepository extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new l5-repository repository file';

    /**
     * The Generate type of file
     *
     * @var string
     */
    protected $type = "Repository";

    /**
     * Return generator new support file stub template
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/Stubs/repository.stub';
    }

    /**
     * The directory where command will generate in this project
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Repositories';
    }
}
