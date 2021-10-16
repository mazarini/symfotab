<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Mazarini\SymfoTabBundle\Entity\Item;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $i=0;
        foreach ($this->getData() as list($tableName,$fieldTable,$tableKey,$tableOrder,$tableData)) {
            $item = new Item();
            $item->setTableName($tableName);
            $item->setFieldTable($fieldTable);
            $item->setTableKey($tableKey);
            $item->setTableOrder($tableOrder);
            $item->setTableData($tableData);
            $manager->persist($items[]=$item);
        }
        $manager->flush();
    }

    private function getData()
    {
//                     1234567890123456
       yield ['table','table','table'  ,0,['name'=>'table','label'=>'Tables','ordered'=>false]];
       yield ['table','field','field'  ,0,['name'=>'field','label'=>'Fields','ordered'=>true]];

       yield ['field','table','name'   ,2,['name'=>'name'   ,'label'=>'Name'   ,'key'=>true ,'type'=>'string'  ,'length'=>8 ]];
       yield ['field','table','label'  ,2,['name'=>'label'  ,'label'=>'Label'  ,'key'=>false,'type'=>'string'  ,'length'=>8 ]];
       yield ['field','table','ordered',2,['name'=>'ordered','label'=>'Ordered','key'=>false,'type'=>'boolean' ,'length'=>0 ]];

       yield ['field','field','name'   ,1,['name'=>'name'   ,'label'=>'Name'   ,'key'=>true ,'type'=>'string'  ,'length'=>16]];
       yield ['field','field','label'  ,2,['name'=>'label'  ,'label'=>'Label'  ,'key'=>false,'type'=>'string'  ,'length'=>32]];
       yield ['field','field','key'    ,3,['name'=>'key'    ,'label'=>'Key'    ,'key'=>false,'type'=>'boolean' ,'length'=>0 ]];
       yield ['field','field','type'   ,4,['name'=>'type'   ,'label'=>'Type'   ,'key'=>false,'type'=>'string'  ,'length'=>8 ]];
       yield ['field','field','length' ,5,['name'=>'length' ,'label'=>'Length' ,'key'=>false,'type'=>'interger','length'=>8 ]];
    }
}
