<?php namespace Codesleeve\Platform\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PlatformSetupCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'platform:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the core Codesleeve platform';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        file_put_contents(base_path() . '/env.php', '<?php return "local";' . PHP_EOL);
        touch(app_path() . '/database/development.sqlite');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            // array('example', InputArgument::REQUIRED, 'An example argument.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            // array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
        );
    }

}