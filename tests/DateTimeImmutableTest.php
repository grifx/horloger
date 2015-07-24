<?php

namespace Horloger;

use Horloger\Fixtures\ImmutableContractSubmissionDate;

/**
 * @author Joris Garonian <joris.garonian@gmail.com>
 */
class DateTimeImmutableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     **/
    public function it_should_instantiate_an_immutable_date_time_at_a_specific_date()
    {
        $date = new ImmutableContractSubmissionDate();
        sleep(1);

        $this->assertNotEquals(new ImmutableContractSubmissionDate(), $date);

        PredefinedTime::add(ImmutableContractSubmissionDate::class, '1990-05-19');

        $date = new ImmutableContractSubmissionDate();
        sleep(1);

        $this->assertEquals(new ImmutableContractSubmissionDate(), $date);

        PredefinedTime::stop();

        $this->assertNotEquals(new ImmutableContractSubmissionDate(), $date);

        PredefinedTime::start();

        $this->assertEquals(new ImmutableContractSubmissionDate(), $date);

        PredefinedTime::clean();

        $this->assertNotEquals(new ImmutableContractSubmissionDate(), $date);
    }
}
