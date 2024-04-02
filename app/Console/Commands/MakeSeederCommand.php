<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:seeder-auto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new seeder automatically';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Filesystem $filesystem)
    {
        $name = $this->argument('name');
        $path = base_path("database/seeds/{$name}.php");

        // Check if the seeder already exists
        if ($filesystem->exists($path)) {
            $this->error("Seeder {$name} already exists!");
            return;
        }

        // Generate the seeder file
        $filesystem->put($path, $this->generateSeederStub($name));

        $this->info("Seeder {$name} created successfully.");
    }

    /**
     * Generate the seeder stub.
     *
     * @param  string  $name
     * @return string
     */
    protected function generateSeederStub($name)
    {
        $stub = "<?php

use Illuminate\Database\Seeder;

class {$name} extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed your database here
    }
}
";

        return $stub;
    }
}
