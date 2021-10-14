<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Mazarini\SymfoTabBundle\Entity\Item;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $i=0;
        foreach ($this->getData() as list($tableName,$tableKey,$tableOrder,$tableData)) {
            $item = new Item();
            $item->setTableName($tableName);
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
       yield ['table','table',0,['name'=>'table','label'=>'Tables','ordered'=>false]];

       yield ['field','table           |name',0,['table'=>'table','name'=>'name','label'=>'Name','key'=>true,'type'=>'string','length'=>16]];
       yield ['field','table           |label',1,['table'=>'table','name'=>'label','label'=>'Label','key'=>false,'type'=>'string','length'=>32]];
       yield ['field','table           |ordered',2,['table'=>'table','name'=>'ordered','label'=>'Ordered','key'=>false,'type'=>'boolean','length'=>0]];

       yield ['table','field',0,['name'=>'field','label'=>'Fields','ordered'=>true]];

       yield ['field','field           |table',0,['table'=>'field','name'=>'table','label'=>'Table','key'=>true,'type'=>'string','length'=>16]];
       yield ['field','field           |name',1,['table'=>'field','name'=>'name','label'=>'Name','key'=>true,'type'=>'string','length'=>16]];
       yield ['field','field           |label',2,['table'=>'field','name'=>'label','label'=>'Label','key'=>false,'type'=>'string','length'=>32]];
       yield ['field','field           |key',3,['table'=>'field','name'=>'key','label'=>'Key','key'=>false,'type'=>'boolean','length'=>1]];
       yield ['field','field           |type',4,['table'=>'field','name'=>'type','label'=>'Type','key'=>false,'type'=>'string','length'=>8]];
       yield ['field','field           |length',5,['table'=>'field','name'=>'length','label'=>'Length','key'=>false,'type'=>'interger','length'=>8]];
    }
}
