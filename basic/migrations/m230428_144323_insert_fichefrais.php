<?php

use yii\db\Migration;

/**
 * Class m230428_144323_insert_fichefrais
 */
class m230428_144323_insert_fichefrais extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('fichefrais', ['idVisiteur','mois','nbJustificatifs','montantValide','dateModif','idEtat'],[
        ['a131','03','10','110.00','03/03/2023','CL'],
        ['a17','04','10','110.00','03/03/2023','CL'],
        ['a55','01','10','110.00','03/03/2023','CL'],
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230428_144323_insert_fichefrais cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230428_144323_insert_fichefrais cannot be reverted.\n";

        return false;
    }
    */
}
