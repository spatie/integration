<?php

namespace Spatie\Integration;

/**
 * Requires the following properties to set up:
 * - protected string $name
 * - protected string $pluralName
 * - protected string $controller
 * - protected array  $expectedProperties
 */
abstract class ModuleTestCase extends BackTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->nameUpper = ucfirst($this->name);
        $this->pluralNameUpper = ucfirst($this->pluralName);
    }

    /**
     * @test
     */
    public function models_have_their_expected_properties()
    {
        $this->assertCount(10, $this->models);

        foreach($this->models as $model) {
            foreach($this->expectedProperties as $expectedProperty) {
                $this->assertNotNull($model->$expectedProperty);
            }
        }
    }

    /**
     * @test
     */
    public function it_displays_a_list_of_all_models()
    {
        $this->visit(action("{$this->controller}@index"))
            ->see(trans("back-{$this->pluralName}.title"))
            ->see(trans("back-{$this->pluralName}.new{$this->nameUpper}"));

        foreach($this->models as $model) {
            $this->see($model->name);
        }
    }

    /**
     * @test
     */
    public function it_can_edit_a_model()
    {
        $model = $this->models->first();

        $this
            ->visit(action("{$this->controller}@index"))
            ->click($model->name)
            ->onPage(action("{$this->controller}@edit", [$model->id]))
            ->press(trans("back-{$this->pluralName}.save{$this->nameUpper}"))
            ->see(trans("back-{$this->pluralName}.events.updated", ['name' => $model->name]))
            ->onPage(action("{$this->controller}@edit", [$model->id]));
    }
}
