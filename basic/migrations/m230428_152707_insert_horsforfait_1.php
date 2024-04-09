<?php

use yii\db\Migration;

/**
 * Class m230428_152707_insert_horsforfait_1
 */
class m230428_152707_insert_horsforfait_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('lignefraishorsforfait', ['id', 'idVisiteur', 'mois', 'libelle', 'date', 'montant'],[
            [01,'a131','03','Cucu','03-03-2023','120.00'],
            [02,'a55','01','UwU','02-02-2023','110.00'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230428_152707_insert_horsforfait_1 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230428_152707_insert_horsforfait_1 cannot be reverted.\n";

        return false;
    }
    */
}
