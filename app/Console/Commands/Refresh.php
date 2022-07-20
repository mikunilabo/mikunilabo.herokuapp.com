<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;

class Refresh extends Command
{
    /**
     * @var string
     */
    protected $description = 'Execute some artisan commands and composer dump autoload command.';

    /**
     * @var string
     */
    protected $signature = 'refresh
                        {--c|cache : Cache again after deleting.}
                        {--d|dumpautoload : Perform autoloading with composer.}
                        {--f|force : Force without confirmation.}
                        {--i|info : Output the processing contents.}';

    /**
     * @var array
     */
    private $jobs = [
        'cache',
        'clear-compiled',
        'config',
        'event',
        'route',
        'view',
    ];

    /**
     * @param Composer $composer
     * @return mixed
     */
    public function handle(Composer $composer)
    {
        $jobs = count($this->jobs);

        $cacheOrClear = $this->option('cache')
            || (! $this->option('force') && $this->confirm('Do you want to cache configuration files? (y/n) or'))
            ? 'cache' : 'clear';


        $isDump = false;
        if ($this->option('dumpautoload')
            || (! $this->option('force') && $this->confirm('Do you want to execute class autoloading?'))
        ) {
            $isDump = true;
            $jobs += 1;
        }

        $progress = $this->output->createProgressBar($jobs);

        $isInfo = $this->option('info');
        $call = $isInfo ? 'call' : 'callSilent';

        $this->comment('Refreshing...');
        // $this->{$call}('down');

        $progress->advance();
        $isInfo ? $this->line('') : null;
        $this->{$call}('clear-compiled');

        $progress->advance();
        $isInfo ? $this->line('') : null;
        $this->{$call}('cache:clear');

        $progress->advance();
        $isInfo ? $this->line('') : null;
        $this->{$call}('view:clear');

        $progress->advance();
        $isInfo ? $this->line('') : null;
        $this->{$call}(sprintf('config:%s', $cacheOrClear));

        $progress->advance();
        $isInfo ? $this->line('') : null;
        $this->{$call}(sprintf('event:%s', $cacheOrClear));

        $progress->advance();
        $isInfo ? $this->line('') : null;
        $this->{$call}(sprintf('route:%s', $cacheOrClear));

        if ($isDump) {
            $isInfo ? $this->comment('Class autoload files dumping...') : null;
            $composer->dumpAutoloads();
            $progress->advance();
            $isInfo ? $this->line('') : null;
            $isInfo ? $this->comment('Done dumping!') : null;
        }

        $this->info('');
        // $this->{$call}('up');
        $this->comment('The command has been executed successfully.');
    }
}
