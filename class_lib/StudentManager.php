<?php

class StudentManager
{
    protected $filePath;
    protected $listStudent = [];

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getListStudent()
    {
        $arrData = $this->getJSON();
        foreach ($arrData as $obj) {
            $student = new Student($obj->name, $obj->email, $obj->phone);
            array_push($this->listStudent, $student);
        }
        return $this->listStudent;
    }

    public function addStudent($student)
    {
        $students = $this->getJSON();
        $data = [
            "name" => $student->getName(),
            "email" => $student->getEmail(),
            "phone" => $student->getPhone()
        ];
        array_push($students, $data);
        $this->saveJSON($students);
    }

    public function editStudent($index, $data)
    {
        $students = $this->getJSON();
//        $data = [
//            "name" => $student->setName($data),
//            "email" => $student->setEmail($data),
//            "phone" => $student->setPhone($data)
//        ];
        $students[$index] = $data;
        $this->saveJSON($students);
    }

    public function deleteStudent($index)
    {
        $students = $this->getJSON();
        array_splice($students, $index, 1, null);
        $this->saveJSON($students);
    }

    public function searchStudent($keyword)
    {
        $student = $this->getJSON();
        $arr = [];
        foreach ($student as $item) {
            if (strpos(strtolower($item->name), strtolower($keyword)) !== false ||
                strpos(strtolower($item->email), strtolower($keyword)) !== false ||
                strpos(strtolower($item->phone), strtolower($keyword)) !== false) {
                array_push($arr, $item);
            }
        }
        return $arr;
    }

    public function getStudentByIndex($index)
    {
        $arrData = $this->getJSON();
        $student = new Student($arrData[$index]->name, $arrData[$index]->email, $arrData[$index]->phone);
        array_push($this->listStudent, $student);
        return $this->listStudent;
    }

    public function getJSON()
    {
        $dataJSON = file_get_contents($this->filePath);
        return json_decode($dataJSON);
    }

    public function saveJSON($data)
    {
        $dataJSON = json_encode($data);
        file_put_contents($this->filePath, $dataJSON);
    }
}