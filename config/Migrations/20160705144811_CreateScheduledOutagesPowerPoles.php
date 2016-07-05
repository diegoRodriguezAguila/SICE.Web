<?php
use Migrations\AbstractMigration;

class CreateScheduledOutagesPowerPoles extends AbstractMigration
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
        $table = $this->table('scheduled_outages_power_poles');
        $table->addColumn('scheduled_outage_id', 'integer', [
            'null' => false,
        ]);
        $table->addForeignKey('scheduled_outage_id',
            'scheduled_outages', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION']);
        $table->addColumn('power_pole_id', 'integer', [
            'null' => false,
        ]);
        $table->addForeignKey('power_pole_id',
            'power_poles', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION']);
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
