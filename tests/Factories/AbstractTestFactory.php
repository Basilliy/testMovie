<?php
 declare(strict_types=1);

namespace Tests\Factories;

use Closure;
    use Faker\Factory;
    use Faker\Generator;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Log;

abstract class AbstractTestFactory
{

    protected Generator $faker;

    protected array $fields = [];

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    abstract protected function defaultFields(): array;

    /**
     * @param  array  $extra
     *
     * @return Model
     * @throws \JsonException
     */
    public function create(array $extra = []): Model
    {
        $this->fields = array_merge($this->defaultFields(), $this->fields, $extra);

        Log::info(json_encode($this->fields, JSON_THROW_ON_ERROR));
        $model = new $this->model();
        foreach ($this->fields as $field => $value) {
            if ($value instanceof Closure) {
                $value = $value();
            }
            $model->$field = $value;
        }
        $model->save();

        return $model;
    }

    public static function new(): self
    {
        return new static();
    }

    public function createMany(int $qty, array $extra = []): Collection
    {
        $collection = new Collection();

        for ($i = 0; $i < $qty; $i++) {
            $collection->add($this->create($extra));
        }

        return $collection;
    }

}

