<?php

namespace Tests\Behat\Gherkin\Filter;

use Behat\Gherkin\Filter\roleFilter;
use Behat\Gherkin\Node\FeatureNode;

class roleFilterTest extends FilterTest
{
    public function testIsFeatureMatchFilter()
    {
        $description = <<<NAR
In order to be able to read news in my own language
As a french user
I need to be able to switch website language to french
NAR;
        $feature = new FeatureNode(null, $description, array(), null, array(), null, null, null, 1);

        $filter = new roleFilter('french user');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new roleFilter('french *');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new roleFilter('french');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $filter = new roleFilter('user');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $filter = new roleFilter('*user');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new roleFilter('French User');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, array(), null, array(), null, null, null, 1);
        $filter = new roleFilter('French User');
        $this->assertFalse($filter->isFeatureMatch($feature));
    }

    public function testFeaturerolePrefixedWithAn()
    {
        $description = <<<NAR
In order to be able to read news in my own language
As an american user
I need to be able to switch website language to french
NAR;
        $feature = new FeatureNode(null, $description, array(), null, array(), null, null, null, 1);

        $filter = new roleFilter('american user');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new roleFilter('american *');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new roleFilter('american');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $filter = new roleFilter('user');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $filter = new roleFilter('*user');
        $this->assertTrue($filter->isFeatureMatch($feature));
        
        $filter = new roleFilter('[\w\s]+user');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $filter = new roleFilter('American User');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, array(), null, array(), null, null, null, 1);
        $filter = new roleFilter('American User');
        $this->assertFalse($filter->isFeatureMatch($feature));
    }
}
