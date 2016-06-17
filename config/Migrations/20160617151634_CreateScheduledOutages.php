<?php
use Migrations\AbstractMigration;

class CreateScheduledOutages extends AbstractMigration
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
        $table = $this->table('scheduled_outages');
        $table->addColumn('start_date', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('end_date', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('zones', 'text', [
            'null' => false
        ]);
        $table->addColumn('industries', 'text', [
            'null' => true
        ]);
        $table->addColumn('buildings', 'text', [
            'null' => true
        ]);
        $table->addColumn('hospitals', 'text', [
            'null' => true
        ]);
        $table->addColumn('radio_antennas', 'text', [
            'null' => true
        ]);
        $table->addColumn('farms', 'text', [
            'null' => true
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
