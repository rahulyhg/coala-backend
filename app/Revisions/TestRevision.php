<?php

namespace App\Revisions;

use Hector\Migration\Contract\RevisionInterface;

class TestRevision implements RevisionInterface
{
    public function up()
    {
        // nothing
    }

    public function down()
    {
        // nothing
    }

    public function describeUp(): string
    {
        return 'It goes up';
    }

    public function describeDown(): string
    {
        return 'It goes down';
    }
}