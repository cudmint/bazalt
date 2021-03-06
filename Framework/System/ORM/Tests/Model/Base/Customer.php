<?php
/**
 * @codeCoverageIgnore
 */
abstract class ORMTest_Model_Base_Customer extends ORMTest_Model_Base_Record
{
    const TABLE_NAME = 'customer';

    const MODEL_NAME = 'ORMTest_Model_Customer';

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME, self::MODEL_NAME);
    }

    protected function initFields()
    {
        $this->hasColumn('customer_id', 'PUA:smallint(5)');
        $this->hasColumn('store_id', 'U:tinyint(3)');
        $this->hasColumn('first_name', 'varchar(45)');
        $this->hasColumn('last_name', 'varchar(45)');
        $this->hasColumn('email', 'N:varchar(50)');
        $this->hasColumn('address_id', 'U:smallint(5)');
        $this->hasColumn('active', 'tinyint(1)|1');
        $this->hasColumn('create_date', 'datetime');
        $this->hasColumn('last_update', 'timestamp|CURRENT_TIMESTAMP');
    }

    public function initRelations()
    {
        $this->hasRelation('Address', new ORM_Relation_One2One('ORMTest_Model_Address', 'address_id',  'address_id'));
        $this->hasRelation('Payment', new ORM_Relation_One2Many('ORMTest_Model_Payment', 'customer_id', 'customer_id'));
        $this->hasRelation('Rental', new ORM_Relation_One2Many('ORMTest_Model_Rental', 'customer_id', 'customer_id'));
        $this->hasRelation('Store', new ORM_Relation_One2One('ORMTest_Model_Store', 'store_id',  'store_id'));
    }

    public static function getById($id)
    {
        return parent::getRecordById($id, self::MODEL_NAME);
    }

    public static function getAll($limit = null)
    {
        return parent::getAllRecords($limit, self::MODEL_NAME);
    }

    public static function select($fields = null)
    {
        return ORM::select(self::MODEL_NAME, $fields);
    }

    public static function insert($fields = null)
    {
        return ORM::insert(self::MODEL_NAME, $fields);
    }
}