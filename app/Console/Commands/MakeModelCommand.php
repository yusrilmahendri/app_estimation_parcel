<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:model-auto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model automatically';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Filesystem $filesystem)
    {
        $name = $this->argument('name');
        $path = base_path("app/Models/{$name}.php");

        // Check if the model already exists
        if ($filesystem->exists($path)) {
            $this->error("Model {$name} already exists!");
            return;
        }

        // Generate the model file
        $filesystem->put($path, $this->generateModelStub($name));

        $this->info("Model {$name} created successfully.");
    }

    /**
     * Generate the model stub.
     *
     * @param  string  $name
     * @return string
     */
    protected function generateModelStub($name)
    {
        $stub = "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {$name} extends Model
{
    //
}
";
        return $stub;
    }
}
