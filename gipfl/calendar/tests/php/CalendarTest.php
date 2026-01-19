<?php

namespace gipfl\Tests\Html;

use gipfl\Calendar\Calendar;

class CalendarTest extends TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true);
    }

    public function testGivesCorrectWeekDaysWhenFirstOfWeekIsMonday()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals([
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ], $calendar->listWeekDayNames());
    }

    public function testGivesCorrectWeekDaysWhenFirstOfWeekIsSunday()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_SUNDAY);
        $this->assertEquals([
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ], $calendar->listWeekDayNames());
    }

    public function testFirstDayOfWeek()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_SUNDAY);
        $this->assertEquals('2019-02-03', $calendar->getFirstDayOfWeek('2019-02-07'));
        $calendar->setFirstOfWeek(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals('2019-02-04', $calendar->getFirstDayOfWeek('2019-02-07'));
    }

    public function testLastWeekOfFebruary2020GivesCorrectDays()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals([
            1 => '2020-02-24',
            2 => '2020-02-25',
            3 => '2020-02-26',
            4 => '2020-02-27',
            5 => '2020-02-28',
            6 => '2020-02-29',
            7 => '2020-03-01',
        ], $calendar->getDaysForWeek(strtotime('2020-02-27 12:00:00')));
        // print_r($calendar->getWeeksForMonth(strtotime('2018-08-07 12:00:00')));
    }

    public function testLastWeekOfFebruary2016GivesCorrectWorkingDays()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals([
            1 => '2016-02-29',
            2 => '2016-03-01',
            3 => '2016-03-02',
            4 => '2016-03-03',
            5 => '2016-03-04',
        ], $calendar->getWorkingDaysForWeek(strtotime('2016-02-29 12:00:00')));
        // print_r($calendar->getWeeksForMonth(strtotime('2018-08-07 12:00:00')));
    }

    public function testGetWeeksForMonth()
    {
        $result = [
            13 => [
                '1' => '2022-03-28',
                '2' => '2022-03-29',
                '3' => '2022-03-30',
                '4' => '2022-03-31',
                '5' => '2022-04-01',
                '6' => '2022-04-02',
                '7' => '2022-04-03',
            ],
            14 => [
                '1' => '2022-04-04',
                '2' => '2022-04-05',
                '3' => '2022-04-06',
                '4' => '2022-04-07',
                '5' => '2022-04-08',
                '6' => '2022-04-09',
                '7' => '2022-04-10',
            ],
            15 => [
                '1' => '2022-04-11',
                '2' => '2022-04-12',
                '3' => '2022-04-13',
                '4' => '2022-04-14',
                '5' => '2022-04-15',
                '6' => '2022-04-16',
                '7' => '2022-04-17',
            ],
            16 => [
                '1' => '2022-04-18',
                '2' => '2022-04-19',
                '3' => '2022-04-20',
                '4' => '2022-04-21',
                '5' => '2022-04-22',
                '6' => '2022-04-23',
                '7' => '2022-04-24',
            ],
            17 => [
                '1' => '2022-04-25',
                '2' => '2022-04-26',
                '3' => '2022-04-27',
                '4' => '2022-04-28',
                '5' => '2022-04-29',
                '6' => '2022-04-30',
                '7' => '2022-05-01',
            ],
        ];
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals($result, $calendar->getWeeksForMonth(strtotime('2022-04-28 12:00:00')));
    }

    public function testGetSomeDays()
    {
        $this->assertTrue(true);
        $calendar = new Calendar();
        // print_r($calendar->getWeeksForMonth(strtotime('2018-08-07 12:00:00')));
    }
}
