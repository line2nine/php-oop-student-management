<?php


class GroupManager
{
    protected $studentManager;

    public function __construct(StudentManager $studentManager)
    {
        $this->studentManager = $studentManager;
    }

    public function getGroupStudents($groupName)
    {
        $students = $this->studentManager->getListStudent();
        $groupStudents = [];
        foreach ($students as $student) {
            if ($student->getGroup() == $groupName) {
                array_push($groupStudents, $student);
            }
        }
        return $groupStudents;
    }
}