<?php
use Migrations\AbstractMigration;

class CreatePowerPoles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('power_poles');

        $table->addColumn('pole_code', 'string', [
            'null' => false,
        ]);
        $table->addColumn('material', 'string', [
            'null' => true,
        ]);
        $table->addColumn('condition', 'string', [
            'null' => true,
        ]);
        $table->addColumn('owner', 'string', [
            'null' => true,
        ]);
        $table->addColumn('tension_type', 'string', [
            'null' => true,
        ]);
        $table->addColumn('pole_type', 'string', [
            'null' => true,
        ]);
        $table->addColumn('latitude', 'decimal', [
            'null' => true,
        ]);
        $table->addColumn('longitude', 'decimal', [
            'null' => true,
        ]);
        $table->addColumn('status', 'integer', [
            'default' => 1,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
