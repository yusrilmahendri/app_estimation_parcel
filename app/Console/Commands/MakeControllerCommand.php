<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controller-auto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller automatically';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Filesystem $filesystem)
    {
        $name = $this->argument('name');
        $path = base_path("app/Http/Controllers/{$name}.php");

        // Check if the controller already exists
        if ($filesystem->exists($path)) {
            $this->error("Controller {$name} already exists!");
            return;
        }

        // Generate the controller file
        $filesystem->put($path, $this->generateControllerStub($name));

        $this->info("Controller {$name} created successfully.");
    }

    /**
     * Generate the controller stub.
     *
     * @param  string  $name
     * @return string
     */
    protected function generateControllerStub($name)
    {
        $stub = "<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class {$name} extends Controller
{
    //
}
";

        return $stub;
    }
}
