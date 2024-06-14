<?php

namespace App\Tests;

use App\Course;
use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    public function testCourse(): void
    {
        $course = new Course('Daniil');
        $this->assertEquals('Daniil', $course->getName());
    }
}
