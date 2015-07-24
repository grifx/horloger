<?php

namespace Horloger;

use Horloger\Fixtures\ContractSubmissionDate;

/**
 * @author Joris Garonian <joris.garonian@gmail.com>
 */
class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     **/
    public function it_should_instantiate_a_date_time_at_a_specific_date()
    {
        $date = new ContractSubmissionDate();
        sleep(1);

        $this->assertNotEquals(new ContractSubmissionDate(), $date);

        PredefinedTime::add(ContractSubmissionDate::class, '1990-05-19');

        $date = new ContractSubmissionDate();
        sleep(1);

        $this->assertEquals(new ContractSubmissionDate(), $date);

        PredefinedTime::stop();

        $this->assertNotEquals(new ContractSubmissionDate(), $date);

        PredefinedTime::start();

        $this->assertEquals(new ContractSubmissionDate(), $date);

        PredefinedTime::clean();

        $this->assertNotEquals(new ContractSubmissionDate(), $date);
    }
}
